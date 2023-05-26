<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function index(): View
    {
        return view('admin.auth.login');
    }

    public function authenticate(LoginUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $response = $this->service->login($validated);
        } catch (\Exception $error) {
            return back()->with('failed', 'Login anda gagal!');
        }

        if (! $response) {
            return back()->with('failed', 'Login anda gagal!');
        }

        $request->session()->regenerate();

        return redirect()->route('admin.home');
    }

    public function create(): View
    {
        return view('admin.auth.register');
    }

    public function register(RegisterUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $user = $this->service->registerAdmin($validated);
        } catch (\Exception $error) {
            return back()->with('failed', 'Registrasi anda gagal!');
        }

        if (! $user) {
            return back()->with('failed', 'Registrasi anda gagal!');
        }

        return redirect()->route('auhtor.login');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('author.login');
    }
}
