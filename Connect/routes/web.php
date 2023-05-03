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

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/registerNewUser', [UserController::class, 'registerNewUser'])->name('register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/loginUser', [UserController::class, 'loginUser'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/myProfile', [UserController::class, 'showMyProfile'])->name('myProfile')->middleware('auth');
Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('/', [PostController::class, 'showFeed'])->name('showFeed');
Route::get('/showCreateNewPostForm', [PostController::class, 'showCreateNewPostForm'])->name('showCreateNewPostForm');
Route::get('/createNewPost', [PostController::class, 'createNewPost'])->name('createNewPost');
Route::get('/showMyPosts/{id}', [PostController::class, 'showMyPosts'])->name('showMyPosts');
Route::get('/showEditPostForm/{idPost}', [PostController::class, 'showEditPostForm'])->name('showEditPostForm');
Route::get('/editPost', [PostController::class, 'editPost'])->name('editPost');
Route::get('/deletePost/{idPost}/{idUser}', [PostController::class, 'deletePost'])->name('deletePost');
Route::get('/like/{idUser}/{idPost}', [PostController::class, 'like'])->name('like');
Route::get('/dislike/{idUser}/{idPost}', [PostController::class, 'dislike'])->name('dislike');
Route::get('/search', [PostController::class, 'search'])->name('search');
