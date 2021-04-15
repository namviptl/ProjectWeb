<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class EditController extends Controller
{
    public function index(){
        return view('edit');
    }


    public function update(Request $request){
        
        $id = $request->input('id');
        $slug = $request->input('slug');
        $title = $request->input('title');
        $content = $request->input('content');

        if ($id == null || $slug == null || $title == null || $content == null) {
            echo "bạn chưa nhập đủ";
        }else{
            
            $post = Post::query()->find($id)->update(['slug' => $slug, 'title' => $title, 'content' => $content]);

            if ($post == true) {
                echo "sửa thành công";
            }else{
                echo "sửa thất bại";
            }
        }
        
    }
}
