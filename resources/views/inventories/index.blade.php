@extends('scaffholding-page')
@section('title')
{{"Inventory - All Products"}}
@endsection
@section('content')
    <ol class="breadcrumb p-2">
        <li class="breadcrumb-item">Inventory</li>
        <li class="breadcrumb-item active">All Products</li>
    </ol>
    @include('components.alertMessages')
    <div class="container-fluid">
        <table id="inventoryTable">
            <thead class="text-center">
            <tr>
                <th>Inventory ID</th>
                <th>Supplier</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Expiry</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($inventories as $inventory)
                @php
                    $isLowStock = $inventory->inventory_quantity <= 20;
                    $isNearExpiry = strtotime($inventory->inventory_expiry) < strtotime('+7 days');
                @endphp
                <tr>
                    <td>{{$inventory->inventory_id}}</td>
                    <td>{{$inventory->supplier->supplier_name}}</td>
                    <td>{{$inventory->product->product_name}}</td>
                    <td class="{{ $isLowStock ? 'text-warning' : '' }}">{{$inventory->inventory_quantity}}</td>
                    <td class="{{ $isNearExpiry ? 'text-danger' : '' }}">{{$inventory->inventory_expiry}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editInventoryModal{{$inventory->inventory_id}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil text-white"></i></a>
                        <form action="{{ route('destroy_inventory', $inventory->inventory_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button role="button" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this row?')"><i class="fa fa-trash"></i></a>
                        </form>
                    </td>
                    @include('inventories.edit')
                </tr>
            @endforeach
            </tbody>
        </table>
        <a role="button" class="btn add" data-bs-toggle="modal" data-bs-target="#addInventoryModal"><i class="fa fa-fw fa-plus" ></i> Add Inventory</a>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function() {
            $('#inventoryTable').DataTable();
        } );
    </script>
@endsection

