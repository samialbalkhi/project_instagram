<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function infouser()
    {
        return Profile::findOrFail(auth()->user()->profile->id);
    }
    public function create(Request $request)
    {
        $profile = Profile::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'user_id' => auth()->user()->id,
        ]);

        return $profile->user;
    }
    public function update(Request $request)
    {
        
        $profile=[
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
        ];
        auth()->user()->profile->update($profile);

        return 'updateed successfully';
    }
}
