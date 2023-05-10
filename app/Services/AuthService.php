<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Login a user
     */
    public static function loggingIn(array $request): bool
    {
        if (! Auth::attempt($request)) {
            return false;
        }

        return true;
    }

    /**
     * Register a new user
     *
     * @param  UploadedFile  $photo
     */
    public static function signingUp(array $request, ?UploadedFile $photo): User
    {
        if ($photo) {
            $request['photo'] = $photo->store('photo');
        }

        $user = User::create([
            'username' => $request['username'],
            'photo' => $request['photo'],
            'email' => $request['email'],
            'role' => 'author',
            'password' => bcrypt($request['password']),
        ]);

        return $user;
    }

    /**
     * Logout a user
     */
    public static function loggingOut(Authenticatable $user): bool
    {
        $response = $user->currentAccessToken()->delete();

        return $response;
    }
}
