<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;


// Define a new route that redirects to the registration page
Route::redirect('/', '/login');


Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');



Route::get('/posts/create', function() {
    return view('posts.create');
})->name('posts.create');


Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('home');
});
Route::post('create', [PostController::class, 'store'])->name('create');
Route::get('show/{id}', [PostController::class, 'show'])->name('show');
Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('delete/{id}', [PostController::class, 'destroy'])->name('delete');


