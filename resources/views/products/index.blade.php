@extends('scaffholding-page')
    @section('title')
    {{"Product - All Products"}}
    @endsection
	@section('content')
	<ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">All Products</li>
    </ol>
    @include('components.alertMessages')
	<div class="container-fluid">
	<table id="productTable">
	    <thead class="text-center">
	    	<tr>
		        <th>ID</th>
		        <th>Name</th>
		        <th>Code</th>
		        <th>Price</th>
		        <th>Category</th>
		        <th>Action</th>
	        </tr>
	    </thead>

	    <tbody>
	        @foreach ($products as $product)
	            <tr>
	                <td>{{$product->product_id}}</td>
	                <td>{{$product->product_name}}</td>
	                <td>{{$product->product_code}}</td>
	                <td>{{$product->product_price}}</td>
	                <td>{{$product->category->category_name}}</td>
	                <td>
	                <a href="#" data-bs-toggle="modal" data-bs-target="#editProductModal{{$product->product_id}}" class="btn btn-sm btn-warning">
	                <i class="fa fa-pencil text-white"></i></a>
	                    <form action="{{ route('destroy_product', $product->product_id)}}" method="post">
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	                    </form>
	                </td>
	                @include('products.edit')
	            </tr>
	        @endforeach
	    </tbody>
	</table>
	    <a role="button" class="btn add" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="fa fa-fw fa-plus" ></i> Add Product</a>
	</div>
	@endsection
	@section('script')
		<script>
			$(document).ready( function() {
			  $('#productTable').DataTable();
			} );
		</script>
	@endsection

