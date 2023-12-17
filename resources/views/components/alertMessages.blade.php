
@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-fw fa-warning"></i>
  <strong>Warning!</strong> {{session()->get('warning')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


@elseif(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa fa-fw fa-warning"></i>
  <strong>Error!</strong> {{session()->get('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <i class="fa fa-fw fa-warning"></i>
                <strong>Error!</strong> {{$error}} <br>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

@elseif(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa fa-fw fa-check-circle"></i>
  <strong>Success!</strong> {{session()->get('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
