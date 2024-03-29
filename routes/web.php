<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;

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

Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('posts/{post:slug}', [PostController::class, 'show']);


// only show if not logged in
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');



// login and logout
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


// user setttings
Route::Get('/settings', [RegisterController::class, 'show'])->middleware('auth');
Route::post('/settings', [RegisterController::class, 'show'])->middleware('auth');
Route::patch('/settings/update', [RegisterController::class, 'update'])->middleware('auth');





// admin
Route::get('/admin/create', [AdminPostController::class, 'create'])->middleware('auth');
Route::post('/admin/posts', [AdminPostController::class, 'store'])->middleware('auth');
Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware('auth');
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('auth');
Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('auth');
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
Route::patch('/admin/change/{post}', [AdminPostController::class, 'change'])->middleware('admin');
