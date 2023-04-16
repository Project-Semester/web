<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function login()
    {
        return 'Ini login';
    }

    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        try {
            $user = $this->service->signingUp($validated);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        $data = [
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->username)
                ->plainTextToken
        ];

        return $this->success($data, "A new user added successfully", 201);
    }

    public function logout()
    {
        return 'ini logout';
    }
}
