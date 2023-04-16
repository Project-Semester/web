<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function loggingIn(array $request)
    {
        if (!Auth::attempt($request)) {
            return false;
        }

        return true;
    }

    public function signingUp(array $request)
    {
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        return $user;
    }

    public function loggingOut($user)
    {
        $response = $user->currentAccessToken()->delete();

        return $response ? true : false;
    }

    public function findingUserByEmail(string $email)
    {
        $user = User::where('email', $email)->first();

        return $user;
    }
}
