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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group([ 'prefix' => 'ideas/', 'as' => 'ideas.'], function(){
    Route::post('/', [IdeaController::class, 'store'])->name('store');
    
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(['middlewear' => ['auth']], function() {
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        
        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
        
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        
        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});



//authentication routes
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/terms', [DashboardController::class, 'terms']);


// 1. model - name in a singular form
// 2. controller
// 3. migration
// 4. setup the routes
// php artisan make:model Name -m -c
// -m - migration
// -c - controller