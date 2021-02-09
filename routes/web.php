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
    return view('login');
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\PlanController::class,'index'])->name('home');
    Route::get('/plans', [App\Http\Controllers\PlanController::class,'index'])->name('plans.index');
    Route::get('/plan', [App\Http\Controllers\PlanController::class,'show'])->name('show');
    Route::post('/subscription', [App\Http\Controllers\SubscriptionController::class,'create'])->name('subscription');
});

Route::get('/network', [App\Http\Controllers\CategoryController::class, 'index'])->name('network');
Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
Route::get('/deletePost/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');
Route::get('/home', [App\Http\Controllers\UserController::class, 'home'])->name('home');
Route::get('/signup', [App\Http\Controllers\UserController::class, 'sign_up'])->name('signup');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/members', [App\Http\Controllers\UserController::class, 'members'])->name('members');
Route::get('/contribute', [App\Http\Controllers\ContributeController::class, 'contribute'])->name('contribute');
Route::post('/storeProfile', [App\Http\Controllers\UserController::class, 'storeProfile'])->name('storeProfile');
Route::post('/dashboard', [App\Http\Controllers\UserController::class, 'signIn'])->name('dashboard');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logoutUser');
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/account', [App\Http\Controllers\UserController::class, 'account'])->name('account');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::post('/insertComment', [App\Http\Controllers\PostController::class, 'insertComments'])->name('insertComment');
Route::get('/insert', [App\Http\Controllers\CategoryController::class, 'insertFollows'])->name('insert');
Route::get('/insertLike', [App\Http\Controllers\CommentController::class, 'insertLikes'])->name('insertLike');
Route::get('/show/{id}', [App\Http\Controllers\CategoryController::class, 'showPosts'])->name('showPosts');
Route::get('/edit', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit');
Route::get('/unfollow', [App\Http\Controllers\CategoryController::class, 'unfollow'])->name('unfollow');
Route::get('/dislike', [App\Http\Controllers\CommentController::class, 'dislike'])->name('dislike');
Route::post('/storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::post('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
Route::get('/createPost/{id}/{name{', [App\Http\Controllers\PostController::class, 'createPost'])->name('createPost');
Route::get('/comments/{id}', [App\Http\Controllers\PostController::class, 'comments'])->name('comments');


