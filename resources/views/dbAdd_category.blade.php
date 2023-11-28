<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
   	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
	@endif
	<form action="{{url('save_category')}}" method="post" class="container-sm w-25">

		@csrf

		<label for="" class="form-label">Category Name</label>
		<input type="text" class="form-control" name="categoryName">

		<label for="" class="form-label">Category Description</label>
		<textarea name="categoryDesc" class="form-control-plaintext border border-black">

		</textarea>
		<input type="submit" value="ADD" class="mt-3 btn btn-primary">
	</form>
</body>
</html>