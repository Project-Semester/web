<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function () {
    Route::middleware('guestAdmin')->group(function () {
        Route::redirect('/', '/admin/login');
        Route::get('/login', [AuthController::class, 'index'])->name('admin.login.page');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.login');
        Route::get('/register', [AuthController::class, 'create'])->name('admin.register.page');
        Route::post('/register', [AuthController::class, 'register'])->name('admin.register');
    });

    Route::middleware('isAdmin')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
