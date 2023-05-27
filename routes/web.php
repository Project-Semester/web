<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Author\AuthCategoryController;
use App\Http\Controllers\Author\StoryController as AuthorStoryController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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

        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});

Route::get('/', function () {
    return view('landing');
})->name('welcome');

Route::get('/home', function () {
    return view('author/home');
})->name('home');

Route::get('/tambahcerita', function () {
    return view('author/tambahCerita');
})->name('tambahCerita');

Route::get('/tuliscerita', function () {
    return view('author/tulisCerita');
})->name('tulisCerita');

Route::prefix('/kategori')->group(function () {
    Route::get('/', [AuthCategoryController::class, 'index'])->name('author.kategori.index');
    Route::get('/{category}', [AuthCategoryController::class, 'show'])->name('author.kategori.show');
    Route::get('/stories/{story}', [AuthorStoryController::class, 'show'])->name('author.story.show');
});

Route::get('/bacacerita', function () {
    return view('author/bacaCerita');
})->name('bacaCerita');

Route::get('/profil', function () {
    return view('author/profil');
})->name('profil');

Route::get('/tambahepisode', function () {
    return view('author/episode/add-episode');
})->name('add-episode');

Route::get('/login', [AuthController::class, 'index'])->name('author.login.page');
Route::get('/register', [AuthController::class, 'index'])->name('author.register.page');

