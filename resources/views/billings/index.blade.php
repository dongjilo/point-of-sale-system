@extends('scaffholding-page')
@section('title')
    {{"Cashier - All Billings"}}
@endsection
@section('content')
    <ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Cashier</li>
        <li class="breadcrumb-item active">All Billings</li>
    </ol>
    @include('components.alertMessages')
    <div class="container-fluid">
        <table id="billingTable">
            <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>User</th>
                <th>Payment Method</th>
                <th>Total Amount</th>
                <th>Amount Tendered</th>
                <th>Date</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($billings as $billing)
                <tr>
                    <td>{{$billing->billing_id}}</td>
                    <td>{{$billing->order_id}}</td>
                    <td>{{$billing->user->user_name}}</td>
                    <td>{{$billing->billing_payment_method}}</td>
                    <td>{{$billing->billing_total_amount}}</td>
                    <td>{{$billing->billing_amount_tendered}}</td>
                    <td>{{$billing->billing_date}}</td>
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
            $('#billingTable').DataTable();
        } );
    </script>
@endsection

