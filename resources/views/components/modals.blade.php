{{-- code tester modal --}}
{{-- end of add code tester modal --}}


@php
  use App\Models\Category;use App\Models\Supplier;use App\Models\User;

@endphp

{{-- add user modal --}}
  {{-- <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-white">
            <h5 class="modal-title" id="addSupplierModal">
              <i class="fa fa-user"></i>
              Add New User
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
              <input type="submit" class="btn add" value="Add Supplier">
            </div>
          </form>
        </div>
      </div>
  </div> --}}
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Product Code') }}:</strong>
                        {!! Form::text('product_code', null, array('placeholder' => 'Optional Product Code','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Name') }}:</strong>
                        {!! Form::text('product_name', null, array('placeholder' => 'Enter Product Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Price') }}:</strong>
                        {!! Form::number('product_price', null, array('placeholder' => 'Enter Product Name','class' => 'form-control', 'step' => '.01', 'min' => '0')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Stocks') }}:</strong>
                        {!! Form::number('product_quantity', null, array('placeholder' => 'Enter Product Stocks','class' => 'form-control','min' => '0')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Category') }}:</strong>
                          <select name="category_id" id="category_id" class="form-select">
                            <option value="" selected></option>
                              @foreach(Category::all() as $categoryoption)
                                <option value="{{$categoryoption->category_id}}">{{$categoryoption->category_name}}</option>
                              @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Supplier') }}:</strong>
                          <select name="supplier_id" id="supplier_id" class="form-select">
                            <option value="--" selected></option>
                              @foreach(Supplier::all() as $supplieroption)
                                <option value="{{$supplieroption->supplier_id}}">{{$supplieroption->supplier_name}}</option>
                              @endforeach
                          </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
              <input type="submit" class="btn add" value="Add Product">
            </div>
          </form>
        </div>
      </div>
  </div>
{{-- end of add product category modal --}}


{{-- add category modal --}}
  <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
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
      <div class="modal-dialog" role="document">
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


{{-- order modal --}}
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModal" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addOrderModal">
              <i class="fa fa-shopping-cart"></i>
              Add New Order
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"></button>
            </button>
          </div>
          <form class="">
            <div class="modal-body">
            <form action="{{route('store_order')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>{{ __('Order Date') }}:</strong>
                      {!! Form::date('order_date', null, array('placeholder' => 'Input Date Order','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                  <div class="form-group">
             <table class="table table-striped">
              <thead>
                <th>test</th>
                <th>test</th>
                <th>test</th>
                <th>test</th>
                <th>test</th>
                <th>test</th>
              </thead>
              <tbody>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
              </tbody>
            </table>
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
{{-- end of add order modal --}}


{{-- add supplier order modal --}}
  <div class="modal fade" id="addSupplierOrderModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierOrderModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-white">
            <h5 class="modal-title" id="addSupplierOrderModal">
              <i class="fa fa-truck"></i>
              Add Purchase Order to Supplier
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form class="">
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-close"></i>Cancel</button>
              <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save Supplier Order</button>
            </div>
          </form>
        </div>
      </div>
  </div>
{{-- end of add supplier order modal --}}


{{-- add supplier receive modal --}}
  <div class="modal fade" id="addSupplierReceiveModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierReceiveModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-white">
            <h5 class="modal-title" id="addSupplierReceiveModal">
              <i class="fa fa-truck"></i>
               Receive Product(s) from Supplier
            </h5>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form class="">
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Save Supplier Receive</button>
            </div>
          </form>
        </div>
      </div>
  </div>
{{-- end of add supplier receive modal --}}