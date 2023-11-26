<x-layout>
    {{-- TODO: Figure out how to display the supplier/category/user name instead of their id --}}
    <p>Product Name: {{$product->product_name}}</p>
    <p>Product Code: {{$product->product_code}}</p>
    <p>Price: {{$product->product_price}}</p>
    <p>QTY: {{$product->product_quantity}}</p>
    <p>Supplier: {{$product->supplier->supplier_name}}</p>
    <p>Category: {{$product->category_id}}</p>
    <p>User: {{$product->user_id}}</p>
    //
</x-layout>
