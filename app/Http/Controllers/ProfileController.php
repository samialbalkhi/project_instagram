<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function infouser()
    {
        return Profile::findOrFail(auth()->user()->id);
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
}
