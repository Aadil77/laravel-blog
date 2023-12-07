<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
 

Route::get('/', [App\Http\Controllers\PostController::class, 'homeIndex'])->name('home');
Route::get('single/{id}', [App\Http\Controllers\PostController::class, 'single'])->name('single');

 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(PostController::class)->prefix('posts')->group(function () {
        Route::get('', 'index')->name('posts');
        Route::get('create', 'create')->name('posts.create');
        Route::post('store', 'store')->name('posts.store');
        Route::get('show/{id}', 'show')->name('posts.show');
        Route::get('edit/{id}', 'edit')->name('posts.edit');
        Route::put('edit/{id}', 'update')->name('posts.update');
        Route::delete('destroy/{id}', 'destroy')->name('posts.destroy');
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});