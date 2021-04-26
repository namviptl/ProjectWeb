@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h1>Edit post</h1>

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group has-error">
                    <label for="slug">Slug <span class="require">*</span> <small>(This field use in url path.)</small></label>
                    <input type="text" class="form-control" name="slug" value="{{ $post->slug }}">
                    @error('slug')<div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>@enderror
                </div>

                @foreach ($post->categories as $category)
                
                
                     {{--  <option >{{$category->name}}</option> --}}
                        <select name="category_{{$category->id}}" class="custom-select">
                        @foreach ($cates as $cate)
                                <option 
                                @if ($category->id == $cate->id)
                                   {{'selected'}}
                                @endif
                                 value="{{$cate->id}}">{{$cate->name}}</option>
                              @endforeach
                        </select>

                  
                
                @endforeach
                @error('category')<div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>@enderror
                <div class="form-group">
                    <label for="title">Title <span class="require">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
                @error('title')<div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>@enderror
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea rows="5" class="form-control" name="content">{{ $post->content }}</textarea>
                </div>
                @error('content')<div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>@enderror
                <div class="form-group">
                    <p><span class="require">*</span> - required fields</p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
