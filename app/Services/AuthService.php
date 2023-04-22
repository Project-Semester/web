<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function loggingIn(array $request): bool
    {
        if (! Auth::attempt($request)) {
            return false;
        }

        return true;
    }

    public function signingUp(array $request): Collection
    {
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return $user;
    }

    public function loggingOut($user): bool
    {
        $response = $user->currentAccessToken()->delete();

        return $response ? true : false;
    }

    public function findingUserByEmail(string $email): Model
    {
        $user = User::firstWhere('email', $email);

        return $user;
    }
}
