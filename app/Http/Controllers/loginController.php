<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){

        return view('login');
    	
    }

   public function create(Request $request){
    	//dd($request->all());

    	// $user = $request->input('user');
    	// $passw = $request->input('passw');


    	// if($user && $passw ){
     //        session(['user' => $user]);
    	// 	return redirect('/');
    	// }else{
    	// 	return 'Bạn chưa điền đủ tt đăng nhập';
    	// }
    }

}
