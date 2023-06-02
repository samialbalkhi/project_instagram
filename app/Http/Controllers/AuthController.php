<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\People;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequset;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // $email = str_replace('@', '', $request->email);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $path = $request->file('file')->store($request->email, 'public');
        $user->image()->create([
            'user_id' => $user->id,
            'image' => $path,
        ]);

        $token = $user->createToken('token-name')->plainTextToken;
        $respones = [
            'user' => $user,
            'token' => $token,
        ];

        return response($respones, 201);
    }

    public function login(LoginRequset $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(
                [
                    'message' => 'bad password',
                ],
                401,
            );
        } else {
            return 'asd';
        }
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return [
            'message' => 'logout',
        ];
    }
}
