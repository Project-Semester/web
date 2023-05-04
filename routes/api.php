<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Author\AuthorEpisodeController;
use App\Http\Controllers\Api\Author\AuthorStoryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\StoryController;
use App\Http\Controllers\LikeController;
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
        Route::prefix('/stories')->group(function () {
            Route::get('/', [AuthorStoryController::class, 'index']);
            Route::post('/', [AuthorStoryController::class, 'store']);
            Route::get('/{story}', [AuthorStoryController::class, 'show']);
            Route::patch('/{story}', [AuthorStoryController::class, 'update']);
            Route::delete('/{story}', [AuthorStoryController::class, 'destroy']);
            Route::get('/{story}/episodes', [AuthorEpisodeController::class, 'index']);
            Route::post('/{story}/episodes', [AuthorEpisodeController::class, 'store']);
        });

        Route::prefix('/episodes')->group(function () {
            Route::get('/{episode}', [AuthorEpisodeController::class, 'show']);
            Route::patch('/{episode}', [AuthorEpisodeController::class, 'update']);
            Route::delete('/{episode}', [AuthorEpisodeController::class, 'destroy']);
        });
    });

    Route::prefix('/stories')->group(function () {
        Route::get('/', [StoryController::class, 'index']);
        Route::get('/{story}', [StoryController::class, 'show']);
        Route::get('/{story}/episodes', [EpisodeController::class, 'index']);
        Route::post('/{story}/comments', [CommentController::class, 'story']);
        Route::get('/{story}/like', [LikeController::class, 'story']);
    });

    Route::prefix('/episodes')->group(function () {
        Route::get('/{episode}', [EpisodeController::class, 'show']);
        Route::post('/{episode}/comments', [CommentController::class, 'episode']);
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{category}', [CategoryController::class, 'show']);
    });

    Route::prefix('/comments')->group(function () {
        Route::patch('/{comment}', [CommentController::class, 'update']);
        Route::delete('/{comment}', [CommentController::class, 'destroy']);
        Route::post('/{comment}/replies', [CommentController::class, 'reply']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    // Route::prefix('/me')->group(function () {
    //     Route::controller(AuthorStoryController::class)->prefix('/stories')->group(function () {
    //         Route::get('/', 'index');
    //         Route::post('/', 'store');
    //         Route::get('/{story}', 'show');
    //         Route::patch('/{story}', 'update');
    //         Route::delete('/{story}', 'destroy');
    //     });

    //     Route::controller(AuthorEpisodeController::class)->group(function () {
    //         Route::get('/stories/{story}/episodes', 'index');
    //         Route::post('/stories/{story}/episodes', 'store');
    //         Route::get('/episodes/{episode}', 'show');
    //         Route::patch('/episodes/{episode}', 'update');
    //         Route::delete('/episodes/{episode}', 'destroy');
    //     });
    // });

    // Route::controller(StoryController::class)->prefix('/stories')->group(function () {
    //     Route::get('/', 'index');
    //     Route::get('/{story}', 'show');
    // });

    // Route::controller(EpisodeController::class)->group(function () {
    //     Route::get('/stories/{story}/episodes', 'index');
    //     Route::get('/episodes/{episode}', 'show');
    // });

    // Route::controller(CategoryController::class)->prefix('/categories')->group(function () {
    //     Route::get('/', 'index');
    //     Route::get('/{category}', 'show');
    // });

    // Route::controller(CommentController::class)->group(function () {
    //     Route::post('/stories/{story}/comments', 'story');
    //     Route::post('/episodes/{episode}/comments', 'episode');
    //     Route::post('/comments/{comment}/replies', 'reply');
    // });

    // Route::post('/logout', [AuthController::class, 'logout']);
});
