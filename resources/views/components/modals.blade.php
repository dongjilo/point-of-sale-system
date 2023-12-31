{{-- code tester modal --}}
{{-- end of add code tester modal --}}


@php
    use App\Models\Category;use App\Models\Supplier;use App\Models\User;use App\Models\Product;use App\Models\Inventory;use App\Models\Order;use App\Models\OrderItem;use Illuminate\Support\Facades\Auth;

@endphp

{{-- add user modal --}}
  <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">
              <i class="fa fa-user"></i>
              Add New User
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"></button>
          </div>
            <div class="modal-body">
            <form action="/users" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>{{ __('Name') }}:</strong>
                      {!! Form::text('user_name', null, array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                  <div class="form-group">
                      <strong>{{ __('Username') }}:</strong>
                      {!! Form::text('user_uname', null, array('placeholder' => 'Enter Username','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                  <div class="form-group">
                      <strong>{{ __('Password') }}:</strong>
                      {!! Form::password('user_password', array('placeholder' => 'Enter Password', 'class' => 'form-control')) !!}
                  </div>
              </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-close"></i>Cancel</button>
                    <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save User</button>
                </div>
            </form>
            </div>
        </div>
      </div>
  </div>
{{-- end of add user modal --}}


{{-- add product modal --}}
  <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header text-white">
            <h5 class="modal-title" id="addProductModal">
              <i class="fa fa-tags"></i>
              Add New Product
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
            <div class="modal-body">
              <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Name') }}:</strong>
                        {!! Form::text('product_name', null, array('placeholder' => 'Enter Product Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Product Code') }}:</strong>
                        {!! Form::text('product_code', null, array('placeholder' => 'Enter Product Code','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Price') }}:</strong>
                        {!! Form::number('product_price', null, array('placeholder' => 'Enter Product Price','class' => 'form-control', 'step' => '.01', 'min' => '0')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Category') }}:</strong>
                          <select name="category_id" id="category_id" class="form-select">
                            <option value="" disabled selected>Select Category</option>
                              @foreach(Category::all() as $categoryoption)
                                <option value="{{$categoryoption->category_id}}">{{$categoryoption->category_name}}</option>
                              @endforeach
                          </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-close"></i>Cancel</button>
                  <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save Product</button>
                </div>
              </form>
            </div>
        </div>
      </div>
  </div>
{{-- end of add product category modal --}}


{{-- add category modal --}}
  <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">
              <i class="fa fa-tag"></i>
              Add New Product Category
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"></button>
            </button>
          </div>
            <div class="modal-body">
            <form action="{{route('store_category')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>{{ __('Category Name') }}:</strong>
                      {!! Form::text('name', null, array('placeholder' => 'Enter Category Name','class' => 'form-control', 'name' => 'category_name')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                  <div class="form-group">
                      <strong>{{ __('Category Description') }}:</strong>
                      {!! Form::textarea('phone', null, array('placeholder' => 'Enter Category Description','class' => 'form-control', 'name' => 'category_desc')) !!}
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-close"></i>Cancel</button>
              <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save Category</button>
            </div>
          </form>
        </div>
      </div>
  </div>
{{-- end of add category modal --}}


{{-- add supplier modal --}}
  <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header text-white">
            <h5 class="modal-title" id="addSupplierModal">
              <i class="fa fa-truck"></i>
              Add New Supplier
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>

            <div class="modal-body">
              <form action="{{route('store_supplier')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>{{ __('Supplier Name') }}:</strong>
                      {!! Form::text('name', null, array('placeholder' => 'Enter Supplier Name','class' => 'form-control', 'name' => 'supplier_name')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                  <div class="form-group">
                      <strong>{{ __('Supplier Contact Number') }}:</strong>
                      {!! Form::number('phone', null, array('placeholder' => ' Enter Supplier Contact Number','class' => 'form-control', 'name' => 'supplier_phone')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                  <div class="form-group">
                      <strong>{{ __('Supplier Email') }}:</strong>
                      {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control', 'name' => 'supplier_email')) !!}
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-close"></i>Cancel</button>
              <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save Supplier</button>
            </div>
          </form>
        </div>
      </div>
  </div>
{{-- end of add supplier modal --}}


{{--inventory add modal--}}
<div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" aria-labelledby="addInventoryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addInventoryModal">
                    <i class="fa  fa-list-alt"></i>

                    Add Product Entry in Inventory
                </h5>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{route('store_inventory')}}" method="post" enctype="multipart/form-data">

              {{ csrf_field() }}
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Supplier') }}:</strong>
                        <select name="supplier_id" id="supplier_id" class="form-select">

                            <option value="" disabled selected>Select Supplier</option>
                              @foreach(Supplier::all() as $supplier)
                                <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                              @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product') }}:</strong>
                        <select name="product_id" id="product_id" class="form-select">
                            <option value="" disabled selected>Select Product</option>
                              @foreach(Product::all() as $product)
                                <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                              @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Quantity') }}:</strong>
                        {!! Form::number('inventory_quantity', null, array('placeholder' => 'Entery Product Quantity','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Expiration Date') }}:</strong>
                        {!! Form::date('inventory_expiry', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <input class="visually-hidden" name="user_id" value="{{Auth::id()}}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save Inventory</button>
                </div>
            </form>
        </div>
    </div>
</div>
