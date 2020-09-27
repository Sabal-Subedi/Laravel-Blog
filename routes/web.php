<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;


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

Route::get('/',[PostController::class,'index']);
 
Route::resource('users',UserController::class);
Route::resource('posts',PostController::class);
Route::resource('comments',CommentController::class);
Route::resource('pages',PageController::class);


Route::get('/users.create',[UserController::class,'create']);
Route::post('action',[UserController::class,'approve']);
Route::post('create',[UserController::class,'store']);
Route::get('/login',[UserController::class,'login']);


Route::get('/about',[PageController::class,'create']);


Route::post('create/posts',[PostController::class,'store']);

Route::post('posts/create/{id}',[PostController::class,'show'])->name('posts.create');
Route::post('create/comments/{id}',[CommentController::class,'store']);
