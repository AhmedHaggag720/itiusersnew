<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware(['auth']);

Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware(['auth']);

Route::get('/users/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('users.show');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->where('id', '[0-9]+')->name('users.edit')->middleware(['auth']);

Route::put('users/{id}', [UserController::class, 'update'])->where('id', '[0-9]+')->name('users.update')->middleware(['auth']);

Route::delete('/users/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+')->name('users.destroy')->middleware(['auth']);



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])->where('id', '[0-9]+')->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->where('id', '[0-9]+')->name('posts.edit');

Route::put('posts/{id}', [PostController::class, 'update'])->where('id', '[0-9]+')->name('posts.update');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+')->name('posts.destroy');

Route::get('/posts/restore', [PostController::class, 'restore'])->name('posts.restore');

Route::post('/posts/{id}/restore/', [PostController::class, 'restoredeleted'])->name('posts.restoredeleted');



Route::fallback( function(){
    return '<h1> Something went wrong please try again</h1>' ;
});