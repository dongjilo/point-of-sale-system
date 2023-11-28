<x-layout>
    <p>Product Name: {{$product->product_name}}</p>
    <p>Product Code: {{$product->product_code}}</p>
    <p>Price: {{$product->product_price}}</p>
    <p>QTY: {{$product->product_quantity}}</p>
    <p>Supplier: {{$product->supplier->supplier_name}}</p>
    <p>Category: {{$product->category->category_name}}</p>
    <p>User: {{$product->user->user_fname}} {{$product->user->user_lname}}</p>
</x-layout>
