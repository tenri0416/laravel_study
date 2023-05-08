<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AuthController;
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

Route::get('/', function () {
    return view('index');
});
Route::resource('/photos', PhotoController::class);
Route::get('/photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');


Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs.index')->middleware('auth');
Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create')->middleware('auth');
Route::post('/admin/blogs/create', [BlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('admin.blogs.edit')->middleware('auth');
Route::patch('/admin/blogs/update/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/delete/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

//ログアウト処理
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

//ユーザ登録

Route::get('/adim/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/adim/users', [UserController::class, 'store'])->name('admin.users.store');

Route::get('/post/create', [PostController::class, 'create']);

//ログイン用ルーと
//認証
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
