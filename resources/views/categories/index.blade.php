@extends('scaffholding-page')
    @section('title')
    {{"Category - All Categories"}}
    @endsection

	@section('content')
	<ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Product Category</li>
        <li class="breadcrumb-item active">All Categories</li>
    </ol>
    @include('components.alertMessages')
	<div class="container-fluid">
	<table id="categoryTable">
	    <thead class="text-center">
	    	<tr>
		        <th>Category ID</th>
		        <th>Category Name</th>
		        <th>Category Description</th>
		        <th>Action</th>
	        </tr>
	    </thead>

	    <tbody>
	        @foreach ($categories as $category)
	            <tr>
	                <td>{{$category->category_id}}</td>
	                <td>{{$category->category_name}}</td>
	                <td>{{$category->category_desc}}</td>
	                <td>
	                <a href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{$category->category_id}}" class="btn btn-sm btn-warning">
	                <i class="fa fa-pencil text-white"></i></a>
	                    <form action="{{ route('destroy_category', $category->category_id)}}" method="post">
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	                    </form>
	                </td>
	                @include('categories.edit')
	            </tr>
	        @endforeach
	    </tbody>
	</table>
		<a role="button" class="btn add" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fa fa-fw fa-plus" ></i> Add Category</a>
	</div>
	@endsection
	@section('script')
	<script>
			$(document).ready( function() {
				$('#categoryTable').DataTable();
			} );
	</script>
	@endsection