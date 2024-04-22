<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    /**
     * Store a newly created like in storage.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function store($postId)
    {
        $post = Post::findOrFail($postId);
        
        // Cek jika user sudah like post ini
        $existing_like = Like::where('user_id', Auth::id())->where('post_id', $postId)->first();

        if (!$existing_like) {
            $like = new Like();
            $like->post_id = $postId;
            $like->user_id = Auth::id();
            $like->save();

            return back()->with('success', 'Anda menyukai postingan ini.');
        } else {
            return back()->with('info', 'Anda sudah menyukai postingan ini.');
        }
    }

    /**
     * Remove the specified like from storage.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $postId)->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Like telah dihapus.');
        }

        return back()->with('info', 'Anda belum menyukai postingan ini.');
    }
}

