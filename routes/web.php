<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostsController;

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




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{id}',[PostsController::class,'show'])->name('post');

Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminsController::class,'index'])->name('admin.index');

    Route::get('/admin/poster',[PostsController::class,'index'])->name('post.index');
    Route::post('/admin/',[PostsController::class,'store'])->name('post.store');
    Route::get('/admin/posts/create',[PostsController::class,'create'])->name('post.create');

});
