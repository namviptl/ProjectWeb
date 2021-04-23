@extends('layouts.app')

@section('content')
<div class="dropdown">

		<h1 class="text-center">Danh sách bài viết</h1><br>
		  
		  <div >
		    <a class="dropdown-item" href="{{ route('posts.create') }}">Thêm bài viết</a>
		  </div>
</div>
<br>
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th>STT</th>
			      <th>Slug</th>
			      <th>Title</th>
			      <th>Content</th>
			      <th>Category</th>
			      <th>Chức năng</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@php $stt = 0 @endphp
			  	@foreach ($posts as $post)
			    <tr>
			      <th scope="row">{{$stt += 1}}</th>
			      <td>{{$post->slug}}</td>
			      <td>{{$post->title}}</td>
			      <td>{{$post->content}}</td>
			      <td>
			      	@foreach ($post->categories as $category)
			      		{{$category->name.' '}}
			      	@endforeach

			      </td>
			      <td>
			      	<a href="{{ route('posts.edit', $post->id) }}"><button type="button" class="btn btn-primary">Sửa</button></a>
			      	<a href="{{ route('posts.destroy', $post->id) }}"><button type="button" class="btn btn-danger">xóa</button></a>
			      	{{-- <button type="button" class="btn btn-danger delete-post" data-id="{{ $post->id }}">Xóa</button> --}}
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>

@endsection
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-post').click(function (e) {
            if (confirm('Are you sure ???')) {
                $.ajax({
                    url: '/posts/' + $(this).data('id'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    success: function(result){
                        location.reload();
                    }
                });
            }
        });
    })
</script>