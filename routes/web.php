<?php
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;
//use Symfony\Component\Console\Input\Input;
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

Route::post('/follow/{user}', [App\Http\Controllers\FollowController::class, 'store'])->name('follow');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('post.index');
Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->name('post');
Route::get('/posts/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');
Route::get('/posts/{post}/order', [App\Http\Controllers\OrderController::class, 'order'])->name('order');


Route::get('/delete/{post}', [App\Http\Controllers\PostsController::class, 'destroy']);
Route::get('/delete/order/{order}', [App\Http\Controllers\OrderController::class, 'destroy']);
Route::patch('/status/order/{order}', [App\Http\Controllers\OrderController::class, 'updateOrder']);


Route::get('/search', [App\Http\Controllers\UserController::class, 'search']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [App\Http\Controllers\CommentController::class, 'replyStore'])->name('reply.add');

Route::post('/order/{post}', [App\Http\Controllers\OrderController::class, 'store'])->name('store');

Route::get('/order/{user}/view-order', [App\Http\Controllers\OrderController::class, 'viewOrder'])->name('store');
Route::get('/order/{user}/view-order-notification', [App\Http\Controllers\OrderController::class, 'viewOrderNotification'])->name('store');