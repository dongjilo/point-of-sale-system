<x-layout>
    <table>
        <thead>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>Product Price</th>
            <th>Product Qty</th>
            <th>Supplier</th>
            <th>Category</th>
            <th>User</th>
            <th>Action</th>
        </thead>

        <tbody>
        {{-- TODO: Figure out how to display the supplier/category/user name instead of their id --}}
            @foreach ($products as $product)
                <td>{{$product->product_id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_code}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{$product->product_quantity}}</td>
                <td>{{$product->supplier_id}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->user_id}}</td>
                <td><a href="/products/{{$product->product_id}}"><button>View</button></a></td>
            @endforeach
        </tbody>

    </table>
</x-layout>
