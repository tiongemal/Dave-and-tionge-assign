<?php

use App\Http\Controllers\PostController;
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



// User related routes
Route::get('/', [UserController::class, 'loggedin'])->name('login');
Route::get('/register',[UserController::class, 'RegisterPage']);
Route::view('/home','homepage');
Route::post('/registerpost', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// blog post routes
Route::get('/create-post', [PostController::class, 'ShowCreateForm'])->middleware('auth');
Route::post('/createPost', [PostController::class, 'SaveForm']);
Route::view('/posts', 'create_post');
Route::get('/post/{post}', [PostController::class, 'ShowSinglePost']);


