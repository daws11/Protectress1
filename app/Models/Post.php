<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Kolom-kolom yang dapat diisi
    protected $fillable = ['content', 'user_id'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Jika Anda memiliki hubungan lain, seperti comments atau likes, Anda dapat mendefinisikannya di sini juga
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

