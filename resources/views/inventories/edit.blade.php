@php
    use App\Models\Category;use App\Models\Product;use App\Models\Supplier;use App\Models\User;use Illuminate\Support\Facades\Auth;
@endphp

<div class="modal fade text-left" id="editInventoryModal{{$inventory->inventory_id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-fw fa-pencil"></i>
                    Edit Inventory: <u>{{$inventory->product->product_name}}</u>
                </h4>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update_inventory', $inventory->inventory_id) }}" method="post"
                      enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <div class="form-group">
                            <strong>{{ __('Supplier') }}:</strong>
                            <select name="supplier_id" id="supplier_id" class="form-control">
                                <option
                                    value="{{$inventory->supplier_id}}">{{$inventory->supplier->supplier_name}}</option>
                                @foreach(Supplier::all()->where('supplier_id', '<>', "$inventory->supplier_id") as $supplier)
                                    <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <div class="form-group">
                            <strong>{{ __('Product') }}:</strong>
                            <select name="product_id" class="form-control" id="product_id">
                                <option
                                    value="{{$inventory->product_id}}">{{$inventory->product->product_name}}</option>
                                @foreach(Product::all()->where('product_id', '<>', "$inventory->product_id") as $product)
                                    <option
                                        value="{{$product->product_id}}">{{$product->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <div class="form-group">
                            <strong>{{ __('Quantity') }}:</strong>
                            {!! Form::number('inventory_quantity', $inventory->inventory_quantity, array('placeholder' => 'Enter Quantity','class' => 'form-control', 'step' => '.01', 'min' => '0')) !!}
                        </div>
                    </div>


                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Expiration Date') }}:</strong>
                        {!! Form::date('inventory_expiry', $inventory->inventory_expiry, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <input class="visually-hidden" name="user_id" value="{{Auth::id()}}">


            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i
                        class="fa fa-fw fa-close"></i>Cancel
                </button>
                <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
