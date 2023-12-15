@php use App\Models\Category;use App\Models\Supplier;use App\Models\User; @endphp
<x-layout>
    <x-navbar></x-navbar>
    <div class="container" style="position: absolute;left: 0;right: 0;top: 50%;transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-webkit-transform: translateY(-50%);-o-transform: translateY(-50%);">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-3 col-xl-9 col-xxl-7">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12 offset-lg-0">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-2">Add Product</h4>
                                    </div>
                                    <form action="/products" method="post">
                                        <div class="card-body"></div>
                                        @csrf

                                    <div class="form-floating mb-3">
                                        <input type="text" name="product_name" id="product_name" placeholder="name" class="form-control">
                                        <label for="product_name">Enter Product Name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="product_code" id="product_code" placeholder="code" class="form-control">
                                        <label for="product_code">Enter Product Code</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="product_price" id="product_price" placeholder="price" class="form-control">
                                        <label for="product_price">Enter Price</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="product_quantity" id="product_quantity" placeholder="quantity" class="form-control">
                                        <label for="product_quantity">Enter Quantity</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                            <option value="" selected></option>
                                            @foreach(Supplier::all() as $supplier)
                                                <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="supplier_id">Supplier</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected></option>
                                            @foreach(Category::all() as $category)
                                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="category_id">Category</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option value="" selected></option>
                                            @foreach(User::all() as $user)
                                                <option value="{{$user->user_id}}">{{$user->user_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="user_id">User</label>
                                    </div>

                                    <button type="submit" class="btn btn-success">ADD</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
    </div>
</x-layout>
