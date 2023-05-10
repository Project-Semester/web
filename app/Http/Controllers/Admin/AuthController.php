<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\AuthService;
use Illuminate\View\View;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function index(): View
    {
        return view('admin.login');
    }

    public function login(LoginUserRequest $request)
    {
        # code...
    }
}
