<x-layout>
    <x-navbar></x-navbar>
    <div class="container w-100 mt-5">
        <div class="card p-4">
                <p class="card-title text-center h1">Product List</p>

            <div class="card-body">
                <a href="/products/create"><button class="btn btn-success my-2">Add Product</button></a>
            <table class="table table-striped table-bordered">
                <thead class="text-center">
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
                            <td class="text-center">{{$product->product_id}}</td>
                            <td class="text-start">{{$product->product_name}}</td>
                            <td class="text-center">{{$product->product_code}}</td>
                            <td class="text-end">{{$product->product_price}}</td>
                            <td class="text-end">{{$product->product_quantity}}</td>
                            <td class="text-center">{{$product->supplier->supplier_name}}</td>
                            <td class="text-center">{{$product->category->category_name}}</td>
                            <td class="text-center">{{$product->user->user_name}}</td>
                            <td class="d-flex justify-content-between"><a href="/products/{{$product->product_id}}" class="btn btn-sm btn-success">View</a>
                            <a href="/products/edit/{{$product->product_id}}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/products/{{$product->product_id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</x-layout>
