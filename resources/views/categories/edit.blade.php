
    <div class="modal fade text-left" id="editCategoryModal{{$category->category_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-fw fa-pencil"></i>
                        Edit Category: <u>{{$category->category_name}}</u>
                    </h4>
                    <button class="btn-close btn-close-white" type="button"data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_category', $category->category_id) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>{{ __('Category Name') }}:</strong>
                              {!! Form::text('name', $category->category_name, array('placeholder' => 'Enter Category Name','class' => 'form-control', 'name' => 'category_name')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                          <div class="form-group">
                              <strong>{{ __('Category Description') }}:</strong>
                              {!! Form::textarea('phone', $category->category_desc, array('placeholder' => 'Enter Category Description','class' => 'form-control', 'name' => 'category_desc')) !!}
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
