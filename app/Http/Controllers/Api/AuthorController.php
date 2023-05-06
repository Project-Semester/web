<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {
        if (auth()->user()->cant('viewAny', User::class)) {
            return $this->error('Unauthorized', 403);
        }

        try {
            $authors = $this->service->findAllUsers();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($authors, "These All Authors");
    }

    public function show(User $user)
    {
        if (auth()->user()->cant('viewAny', User::class)) {
            return $this->error('Unauthorized', 403);
        }

        try {
            $authors = $this->service->findUserById($user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($authors, "This is Your Author");
    }
}
