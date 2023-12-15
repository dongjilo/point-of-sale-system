@extends('scaffholding-page')
    @section('title')
    {{"Suppliers - All Suppliers"}}
    @endsection

	@section('content')
	<ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Suppliers</li>
        <li class="breadcrumb-item active">All Suppliers</li>
    </ol>
    @include('components.alertMessages')
	<div class="container-fluid">
	<table>
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
	                <a href="suppliers/{{$supplier->supplier_id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
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
	</div>
	@endsection
	@section('script')
	<script>
			$(document).ready( function() {
				$('#supplierTable').DataTable();
			} );
	</script>
	@endsection