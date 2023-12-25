<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

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


Route::get('/terms', [DashboardController::class, 'terms']);


// 1. model - name in a singular form
// 2. controller
// 3. migration
// 4. setup the routes
// php artisan make:model Name -m -c
// -m - migration
// -c - controller