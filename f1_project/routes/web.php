<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;

Route::get('/', function () {return Inertia::render('welcome');})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/', function () { return view('home'); }) ->name('home');

