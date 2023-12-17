
@if($errors->any())
    @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        <i class="fa fa-fw fa-warning"></i>
        <strong>Error!</strong> {{$error}}
      </div>
    @endforeach
@endif


@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  <i class="fa fa-fw fa-check-circle"></i>
  <strong>Success!</strong> {{session()->get('success')}}
</div>
@endif