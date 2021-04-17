<?php
namespace App\Http\Controllers;

use App\Helpers\ResponseWith;

class UserController
{
    public function me()
    {
        return response(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return ResponseWith::token(auth()->refresh());
    }
}
