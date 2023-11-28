@php use App\Models\Category;use App\Models\Supplier;use App\Models\User; @endphp
<x-layout>
    <form action="/products" method="post">
        @csrf

        <input type="text" name="product_name" id="product_name" placeholder="name">

        <input type="text" name="product_code" id="product_code" placeholder="code">

        <input type="number" name="product_price" id="product_price" placeholder="price">

        <input type="number" name="product_quantity" id="product_quantity" placeholder="quantity">

        <select name="supplier_id" id="supplier_id">
            @foreach(Supplier::all() as $supplier)
                <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
            @endforeach
        </select>

        <select name="category_id" id="supplier_id">
            @foreach(Category::all() as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
        </select>

        <select name="user_id" id="supplier_id">
            @foreach(User::all() as $user)
                <option value="{{$user->user_id}}">{{$user->user_fname}}</option>
            @endforeach
        </select>

        <button type="submit">ADD</button>

    </form>
</x-layout>
