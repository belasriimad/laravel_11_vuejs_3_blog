<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Like a post
     *
     * @param Post $post
     * @return void
     */
    public function like(Post $post)
    {
        $post->increment('likes');
        return response()->json([
            'message' => 'like added successfully'
        ]);
    }

    /**
     * Dislike a post
     *
     * @param Post $post
     * @return void
     */
    public function dislike(Post $post)
    {
        $post->decrement('likes');
        return response()->json([
            'message' => 'dislike added successfully'
        ]);
    }
}
