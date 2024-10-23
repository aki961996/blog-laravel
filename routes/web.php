<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');

    Route::post('login', 'auth_login')->name('auth_login');

    Route::get('register', 'register')->name('register');
    Route::post('register', 'create_user')->name('create_user');

  

    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'adminuser'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //users api
    Route::get('admin/user/list', [UserController::class, 'users'])->name('users.list');
    Route::get('admin/user/add', [UserController::class, 'add'])->name('users.add');
    Route::post('admin/user/add', [UserController::class, 'addPost'])->name('users.addPost');
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('admin/user/update', [UserController::class, 'user_update'])->name('users.update');
    Route::get('admin/user/delete/{id}', [UserController::class, 'delete'])->name('users.destroy');


  
    //blog api
    Route::get('admin/blog/list', [BlogController::class, 'index'])->name('blog.list');
    Route::get('admin/blog/add', [BlogController::class, 'create'])->name('blog.create');
    Route::post('admin/blog/add', [BlogController::class, 'store'])->name('blog.store');
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('admin/blog/update', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    //comment

    Route::get('admin/comment/list', [CommentController::class, 'index'])->name('comment.list');
    Route::get('admin/comment/add', [CommentController::class, 'create'])->name('comment.create');
    Route::post('admin/comment/add', [CommentController::class, 'store'])->name('comment.store');
    Route::get('admin/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('admin/comment/update', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('admin/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

});
