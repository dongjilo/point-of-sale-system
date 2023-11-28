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
	<form action="" class="container-sm w-25">
		<label for="" class="form-label">Product Name</label>
		<input type="text" class="form-control">

		<label for="" class="form-label">Product Code</label>
		<input type="text" class="form-control">

		<label for="" class="form-label">Product Price</label>
		<input type="text" class="form-control">

		<label for="" class="form-label">Product Quantity</label>
		<input type="text" class="form-control">

		<label for="" class="form-label">Supplier</label>
			<select name="" id="" class="form-select">

			</select>

		<label for="" class="form-label">Category</label>
			<select name="" id="" class="form-select">

			</select>

		<label for="" class="form-label">User</label>
			<select name="" id="" class="form-select">

			</select>
	</form>
</body>
</html>