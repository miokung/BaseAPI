<?php
namespace App\Helpers;

class ResponseWith
{
    public static function token()
    {
        return response([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }
}
