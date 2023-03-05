<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    if(Auth::check()){
        $user = Auth::user();
        return $user;
    }
});

Route::middleware('auth')->group(function(){
    Route::get('/post', [PostController::class, 'index']);
    Route::post('/post', [PostController::class, 'create']);
    Route::get('/posts', [PostController::class, 'read']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::post('/posts/{id}', [PostController::class, 'update']);
    Route::get('/posts/{id}/delete', [PostController::class, 'destroy']);
});

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'read']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}/delete', [UserController::class, 'destroy']);

//login
Route::get('login', [UserController::class, "login"])->name('login');
Route::post('login', [UserController::class, 'check']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');