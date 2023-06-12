<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function create(Post $post, Request $request)
    {
        if ($post->likeBy($request->user())) {
            return response(null, 409);
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
    }
    public function delete(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id',$post->id)->delete();
    }
}
