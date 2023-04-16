<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function loggingIn(array $request)
    {
        return 'hello';
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

    public function loggingOut(array $request)
    {
        return 'hello';
    }
}
