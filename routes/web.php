<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EditController;
use Illuminate\Http\Request;
use App\Models\Post;
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



Route::get('/login', [loginController::class, 'index'])->middleware('checkUser');

Route::post('/login', [loginController::class, 'create'])->name('post.login');

Route::get('/create', function(){
	return 'Đây là trang tạo bài viết :v';
});
//Bài tập buổi 6
Route::get('/views', [PostController::class, 'index']);

Route::post('/views', [PostController::class, 'create'])->name('post.views');

Route::get('/edit', [EditController::class, 'index']);

Route::post('/edit', [EditController::class, 'update'])->name('post.edit');

Route::get('/delete', function(Request $request){
	$id = $request->input('id');
	$post = Post::query()->find($id);
	if ($post->delete()) {
		echo "Xóa thành công";
	}
});
//end


//Bài tập buổi 5
Route::get('/', [homeController::class, 'index'])->middleware('checkRole');

Route::get('/home', function(){
	return view('home');
});
Route::get('/home2', function(){
	return view('home2', ['name' => 'nam']);
});
//end