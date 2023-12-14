@php use App\Models\Category;use App\Models\Supplier;use App\Models\User; @endphp
<x-layout>
<div class="container mt-5 ">
    <div class="card p-4">
        <h1 class="mb-3 text-center">Edit {{$product->product_name}}</h1>
        <form action="/products/{{$product->product_id}}" method="post">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="name" value="{{$product->product_name}}">
                <label for="product_name">Product Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="product_code" class="form-control" id="product_code" placeholder="code" value="{{$product->product_code}}">
                <label for="product_code">Product Code</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="product_price" class="form-control" id="product_price" placeholder="price" value="{{$product->product_price}}">
                <label for="product_price">Product Price</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="product_quantity" class="form-control" id="product_quantity" placeholder="quantity" value="{{$product->product_quantity}}">
                <label for="product_quantity">Product Quantity</label>
            </div>

            <div class="form-floating mb-3">
                <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value="{{$product->supplier_id}}">{{$product->supplier->supplier_name}}</option>
                    @foreach(Supplier::all()->where('supplier_id', '<>', "$product->supplier_id") as $supplier)
                        <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                    @endforeach
                </select>
                <label for="supplier_id">Supplier</label>
            </div>

            <div class="form-floating mb-3">
                <select name="category_id" class="form-control" id="supplier_id">
                    <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                    @foreach(Category::all()->where('category_id', '<>', "$product->category_id") as $category)
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                <label for="category_id">Category</label>
            </div>

            <div class="form-floating mb-3">
                <select name="user_id" class="form-control" id="supplier_id">
                    <option value="{{$product->user_id}}">{{$product->user->user_name}}</option>
                    @foreach(User::all()->where('user_id', '<>', "$product->user_id") as $user)
                        <option value="{{$user->user_id}}">{{$user->user_name}}</option>
                    @endforeach
                </select>
                <label for="user_id">User</label>
            </div>

            <div class="container text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="submit" formaction="/products" formmethod="get" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
</div>
</x-layout>
