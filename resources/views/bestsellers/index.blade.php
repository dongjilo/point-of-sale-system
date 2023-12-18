@extends('scaffholding-page')
@section('title')
    {{"Products - All Bestsellers"}}
@endsection
@section('content')
    <ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">All Bestsellers</li>
    </ol>
    @include('components.alertMessages')
    <div class="container-fluid">
        <table id="bestsellerTable">
            <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity Sold</th>
                <th>Total Sales</th>
                <th>Month</th>
                <th>Year</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($bestsellers as $bestseller)
                <tr>
                    <td>{{$bestseller->bestseller_id}}</td>
                    <td>{{$bestseller->product->product_name}}</td>
                    <td>{{$bestseller->bestseller_quantity_sold}}</td>
                    <td>{{$bestseller->bestseller_total_sales}}</td>
                    <td>{{date('F', mktime(0, 0, 0, $bestseller->bestseller_month))}}</td>
                    <td>{{$bestseller->bestseller_year}}</td>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready( function() {
            $('#bestsellerTable').DataTable();
        } );
    </script>
@endsection

