
    <div class="modal fade text-left" id="editSupplierModal{{$supplier->supplier_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-fw fa-pencil"></i>
                        Edit Supplier: <u>{{$supplier->supplier_name}}</u>
                    </h4>
                    <button class="btn-close btn-close-white" type="button"data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_supplier', $supplier->supplier_id) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <strong>{{ __('Supplier Name') }}:</strong>
                      {!! Form::text('supplier_name', $supplier->supplier_name, array('placeholder' => 'Supplier Name','class' => 'form-control', 'required')) !!}
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                      <strong>{{ __('Supplier Contact Number') }}:</strong>
                      {!! Form::text('supplier_phone', $supplier->supplier_phone, array('placeholder' => 'Supplier Contact Number','class' => 'form-control', 'required')) !!}
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                      <strong>{{ __('Supplier Email') }}:</strong>
                      {!! Form::email('supplier_email', $supplier->supplier_email, array('placeholder' => 'Email','class' => 'form-control', 'required')) !!}
                    </div>
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
