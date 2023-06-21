<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Author\AuthCategoryController;
use App\Http\Controllers\Author\AuthController as AuthorAuthController;
use App\Http\Controllers\Author\EpisodeController as AuthorEpisodeController;
use App\Http\Controllers\Author\ProfileController as AuthorProfileController;
use App\Http\Controllers\Author\StoryController as AuthorStoryController;
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
})->name('welcome');

Route::middleware('guestAuthor')->group(function () {
    Route::redirect('/', '/login');
    Route::get('/login', [AuthorAuthController::class, 'index'])->name('author.login.page');
    Route::post('/login', [AuthorAuthController::class, 'authenticate'])->name('author.login');
    Route::get('/register', [AuthorAuthController::class, 'create'])->name('author.register.page');
    Route::post('/register', [AuthorAuthController::class, 'register'])->name('author.register');
});

Route::middleware('isAuthor')->group(function () {
    Route::prefix('/stories')->group(function () {
        Route::get('/', [AuthorStoryController::class, 'index'])->name('author.story.index');
        Route::get('/create', [AuthorStoryController::class, 'create'])->name('author.story.create');
        Route::post('/', [AuthorStoryController::class, 'store'])->name('author.story.store');
        Route::get('/{story}', [AuthorStoryController::class, 'show'])->name('author.story.show');
        Route::get('/{story}/edit', [AuthorStoryController::class, 'edit'])->name('author.story.edit');
        Route::patch('/{story}', [AuthorStoryController::class, 'update'])->name('author.story.update');
        Route::delete('/{story}', [AuthorStoryController::class, 'destroy'])->name('author.story.destroy');
    });

    Route::get('/stories/{story}/episodes', [AuthorEpisodeController::class, 'index'])->name('author.episode.index');
    Route::get('/stories/{story}/episodes/create', [AuthorEpisodeController::class, 'create'])->name('author.episode.create');
    Route::post('/stories/{story}/episodes', [AuthorEpisodeController::class, 'store'])->name('author.episode.store');
    Route::get('/episodes/{episode}', [AuthorEpisodeController::class, 'show'])->name('author.episode.show');
    Route::get('/episodes/{episode}/edit', [AuthorEpisodeController::class, 'edit'])->name('author.episode.edit');
    Route::patch('/episodes/{episode}', [AuthorEpisodeController::class, 'update'])->name('author.episode.update');
    Route::delete('/episodes/{episode}', [AuthorEpisodeController::class, 'destroy'])->name('author.episode.destroy');

    Route::get('/profil', [AuthorProfileController::class, 'index'])->name('author.profile.index');
    Route::post('/profil', [AuthorProfileController::class, 'update'])->name('author.profile.update');

    Route::prefix('/categories')->group(function () {
        Route::get('/', [AuthCategoryController::class, 'index'])->name('author.category.index');
        Route::get('/{category}', [AuthCategoryController::class, 'show'])->name('author.category.show');
    });

    Route::get('/bacacerita', function () {
        return view('author/bacaCerita');
    })->name('bacaCerita');

    Route::get('/tambahepisode', function () {
        return view('author/episode/add-episode');
    })->name('add-episode');

    Route::get('/logout', [AuthorAuthController::class, 'logout'])->name('author.logout');
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
        Route::get('/stories', [StoryController::class, 'index'])->name('admin.story.index');
        Route::get('/stories/{story}', [StoryController::class, 'show'])->name('admin.story.show');

        Route::get('/episodes/{episode}', [EpisodeController::class, 'show'])->name('admin.episode.show');

        Route::prefix('/categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });

        Route::prefix('/authors')->group(function () {
            Route::get('/', [AuthorController::class, 'index'])->name('admin.author.index');
        });

        Route::prefix('/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('admin.profile.index');
            Route::patch('/{user}', [ProfileController::class, 'update'])->name('admin.profile.update');
        });

        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
