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

Route::get('/login',function(){
    if(!session()->has('data')){
        return redirect()->route('loginpage');
    }
    else{
        return redirect()->route('profile');
    }
});

Route::post('/upload/image/{id}',[UserController::class,'updateUser']);
Route::post('/upload/profilepicture/{id}',[UserController::class,'uploadImage']);
Route::post('/verifyAccount/{id}',[UserController::class,'verifyAccount']);
Route::get('/skip/profilepicture/{id}',[UserController::class,'skipImage']);

Route::get('/upload/{id}',[UserController::class,'upload']);

Route::get('logout',[PageController::class,'logout']);
Route::get('/profile',[PageController::class,'profile'])->name('profile');
Route::get('userprofile',[PageController::class,'userprofile']);

Route::get('/',[PostController::class,'index']);
Route::get('/home',[PostController::class,'index'])->name('home');
 
Route::resource('users',UserController::class);
Route::resource('posts',PostController::class);
Route::resource('comments',CommentController::class);
Route::resource('pages',PageController::class);


Route::get('/users.create',[UserController::class,'create']);
Route::post('action',[UserController::class,'approve']);
Route::post('create',[UserController::class,'store']);
Route::get('/loginpage',[UserController::class,'login'])->name('loginpage');


Route::get('/about',[PageController::class,'create']);
Route::get('/profile/{id}',[PageController::class,'profile']);


Route::post('create/posts/{id}',[PostController::class,'store']);
Route::post('/posts/{id}',[PostController::class,'update']);
Route::get('posts/create/{id}',[PostController::class,'show'])->name('posts.create');

Route::get('posts/view/{id}',[PostController::class,'show']);
Route::get('posts/delete/{id}',[PostController::class,'delete']);
Route::get('posts/add/{id}',[PostController::class,'add']);


Route::post('create/comments/{id}',[CommentController::class,'store']);
