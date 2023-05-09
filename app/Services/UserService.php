<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            $query->with(['category', 'like'])->withCount(['episodes', 'likes', 'comments']);
        }]);

        return $user;
    }

    public static function changeUser(array $request, ?UploadedFile $photo, User $user): User
    {
        if ($photo) {
            if ($user->photo) {
                Storage::move($user->photo, $photo);
            }

            $request['photo'] = $photo->store('photo');
        }

        $user->updateOrFail($request);

        return $user;
    }

    public static function changePassword(array $request, User $user): User
    {
        $user->updateOrFail([
            'password' => bcrypt($request['password']),
        ]);

        return $user;
    }

    public function deleteUser(User $user): bool
    {
        Storage::delete($user->picture);

        return $user->deleteOrFail();
    }
}
