@extends('scaffholding-page')
    @section('title')
    {{"Users - All Users"}}
    @endsection

	@section('content')
	<ol class="breadcrumb p-2">
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">All Users</li>
    </ol>
    @include('components.alertMessages')
	<div class="container-fluid">
	<table id="userTable">
	    <thead class="text-center">
	    	<tr>
		        <th>User ID</th>
		        <th>Name</th>
		        <th>Username</th>
		        <th>Password</th>
		        <th>Action</th>
	        </tr>
	    </thead>

	    <tbody>
	        @foreach ($users as $user)
	            <tr>
	                <td>{{$user->user_id}}</td>
	                <td>{{$user->user_name}}</td>
	                <td>{{$user->user_uname}}</td>
	                <td>{{$user->user_password}}</td>
	                <td>
	                <a href="#" data-bs-toggle="modal" data-bs-target="#editUserModal{{$user->user_id}}" class="btn btn-sm btn-warning">
	                <i class="fa fa-pencil text-white"></i></a>
	                    <form action="{{ route('destroy_user', $user->user_id)}}" method="post">
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	                    </form>

	                </td>
	                @include('users.edit')
	            </tr>
	        @endforeach
	    </tbody>
	</table>
	<a role="button" class="btn add" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fa fa-fw fa-plus" ></i> Add User</a>
	</div>
	@endsection
	@section('script')
	<script>
			$(document).ready( function() {
				$('#userTable').DataTable();
			} );
	</script>
	@endsection
