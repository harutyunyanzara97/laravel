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

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/createCategory}', [App\Http\Controllers\AdminController::class, 'createCategory'])->name('createCategory');
    Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');
    Route::post('/update', [App\Http\Controllers\AdminController::class, 'update'])->name('updateCat');
    Route::get('/edit', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('edit');
    Route::post('/moderator', [App\Http\Controllers\AdminController::class, 'setModerator'])->name('moderators');
    Route::post('/unsetModerator', [App\Http\Controllers\AdminController::class, 'unsetModerator'])->name('unsetmoderators');
    Route::get('/deleteUser/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/check', [App\Http\Controllers\AdminController::class, 'checkType'])->name('checkT');
    Route::post('/uncheck', [App\Http\Controllers\AdminController::class, 'uncheckType'])->name('uncheckT');
});
Route::group(['middleware' => ['moderator']], function () {
    Route::post('/accept', [App\Http\Controllers\UserController::class, 'acceptPost'])->name('accept');
    Route::post('/decline', [App\Http\Controllers\UserController::class, 'declinePost'])->name('decline');

});
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/member-profile/{id}', [App\Http\Controllers\UserController::class, 'memberProfile'])->name('member-profile');
Route::get('/members', [App\Http\Controllers\UserController::class, 'members'])->name('members');
Route::get('/contribute', [App\Http\Controllers\ContributeController::class, 'contribute'])->name('contribute');
Route::post('/editProfile', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editAbout');
Route::post('/storeProfile', [App\Http\Controllers\UserController::class, 'storeProfile'])->name('storeProfile');
Route::get('/account', [App\Http\Controllers\UserController::class, 'account'])->name('account');
Route::get('/balance', [App\Http\Controllers\UserController::class, 'balance'])->name('balance');
Route::post('/followUser', [App\Http\Controllers\UserController::class, 'followUser'])->name('follow-user');
Route::post('/storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::post('/updateUser', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update');
Route::get('/changePassword', [App\Http\Controllers\UserController::class, 'showChangePasswordForm'])->name('changePassword');
Route::post('/toChangePassword', [App\Http\Controllers\UserController::class, 'changePassword']);
Route::post('/check', [App\Http\Controllers\UserController::class, 'checkPosts'])->name('check');
Route::get('/message', [App\Http\Controllers\UserController::class, 'messages'])->name('message');


Route::post('/update-post', [App\Http\Controllers\PostController::class, 'update'])->name('updatePost');
Route::get('/edit-post/{id}', [App\Http\Controllers\PostController::class, 'editPost'])->name('editPost');
Route::get('/deletePost/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');
Route::get('/myPosts', [App\Http\Controllers\PostController::class, 'myPosts'])->name('myPosts');
Route::get('/member-posts', [App\Http\Controllers\PostController::class, 'memberPosts'])->name('member-posts');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::post('/insertComment', [App\Http\Controllers\PostController::class, 'insertComments'])->name('insertComment');
Route::post('/followPost', [App\Http\Controllers\PostController::class, 'followPost'])->name('follow-post');
Route::post('/likePost', [App\Http\Controllers\PostController::class, 'likePost'])->name('like-post');
Route::get('/createPost/{id}', [App\Http\Controllers\PostController::class, 'createPost'])->name('createPost');
Route::get('/comments/{id}', [App\Http\Controllers\PostController::class, 'comments'])->name('comments');
Route::post('/ratePost', [App\Http\Controllers\PostController::class, 'rate']);
Route::post('/rating/{post}',[App\Http\Controllers\PostController::class, 'PostController'])->name('productStar');
Route::get('/preview', [App\Http\Controllers\PostController::class, 'preview']);
Route::post('/rating', [App\Http\Controllers\PostController::class, 'rate_post'])->name('rate');



Route::post('/edit-comment', [App\Http\Controllers\CommentController::class, 'editComment'])->name('editComment');
Route::post('/edit-reply', [App\Http\Controllers\CommentController::class, 'editReply'])->name('editReply');
Route::post('/edit-answer', [App\Http\Controllers\CommentController::class, 'editAnswer'])->name('editAnswer');
Route::get('/deleteComment/{id}', [App\Http\Controllers\CommentController::class, 'deleteComment'])->name('deleteComment');
Route::get('/myComments', [App\Http\Controllers\CommentController::class, 'myComments'])->name('myComments');
Route::get('/member-comments', [App\Http\Controllers\CommentController::class, 'memberComments'])->name('member-comments');
Route::post('/likeComment', [App\Http\Controllers\CommentController::class, 'likeComment'])->name('like-comment');

Route::get('/deleteReply/{id}', [App\Http\Controllers\CommentController::class, 'deleteReply'])->name('deleteReply');
Route::get('/deleteAnswer/{id}', [App\Http\Controllers\CommentController::class, 'deleteAnswer'])->name('deleteAnswer');
Route::post('/reply', [App\Http\Controllers\CommentController::class, 'reply'])->name('replyMe');
Route::post('/answer', [App\Http\Controllers\CommentController::class, 'reply_to_reply'])->name('answer');
Route::post('/answer-to', [App\Http\Controllers\CommentController::class, 'answer_to_reply'])->name('answerToReply');
Route::get('/dislike', [App\Http\Controllers\CommentController::class, 'dislike'])->name('dislike');
Route::post('/rateComment', [App\Http\Controllers\CommentController::class, 'rate']);
Route::post('/rateReply', [App\Http\Controllers\CommentController::class, 'reply_rate']);


Route::get('/network', [App\Http\Controllers\CategoryController::class, 'index'])->name('network');
Route::get('/show/{id}', [App\Http\Controllers\CategoryController::class, 'showPosts'])->name('showPosts');
Route::post('/insert', [App\Http\Controllers\CategoryController::class, 'followCategory'])->name('insert');



Route::get('stripe', [App\Http\Controllers\StripePaymentController::class,'stripe'])->name('stripe');
Route::post('stripe-post', [App\Http\Controllers\StripePaymentController::class,'stripePost'])->name('stripe.post');
Route::post('stripe-payout', [App\Http\Controllers\StripePaymentController::class,'payout'])->name('stripe.payout');
Route::post('pay', [App\Http\Controllers\StripePaymentController::class,'pay'])->name('pay');
Route::post('payComment', [App\Http\Controllers\StripePaymentController::class,'payForComment'])->name('stripe.payComment');
Route::post('payReply', [App\Http\Controllers\StripePaymentController::class,'payForReply'])->name('stripe.payReply');
Route::post('stripe-donate', [App\Http\Controllers\StripePaymentController::class,'donation'])->name('stripe.donate');
Route::post('card', [App\Http\Controllers\StripePaymentController::class,'card_create'])->name('stripe.create');
Route::get('/history', [App\Http\Controllers\StripePaymentController::class, 'history'])->name('history');


Route::get('/searchCat',[App\Http\Controllers\SearchController::class,'searchCategory']);
Route::get('/filterCat',[App\Http\Controllers\SearchController::class,'filterCatByDate']);
Route::get('/filterCatByComments',[App\Http\Controllers\SearchController::class,'filterCatByComments']);
Route::get('/filterCatByPosts',[App\Http\Controllers\SearchController::class,'filterCatByPosts']);
Route::get('/searchPost',[App\Http\Controllers\SearchController::class,'searchPost']);
Route::get('/messages', [\App\Http\Controllers\Api\V1\MessagesController::class,'fetchMessages'])->name('fetchMessages');
Route::get('/chats', [\App\Http\Controllers\Api\V1\MessagesController::class,'index'])->name('chats');
Route::post('/messages', [\App\Http\Controllers\Api\V1\MessagesController::class,'store'])->name('sendMessage');


//Route::post('/messages', [App\Http\Controllers\Api\V1\MessagesController::class,'index']);
////    Route::get('/messages', [App\Http\Controllers\Api\V1\MessagesController::class,'fetchMessages']);
//Route::post('/messages/send', [App\Http\Controllers\Api\V1\MessagesController::class,'store']);

Route::get('users', [App\Http\Controllers\Api\V1\UsersChatController::class,'index']);




Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');

