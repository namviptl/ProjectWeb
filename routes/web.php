<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EditController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
// use App\Mail\VerifyEmail;
// use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\ForgotPassword;
use Illuminate\Support\Facades\Mail;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;

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



Route::get('/login', [LoginController::class, 'index'])->middleware('guest');


Route::post('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');

// Route::get('/home', [homeController::class, 'index'])->middleware('auth')->name('home');
Route::get('logout', [homeController::class, 'logout'])->middleware('auth')->name('logout');

// Route::get('/create', function(){
// 	return 'Đây là trang tạo bài viết :v';
// });
//Bài tập buổi 6
// Route::get('/views', [PostController::class, 'index']);

// Route::post('/views', [PostController::class, 'create'])->name('post.views');

// Route::get('/edit', [EditController::class, 'index']);

// Route::post('/edit', [EditController::class, 'update'])->name('post.edit');

// Route::get('/delete', function(Request $request){
// 	$id = $request->input('id');
// 	$post = Post::query()->find($id);
// 	if ($post->delete()) {
// 		echo "Xóa thành công";
// 		return redirect('/views');
// 	}
// });
//end


//Bài tập buổi 5
// Route::get('/', [homeController::class, 'index'])->middleware('checkRole');

// Route::get('/home', function(){
// 	return view('home');
// });
// Route::get('/home2', function(){
// 	return view('home2', ['name' => 'nam']);
// });
//end


//Bài tập buổi 7
Route::resource('posts', PostController::class)->middleware('auth');

Route::get('verify-email', function(){
	// $data = new stdClass();
	// $data->name = 'NamBoDoi123';

	// Mail::to('namnt721@wru.vn')->send(new VerifyEmail($data));

	Notification::route('mail', 'namnt721@wru.vn')->notify(new VerifyEmail());

});


//buoi 11
Route::get('/verify',[ForgotPassword::class,'verified'])->name('verified');
Route::get('/email',[ForgotPassword::class,'email'])->name('formemail');
Route::post('/email',[ForgotPassword::class,'sendemail'])->name('sendemail');

Route::get('/reset/{id}',[ForgotPassword::class,'form'])->name('formreset');
Route::post('/reset/{id}',[ForgotPassword::class,'resetsuccess'])->name('act.reset');