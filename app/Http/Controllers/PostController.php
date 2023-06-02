<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\For_;

class PostController extends Controller
{
    // public function create(Request $request)
    // {
      
        
    //     // for ($i = 0; $i < count($request->file); $i++) {
    //     //     // $path = $request->file[$i]->store($request->id, 'public');
    //     //  return   $request->file[$i];
         
       
    // }
    //         // return 'added successfully';



public function create(Request $request)
{
    $posts = Post::create([
        'caption' => $request->caption,
        'user_id' => auth()->user()->id,
    ]);

    

        // for ($i = 0; $i < count($request->file); $i++) {
            for ($i = 0; $i < count($request->file); $i++){
            $path = $request->file[$i]->store($request->id, 'public');
            dd($path);
        // $filename = $image->getClientOriginalName();
 
        // $image->move(public_path('file'),$filename);

        //  $posts->images()->create([
        //     'image' => $image,
        //     'user_id' => auth()->user()->id,
        // ]);
    }

            return 'added successfully';
    
}
}