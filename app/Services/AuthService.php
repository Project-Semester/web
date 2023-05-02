<?php

namespace App\Services;

use App\Models\User;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function loggingIn(array $request): bool
    {
        if (! Auth::attempt($request)) {
            return false;
        }

        return true;
    }

    public static function signingUp(array $request): User
    {
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return $user;
    }

    public static function loggingOut(Authenticatable $user): bool
    {
        $response = $user->currentAccessToken()->delete();

        return $response ? true : false;
    }
}
