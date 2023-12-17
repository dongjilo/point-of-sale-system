
@if(session()->has('warning'))
<div class="alert alert-warning" role="alert">
  <i class="fa fa-fw fa-warning"></i>
  <strong>Warning!</strong> {{session()->get('warning')}}
</div>


@elseif(session()->has('error'))
<div class="alert alert-danger" role="alert">
  <i class="fa fa-fw fa-warning"></i>
  <strong>Error!</strong> {{session()->get('error')}}
</div>

@elseif(session()->has('success'))
<div class="alert alert-success" role="alert">
  <i class="fa fa-fw fa-check-circle"></i>
  <strong>Success!</strong> {{session()->get('success')}}
</div>
@endif