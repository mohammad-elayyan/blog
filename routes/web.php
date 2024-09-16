<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');

Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

Route::resource('posts', PostController::class)->except(['index', 'create', 'show'])->middleware(['auth', 'can:admin']);
Route::resource('posts', PostController::class)->only(['show']);
Route::resource('posts.comments', CommentController::class)->only(['store'])->middleware('auth');
Route::resource('comments', CommentController::class)->only(['update', 'edit', 'destroy'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show']);
Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware(['auth']);

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');

Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('posts.like')->middleware('auth');
Route::post('/posts/{post}/dislike', [LikeController::class, 'dislike'])->name('posts.dislike')->middleware('auth');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::view('/terms', 'terms');

Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth', 'can:admin'])->name('admin.dashboard');
