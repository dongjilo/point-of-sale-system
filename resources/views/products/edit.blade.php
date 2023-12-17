@php
    use App\Models\Category;use App\Models\Supplier;use App\Models\User;
@endphp
    <div class="modal fade text-left" id="editProductModal{{$product->product_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-fw fa-pencil"></i>
                        Edit Product: <u>{{$product->product_name}}</u>
                    </h4>
                    <button class="btn-close btn-close-white" type="button"data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_product', $product->product_id) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Name') }}:</strong>
                        {!! Form::text('product_name', $product->product_name, array('placeholder' => 'Enter Product Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Product Price') }}:</strong>
                        {!! Form::number('product_price', $product->product_price, array('placeholder' => 'Enter Product Name','class' => 'form-control', 'step' => '.01', 'min' => '0')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Category') }}:</strong>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                                    @foreach(Category::all()->where('category_id', '<>', "$product->category_id") as $category)
                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    @endforeach
                            </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>{{ __('Supplier') }}:</strong>
                            <select name="supplier_id" id="supplier_id" class="form-control">
                                <option value="{{$product->supplier_id}}">{{$product->supplier->supplier_name}}</option>
                                    @foreach(Supplier::all()->where('supplier_id', '<>', "$product->supplier_id") as $supplier)
                                        <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                                    @endforeach
                            </select>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-close"></i>Cancel</button>
                        <button type="submit" class="btn add"><i class="fa fa-fw fa-save"></i>Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
