@extends('scaffholding-page')
    @section('title')
    {{"Suppliers - All Suppliers"}}
    @endsection

	@section('content')
	<ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Supplier</li>
        <li class="breadcrumb-item active">All Suppliers</li>
    </ol>
    @include('components.alertMessages')
	<div class="container-fluid">
	<table id="supplierTable">
	    <thead class="text-center">
	    	<tr>
		        <th>Supplier ID</th>
		        <th>Supplier Name</th>
		        <th>Supplier Contact</th>
		        <th>Supplier Email</th>
		        <th>Action</th>
	        </tr>
	    </thead>

	    <tbody>
	        @foreach ($suppliers as $supplier)
	            <tr>
	                <td>{{$supplier->supplier_id}}</td>
	                <td>{{$supplier->supplier_name}}</td>
	                <td>{{$supplier->supplier_phone}}</td>
	                <td>{{$supplier->supplier_email}}</td>
	                <td>
	                <a href="#" data-bs-toggle="modal" data-bs-target="#editSupplierModal{{$supplier->supplier_id}}" class="btn btn-sm btn-warning">
	                <i class="fa fa-pencil text-white"></i></a>
	                    <form action="{{ route('destroy_supplier', $supplier->supplier_id)}}" method="post">
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	                    </form>

	                </td>
	                @include('suppliers.edit')
	            </tr>
	        @endforeach
	    </tbody>
	</table>
	<a role="button" class="btn add" data-bs-toggle="modal" data-bs-target="#addSupplierModal"><i class="fa fa-fw fa-plus" ></i> Add Supplier</a>
	</div>
	@endsection
	@section('script')
	<script>
			$(document).ready( function() {
				$('#supplierTable').DataTable();
			} );
	</script>
	@endsection
