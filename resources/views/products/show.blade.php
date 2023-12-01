<x-layout>
    <div class="container mt-5">
        <div class="card w-50">
            <p>Product Name: {{$product->product_name}}</p>
            <p>Product Code: {{$product->product_code}}</p>
            <p>Price: {{$product->product_price}}</p>
            <p>QTY: {{$product->product_quantity}}</p>
            <p>Supplier: {{$product->supplier->supplier_name}}</p>
            <p>Category: {{$product->category->category_name}}</p>
            <p>User: {{$product->user->user_name}}</p>
        </div>
    </div>
</x-layout>
