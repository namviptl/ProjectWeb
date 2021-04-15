<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<div class="container-fluid">
				<div class="col-6">
					<h3>Sửa</h3>
					<form class="form-inline" action="{{route('post.edit')}}" method="POST">
						@csrf
						<div class="form-group">
							<label for="title">Sửa bài viết thứ?</label>
							<input type="text" class="form-control" name="id" value="{{$_GET['id']}}" readonly="">
						</div>
						<div class="form-group">
							<label for="title">Slug</label>
							<input type="text" class="form-control" name="slug">
						</div>
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" name="title">
						</div>
						<div class="form-group">
							<label for="title">Content</label>
							<input type="text" class="form-control" name="content">
						</div>
						<button type="submit" class="btn btn-primary">Sửa</button>
						
					</form>
				</div>
			</div>
		</div>
	
		

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>