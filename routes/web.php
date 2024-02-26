<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::middleware('guest')->group(function(){

    
Route::get('/login',[LoginController::class , 'loginForm'])->name('loginForm');
Route::post('/login',[LoginController::class , 'login'])->name('login');
Route::get('/register',[RegisterController::class ,'registerForm'])->name('registerForm');
Route::post('/register',[RegisterController::class,'register'])->name('register');

});


Route::middleware('auth')->group(function(){

    Route::get('/', [PostController::class ,'index'])->name('home');

    Route::get('/image/post',[PostController::class , 'createPost'])->name('createPost');
    Route::post('/image/post',[PostController::class , 'storePost'])->name('storePost');
    Route::get('/image/{id}',[PostController::class , 'showPost'])->name('showPost');
    Route::put('/image/edit/{id}',[PostController::class , 'editPost'])->name('editPost');
    Route::get('/image/delete/{id}',[PostController::class , 'deletePost'])->name('deletePost');

    Route::get('/explorasi',[AlbumController::class ,'explore'])->name('explore');
    Route::get('/album/create',[AlbumController::class , 'createAlbum'])->name('createAlbum');
    Route::post('/album/send',[AlbumController::class , 'storeAlbum'])->name('storeAlbum');
    Route::get('/album/{id}',[AlbumController::class , 'showAlbum'])->name('showAlbum');

    Route::post('/image/like/{id}',[ActionController::class , 'like'])->name('like');
    Route::get('/image/like/{id}',[ActionController::class , 'dislike'])->name('dislike');
    Route::post('/image/comment/{id}',[ActionController::class , 'comment'])->name('comment');
    Route::get('/image/comment/delete/{id}',[ActionController::class , 'deleteComment'])->name('deleteComment');

    Route::get('/profile/{username}',[ProfileController::class, 'profile'])->name('profile');

    Route::get('/logout',[LogoutController::class ,'logout'])->name('logout');

});