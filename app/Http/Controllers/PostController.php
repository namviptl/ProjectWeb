<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function index(){
    	$post = DB::table('posts')->get();
    	
		return view('view_news',compact($post,'post'));
    }

    public function create(Request $request){
    	$title = $request->input('title');
    	$search = DB::table('posts')->where('title', 'like', $title)->get();
    	$my_array = json_decode($search, true);
    	return "Bài viết cần tìm là <br>STT: ".$my_array[0]['id']."<br>Slug: ".$my_array[0]['slug']."<br>Title: ".$my_array[0]['title'].'<br>Content: '.$my_array[0]['content'];

    	//dd($search);
    }
}
