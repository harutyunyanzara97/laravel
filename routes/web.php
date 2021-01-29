<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/network', [App\Http\Controllers\CategoryController::class, 'index'])->name('network');
Route::get('/home', [App\Http\Controllers\UserController::class, 'home'])->name('home');
Route::get('/signup', [App\Http\Controllers\UserController::class, 'sign_up'])->name('signup');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::post('/editProfile', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');
Route::post('/dashboard', [App\Http\Controllers\UserController::class, 'signIn'])->name('dashboard');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logoutUser');
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::get('/insert', [App\Http\Controllers\CategoryController::class, 'insertFollows'])->name('insert');
Route::get('/show/{id}', [App\Http\Controllers\CategoryController::class, 'showPosts'])->name('showPosts');
Route::get('/edit', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit');
Route::get('/unfollow', [App\Http\Controllers\CategoryController::class, 'unfollow'])->name('unfollow');
Route::post('/storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::post('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('create');


