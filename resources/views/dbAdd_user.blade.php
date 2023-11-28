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
	<form action="{{url('save_supplier')}}" method="post" class="container-sm w-25">
		@csrf

		<label for="" class="form-label">Supplier Name</label>
		<input type="text" name="supplierName" class="form-control">

		<label for="" class="form-label">Supplier Phone</label>
		<input type="password" name="supplierPhone" maxlength="11" class="form-control">

		<label for="" class="form-label">Supplier Email</label>
		<input type="email" name="supplierEmail" class="form-control">

		<input type="submit" value="ADD" class="mt-3 btn btn-primary">
	</form>
</body>
</html>