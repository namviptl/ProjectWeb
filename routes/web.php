<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;

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


Route::get('/', [homeController::class, 'index'])->middleware('checkRole');

Route::get('/login', [loginController::class, 'index'])->middleware('checkUser');

Route::post('/login', [loginController::class, 'create'])->name('post.login');

Route::get('/create', function(){
	return 'Đây là trang tạo bài viết :v';
});