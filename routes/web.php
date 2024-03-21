<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;
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
Route::get('/', function () {
    $posts = Post::where("user_id", auth()->id())->latest()->get();
    return view('layout.app', ["posts" => $posts]);
})->name("layout.app");

Route::get('/login', function () {
    return view('layout.login');
})->name("layout.login");

Route::post('index', [IndexController::class, 'Index']);
Route::post('logout', [IndexController::class, 'Logout'])->name("logout");
Route::post('admin', [IndexController::class, 'Login'])->name("login");
Route::post('create-post', [PostController::class, 'createPost']);
Route::post('/edit-post', [PostController::class, "ShowEdit"])->name("edit-post");
Route::post('update/{post}', [PostController::class, "ShowEditScreen"])->name('update');
Route::put('update/{post}', [PostController::class, "UpdatePost"])->name("update-post");


