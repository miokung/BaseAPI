<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseWith;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->name,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = auth()->login($user);

        return ResponseWith::token($token);
    }

    public function login()
    {
        $credentials = request(['username', 'password']);
        //return response()->json($credentials);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return ResponseWith::token($token);
    }
}
