@extends('scaffholding-page')
@section('title')
    {{"Cashier - All Orders"}}
@endsection
@section('content')
    <ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Cashier</li>
        <li class="breadcrumb-item active">All Orders</li>
    </ol>
    @include('components.alertMessages')
{{-- TODO add view details (order_items) for each order --}}
    <div class="container-fluid">
        <table id="orderTable">
            <thead class="text-center">
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Date</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->order_id}}</td>
                    <td>{{$order->user->user_name}}</td>
                    <td>{{$order->order_date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a role="button" class="btn add" href="/orders_create"><i class="fa fa-fw fa-plus" ></i> Add Order</a>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function() {
            $('#orderTable').DataTable();
        } );
    </script>
@endsection

