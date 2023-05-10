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

//管理画面

Route::prefix('/admin')
    ->name('admin.')

    ->group(function () {
        Route::middleware('auth')
            ->group(function () {
                Route::resource('/blogs', BlogController::class)->except('show');
                //ログアウト処理
                Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
            });
        Route::middleware('guest')
            ->group(function () {
                //認証
                Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
                Route::post('/login', [AuthController::class, 'login']);
            });
    });
// Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs.index')->middleware('auth');
// Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create')->middleware('auth');
// Route::post('/admin/blogs/create', [BlogController::class, 'store'])->name('admin.blogs.store');
// Route::get('/admin/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('admin.blogs.edit')->middleware('auth');
// Route::patch('/admin/blogs/update/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
// Route::delete('/admin/blogs/delete/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');



//ユーザ登録

Route::get('/adim/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/adim/users', [UserController::class, 'store'])->name('admin.users.store');

Route::get('/post/create', [PostController::class, 'create']);

//ログイン用ルーと
