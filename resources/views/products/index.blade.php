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
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->product_id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_quantity}}</td>
                    <td>{{$product->supplier->supplier_name}}</td>
                    <td>{{$product->category->category_name}}</td>
                    <td>{{$product->user->user_fname}}</td>
                    <td><a href="/products/{{$product->product_id}}"><button>View</button></a></td>
                    <td><a href="/products/edit/{{$product->product_id}}"><button>View</button></a></td>
                    <td>
                        <form action="/products/{{$product->product_id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
