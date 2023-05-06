<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserService.
 */
class UserService
{
    public static function findAllUsers(): Collection
    {
        $users = User::all();

        return $users;
    }

    public static function findUser(string $userId): User
    {
        $user = User::findOrFail($userId);

        return $user;
    }
    
    public static function findUserById(User $user): User
    {
        $user->load(['stories' => function ($query) {
            $query->with(['category', 'like'])
                    ->withCount(['episodes', 'likes', 'comments']);
        }]);

        return $user;
    }

    public static function changeUser(array $request, User $user): User
    {
        $user->update([
            'username' => $request['username'],
            'email' => $request['email']
        ]);

        $user->fresh();

        return $user;
    }

    public static function changePassword(array $request, User $user): User
    {
        $user->update([
            'password' => bcrypt($request['password'])
        ]);

        $user->fresh();

        return $user;
    }
}
