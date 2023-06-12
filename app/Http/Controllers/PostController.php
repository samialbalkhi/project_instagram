<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\For_;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $posts = Post::create([
            'caption' => 'asdasdasdasd',
            'user_id' => 2,
        ]);

        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('post/user/' . $posts->user_id, $file->getClientOriginalName(), 'image_post');

                $posts->images()->create([
                    'image' => $name,
                    'user_id' => 2,
                ]);
            }
            return response()->json(['message' => 'deleted successfully']);

        }
    }
    public function delete($id)
    {
        Post::destroy($id);

        return response()->json(['message' => 'deleted successfully']);
    }
}
