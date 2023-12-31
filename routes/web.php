<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDahboardController;

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

// Route::group([ 'prefix' => 'ideas/', 'as' => 'ideas.'], function(){
//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');
    
//     Route::group(['middlewear' => ['auth']], function() {
//         Route::post('/', [IdeaController::class, 'store'])->name('store');
        
//         Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        
//         Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
        
//         Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        
//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
//     });
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');

Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


Route::get('/terms', function() {
    return view('terms');
})->name('terms');

Route::get('/admin', [AdminDahboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');


// 1. model - name in a singular form
// 2. controller
// 3. migration
// 4. setup the routes
// php artisan make:model Name -m -c
// -m - migration
// -c - controller
// -r - resurce (creteas 7 standart functions in controller)