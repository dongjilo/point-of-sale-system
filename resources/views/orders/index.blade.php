@extends('scaffholding-page')
@section('title')
    {{"Order - All Orders"}}
@endsection
@section('content')
    <ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Order</li>
        <li class="breadcrumb-item active">All Order</li>
    </ol>
    @include('components.alertMessages')
    <div class="container-fluid">
        <table id="orderTable">
            <thead class="text-center">
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->order_id}}</td>
                    <td>{{$order->user->user_name}}</td>
                    <td>{{$order->order_date}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editProductModal{{$order->order_id}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil text-white"></i></a>
                        <form action="{{ route('destroy_product', $order->order_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a role="button" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </form>

                    </td>
{{--                    @include('products.edit')--}}
                </tr>
            @endforeach
            </tbody>
        </table>
        <a role="button" class="btn add" data-bs-toggle="modal" data-bs-target="#addOrderModal"><i class="fa fa-fw fa-plus" ></i> Add Order</a>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function() {
            $('#orderTable').DataTable();
        } );
    </script>
@endsection

