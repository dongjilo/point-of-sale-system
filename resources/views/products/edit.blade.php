@php use App\Models\Category;use App\Models\Supplier;use App\Models\User; @endphp
<x-layout>
    <form action="/products/{{$product->product_id}}" method="post">
        @csrf
        @method('PUT')

        <input type="text" name="product_name" id="product_name" placeholder="name" value="{{$product->product_name}}">

        <input type="text" name="product_code" id="product_code" placeholder="code" value="{{$product->product_code}}">

        <input type="number" name="product_price" id="product_price" placeholder="price" value="{{$product->product_price}}">

        <input type="number" name="product_quantity" id="product_quantity" placeholder="quantity" value="{{$product->product_quantity}}">

        <select name="supplier_id" id="supplier_id">
            <option value="{{$product->supplier_id}}">{{$product->supplier->supplier_name}}</option>
            @foreach(Supplier::all()->where('supplier_id', '<>', "$product->supplier_id") as $supplier)
                <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
            @endforeach
        </select>

        <select name="category_id" id="supplier_id">
            <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
            @foreach(Category::all()->where('category_id', '<>', "$product->category_id") as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
        </select>

        <select name="user_id" id="supplier_id">
            <option value="{{$product->user_id}}">{{$product->user->user_fname}}</option>
            @foreach(User::all()->where('user_id', '<>', "$product->user_id") as $user)
                <option value="{{$user->user_id}}">{{$user->user_fname}}</option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>
</x-layout>
