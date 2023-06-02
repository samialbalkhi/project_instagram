<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showuser()
    {
    return User::with('image')->get();
         
    }
}
