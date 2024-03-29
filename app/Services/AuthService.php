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
    public static function login(array $creadentials): bool
    {
        return auth()->attempt($creadentials);
    }

    /**
     * Register a new user
     *
     * @param  UploadedFile  $photo
     */
    public static function registerAuthor(array $input, ?UploadedFile $photo): User
    {
        if ($photo) {
            $input['photo'] = $photo->store('photo');
        }

        $user = User::create([
            'username' => $input['username'],
            'photo' => $photo ? $input['photo'] : null,
            'email' => $input['email'],
            'role' => 'author',
            'password' => bcrypt($input['password']),
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
    public static function logout(Authenticatable $user): bool
    {
        return $user->currentAccessToken()->delete();
    }
}
