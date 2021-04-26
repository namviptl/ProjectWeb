<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::query()->get();
        $posts = Post::with('categories')->get();
        //dd($posts->toArray());
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cates = Category::query()->get();
        return view('posts.add', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //
        $data = Post::query()->create($request->only('slug', 'title', 'content'));
        $post_id = $data->id;
        $post = Post::with('categories')->findOrFail($post_id);
        $cate_id = $request->only('category');
        foreach ($cate_id['category'] as $id) {
            $post->categories()->attach($id);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::with('categories')->findOrFail($id);
        $cates = Category::query()->get();

        return view('posts.edit', compact('post','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
        //
        $post = Post::with('categories')->findOrFail($id);
        $post->update($request->only('slug','title', 'content'));

        foreach ($post->categories as $cate) {
            $cate_id = $request->only('category_'.$cate['id']);
            $post->categories()->detach($cate['id']);
            $post->categories()->attach($cate_id['category_'.$cate['id']]);
        }            
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        dd($id);
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
