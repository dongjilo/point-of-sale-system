
    <div class="modal fade text-left" id="editUserModal{{$user->user_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-fw fa-pencil"></i>
                        Edit User: <u>{{$user->user_name}}</u>
                    </h4>
                    <button class="btn-close btn-close-white" type="button"data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_user', $user->user_id) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <strong>{{ __('Name') }}:</strong>
                      {!! Form::text('user_name', $user->user_name, array('placeholder' => 'Name','class' => 'form-control', 'required')) !!}
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                      <strong>{{ __('Username') }}:</strong>
                      {!! Form::text('user_uname', $user->user_uname, array('placeholder' => 'Enter Username','class' => 'form-control', 'required')) !!}
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                      <strong>{{ __('Password') }}:</strong>
                      {!! Form::text('user_password', $user->user_password, array('placeholder' => 'Enter Password','class' => 'form-control', 'required')) !!}
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
