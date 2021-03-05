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
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => 'auth'], function() {
//    Route::get('/home', [App\Http\Controllers\PlanController::class,'index'])->name('home');
    Route::get('/plans', [App\Http\Controllers\PlanController::class,'index'])->name('plans.index');
//    Route::get('/plan', [App\Http\Controllers\PlanController::class,'show'])->name('show');
    Route::post('/subscription', [App\Http\Controllers\SubscriptionController::class,'create'])->name('subscription');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/createCategory}', [App\Http\Controllers\AdminController::class, 'createCategory'])->name('createCategory');
    Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');
    Route::post('/update', [App\Http\Controllers\AdminController::class, 'update'])->name('updateCat');
    Route::get('/edit', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('edit');
});
Route::get('/network', [App\Http\Controllers\CategoryController::class, 'index'])->name('network');
Route::get('/deletePost/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/member-profile/{id}', [App\Http\Controllers\UserController::class, 'membeProfile'])->name('member-profile');
Route::get('/members', [App\Http\Controllers\UserController::class, 'members'])->name('members');
Route::get('/contribute', [App\Http\Controllers\ContributeController::class, 'contribute'])->name('contribute');
Route::post('/editProfile', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editAbout');
Route::post('/storeProfile', [App\Http\Controllers\UserController::class, 'storeProfile'])->name('storeProfile');
//Route::post('/dashboard', [App\Http\Controllers\UserController::class, 'signIn'])->name('dashboard');
Route::get('/account', [App\Http\Controllers\UserController::class, 'account'])->name('account');
Route::get('/balance', [App\Http\Controllers\UserController::class, 'balance'])->name('balance');
Route::get('/history', [App\Http\Controllers\StripePaymentController::class, 'history'])->name('history');
Route::post('/update-post', [App\Http\Controllers\PostController::class, 'update'])->name('updatePost');
Route::get('/edit-post', [App\Http\Controllers\PostController::class, 'editPost'])->name('editPost');
Route::get('/myPosts', [App\Http\Controllers\PostController::class, 'myPosts'])->name('myPosts');
Route::get('/member-posts', [App\Http\Controllers\PostController::class, 'memberPosts'])->name('member-posts');
Route::get('/myComments', [App\Http\Controllers\CommentController::class, 'myComments'])->name('myComments');
Route::get('/member-comments', [App\Http\Controllers\CommentController::class, 'memberComments'])->name('member-comments');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::post('/insertComment', [App\Http\Controllers\PostController::class, 'insertComments'])->name('insertComment');
Route::get('/insert', [App\Http\Controllers\CategoryController::class, 'insertFollows'])->name('insert');
Route::get('/insertLike', [App\Http\Controllers\CommentController::class, 'insertLikes'])->name('insertLike');
Route::post('/reply', [App\Http\Controllers\CommentController::class, 'reply'])->name('replyMe');
Route::post('/answer', [App\Http\Controllers\CommentController::class, 'reply_to_reply'])->name('answer');
Route::post('/answer-to', [App\Http\Controllers\CommentController::class, 'answer_to_reply'])->name('answerToReply');
Route::get('/show/{id}', [App\Http\Controllers\CategoryController::class, 'showPosts'])->name('showPosts');
Route::get('/unfollow', [App\Http\Controllers\CategoryController::class, 'unfollow'])->name('unfollow');
Route::get('/dislike', [App\Http\Controllers\CommentController::class, 'dislike'])->name('dislike');
Route::get('/followUser', [App\Http\Controllers\UserController::class, 'followUser'])->name('follow-user');
Route::get('/unfollowUser', [App\Http\Controllers\UserController::class, 'unfollowUser'])->name('unfollow-user');
Route::get('/followPost', [App\Http\Controllers\PostController::class, 'followPost'])->name('follow-post');
Route::get('/unfollowPost', [App\Http\Controllers\PostController::class, 'unfollowPost'])->name('unfollow-post');
Route::post('/storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::post('/updateUser', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update');
Route::get('/createPost/{id}', [App\Http\Controllers\PostController::class, 'createPost'])->name('createPost');
Route::get('/comments/{id}', [App\Http\Controllers\PostController::class, 'comments'])->name('comments');
Route::get('stripe', [App\Http\Controllers\StripePaymentController::class,'stripe'])->name('stripe');
Route::post('stripe-post', [App\Http\Controllers\StripePaymentController::class,'stripePost'])->name('stripe.post');
Route::post('stripe-payout', [App\Http\Controllers\StripePaymentController::class,'payout'])->name('stripe.payout');
Route::post('pay', [App\Http\Controllers\StripePaymentController::class,'pay'])->name('stripe.pay');
Route::post('stripe-donate', [App\Http\Controllers\StripePaymentController::class,'donation'])->name('stripe.donate');
Route::post('card', [App\Http\Controllers\StripePaymentController::class,'card_create'])->name('stripe.create');
Route::get('/searchCat',[App\Http\Controllers\SearchController::class,'searchCategory']);
Route::get('/searchPost',[App\Http\Controllers\SearchController::class,'searchPost']);





Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');

