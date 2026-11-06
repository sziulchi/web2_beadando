<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ContactController;

Route::redirect('dashboard', '/')->name('dashboard');
Route::get('/', function () { return view('home'); }) ->name('home');
Route::get('data', [DataController::class, 'index'])->name('data');
Route::get('contact', [ContactController::class, 'show'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('user', function () { return view('user'); })->name('user');

        Route::middleware(AdminOnly::class)->group(function () {
            Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
            Route::resource('crud', DriverController::class)->parameters(['crud' => 'driver'])->except('show');
    });
    
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';


