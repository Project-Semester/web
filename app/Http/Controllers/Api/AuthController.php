<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $this->service->loggingIn($validated);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        $user = Auth::user();

        $data = [
            'user' => $user,
            'token' => $user->createToken('API Token of '.$user->username)
                ->plainTextToken,
        ];

        return $this->success($data, 'A user logged successfully');
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $user = $this->service->signingUp($validated);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        $data = [
            'user' => $user,
            'token' => $user->createToken('API Token of '.$user->username)
                ->plainTextToken,
        ];

        return $this->success($data, 'A new user added successfully', 201);
    }

    public function logout(): JsonResponse
    {
        $user = Auth::user();

        try {
            $this->service->loggingOut($user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([], 'A user logged out successfully');
    }
}
