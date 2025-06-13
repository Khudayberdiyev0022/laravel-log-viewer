<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/log', function () {
  \Illuminate\Support\Facades\Log::info('test log');
  \Illuminate\Support\Facades\Log::warning('Warning test log');
  \Illuminate\Support\Facades\Log::channel('daily')->error('Warning test log');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
