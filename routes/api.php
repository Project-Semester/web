<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Author\AuthorEpisodeController;
use App\Http\Controllers\Api\Author\AuthorStoryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\StoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('/me')->group(function () {
        Route::controller(AuthorStoryController::class)->prefix('/stories')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{story}', 'show');
            Route::patch('/{story}', 'update');
            Route::delete('/{story}', 'destroy');
        });

        Route::controller(AuthorEpisodeController::class)->group(function () {
            Route::get('/stories/{story}/episodes', 'index');
            Route::post('/stories/{story}/episodes', 'store');
            Route::get('/episodes/{episode}', 'show');
            Route::patch('/episodes/{episode}', 'update');
            Route::delete('/episodes/{episode}', 'destroy');
        });
    });

    Route::controller(StoryController::class)->prefix('/stories')->group(function () {
        Route::get('/', 'index');
        Route::get('/{story}', 'show');
    });

    Route::controller(EpisodeController::class)->group(function () {
        Route::get('/stories/{story}/episodes', 'index');
        Route::get('/episodes/{episode}', 'show');
    });

    Route::controller(CategoryController::class)->prefix('/categories')->group(function () {
        Route::get('/', 'index');
        Route::get('/{category}', 'show');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
