<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
class PostController extends Controller
{
    public function index()
        {
            $posts = Post::all(); // Contoh mengambil semua posts
            return view('forum.index', compact('posts')); // Pastikan path view sesuai dengan struktur folder
        }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'content' => 'required',
        'image' => 'image|nullable|max:1999'  // Contoh jika Anda membolehkan gambar
    ]);

    try {
        $post = new Post;
        $post->content = $request->content;
        $post->user_id = Auth::id();  // Memastikan bahwa pengguna terautentikasi

        if ($request->hasFile('image')) {
            $fileNameToStore = $this->handleImageUpload($request);
            $post->image = $fileNameToStore;
        }

        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    } catch (\Exception $e) {
        \Log::error('Error creating post: '.$e->getMessage());
        return back()->with('error', 'Postingan gagal dibuat');
    }
}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $post->content = $request->content;
        // Handle the image update logic similar to store method
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
{
    
    if (auth()->id() != $post->user_id) {
        return back()->with('error', 'Anda tidak memiliki izin untuk melakukan ini.');
    }

    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus.');
}

}
