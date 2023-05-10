<?php

use App\Http\Controllers\Admin\AuthController;
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

Route::middleware('guest')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', function () {
            return view('admin.welcome');
        });
        Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    });
});
