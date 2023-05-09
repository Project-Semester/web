<?php

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

Route::get('/', function () {
    return view('author/landing');
})->name('landing');

Route::get('/home', function () {
    return view('author/home');
})->name('home');

Route::get('/tambahcerita', function () {
    return view('author/tambahCerita');
})->name('tambahCerita');

Route::get('/tuliscerita', function () {
    return view('author/tulisCerita');
})->name('tulisCerita');

Route::get('/kategoricerita', function () {
    return view('author/kategoriCerita');
})->name('kategoriCerita');
