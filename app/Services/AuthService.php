<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;

class AuthService
{
    /**
     * Login a user
     */
    public static function loggingIn(array $request): bool
    {
        if (! auth()->attempt($request)) {
            return false;
        }

        return true;
    }

    public static function loginAdmin(array $credentials): bool
    {
        if (! auth()->attempt($credentials)) {
            return false;
        }

        if (! auth()->user()->role === 'admin') {
            return false;
        }

        return true;
    }

    /**
     * Register a new user
     *
     * @param  UploadedFile  $photo
     */
    public static function signingUp(array $request, UploadedFile $photo = null): User
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

    public static function registerAdmin(array $input): User
    {
        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'role' => 'admin',
            'password' => bcrypt($input['password']),
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
