<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments'])
                     ->withCount(['likes', 'comments'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
        return view('forum.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required', // Validasi untuk konten
        ]);

        try {
            $post = new Post();
            $post->content = $request->content;
            $post->user_id = auth()->id(); // Memastikan bahwa hanya user terautentikasi yang bisa post
            $post->save();

            return redirect()->route('forum.index')->with('success', 'Postingan berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->with('error', 'Postingan gagal dibuat.');
        }
    }


    /**
     * Display the specified post.
     */
    public function show($id)
    {
        $post = Post::with(['comments.user', 'likes'])->findOrFail($id);
        return view('forum.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        return view('forum.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        $request->validate([
            
            'content' => 'required',
        ]);

        
        $post->content = $request->content;
        $post->save();

        return redirect()->route('forum.index')->with('success', 'Post updated successfully.');
    }

    public function storeComment(Request $request, $postId)
{
    $request->validate(['body' => 'required|string']);

    $comment = new Comment();
    $comment->post_id = $postId;
    $comment->user_id = Auth::id();
    $comment->body = $request->body;
    $comment->save();

    return back()->with('success', 'Komentar berhasil ditambahkan.');
}

public function toggleLike($postId)
{
    $existing_like = Like::where('user_id', Auth::id())->where('post_id', $postId)->first();

    if ($existing_like) {
        $existing_like->delete();
        return back()->with('success', 'Like dibatalkan.');
    } else {
        $like = new Like();
        $like->post_id = $postId;
        $like->user_id = Auth::id();
        $like->save();
        return back()->with('success', 'Anda menyukai postingan ini.');
    }
}

    /**
     * Remove the specified post from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('forum.index')->with('success', 'Post deleted successfully.');
    }
    
}
