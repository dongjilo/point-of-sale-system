@php use Illuminate\Support\Facades\Auth; @endphp
        <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Jun-Ianez - Point of Sale System">
  <meta name="author" content="Group 8 - BSIT2D">

    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/solid.css')}}">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/angular.min.js')}}"></script>
  <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>

  <title>@yield('title')</title>
</head>

<body>
<nav class="navbar navbar-expand navbar-dark static-top">
  <a class="navbar-brand mr-1" href="#"><img id="logo" src="{{asset('images/logo-removebg.png')}}"/>Jun-Ianez</a>
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fa fa-bars"></i>
  </button>

  <ul class="navbar-nav ms-auto ml-md-0">
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" aria-haspopup="true"
         data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-fw fa-plus"></i>
      </a>
      <div class="dropdown-menu" id="navbarDropdown" aria-labelledby="navbarDropdown">
        <h6 class="dropdown-header">Products</h6>
        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addProductModal">
          <i class="fa fa-fw fa-tags"></i>
          New Product
        </a>
        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
          <i class="fa fa-fw fa-tag"></i>
          New Product Category
        </a>

        <div class="dropdown-divider"></div>

        <h6 class="dropdown-header">Suppliers</h6>
        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
          <i class="fa fa-fw fa-truck"></i>
          New Supplier
        </a>
        <div class="dropdown-divider"></div>

        <h6 class="dropdown-header">Cashier</h6>
        <a href="/orders_create" class="dropdown-item">
          <i class="fa fa-fw fa-shopping-cart"></i>
          New Order
        </a>

        <div class="dropdown-divider"></div>


        <h6 class="dropdown-header">Inventory</h6>
        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
          <i class="fa fa-fw fa-list-alt"></i>
          New Inventory
        </a>

        <div class="dropdown-divider"></div>

        @if(Auth::check() && Auth::user()->hasRole('admin'))
        <h6 class="dropdown-header">Users</h6>
        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addUserModal">
          <i class="fa fa-fw fa-user"></i>
          New User
        </a>
        @endif
      </div>
    </li>

    <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" aria-haspopup="true"
               data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-fw fa-sitemap"></i>
            </a>
            <div class="dropdown-menu" id="navbarDropdown" aria-labelledby="navbarDropdown">
              <h6 class="dropdown-header">Products</h6>
              <a href="/products" class="dropdown-item">
                <i class="fa fa-fw fa-tags"></i>
                All Products
              </a>
              <a href="/categories" class="dropdown-item">
                <i class="fa fa-fw fa-tag"></i>
                All Product Categories
              </a>

              <div class="dropdown-divider"></div>

              <h6 class="dropdown-header">Suppliers</h6>
              <a href="/suppliers" class="dropdown-item">
                <i class="fa fa-fw fa-truck"></i>
                All Suppliers
              </a>
              <div class="dropdown-divider"></div>

              <h6 class="dropdown-header">Cashier</h6>
              <a href="/orders" class="dropdown-item">
                <i class="fa fa-fw fa-history"></i>
                Orders History
              </a>
              <a href="/billings" class="dropdown-item">
                <i class="fa fa-fw fa-receipt"></i>
                Billing History
              </a>

              <div class="dropdown-divider"></div>

              <h6 class="dropdown-header">Inventory</h6>
              <a href="/inventories" class="dropdown-item">
                <i class="fa fa-fw fa-list-alt"></i>
               All Inventories
              </a>

              <div class="dropdown-divider"></div>

              @if(Auth::check() && Auth::user()->hasRole('admin'))
              <h6 class="dropdown-header">Users</h6>
              <a href="/users" class="dropdown-item">
                <i class="fa fa-fw fa-users"></i>
                All Users
              </a>
              @endif

              <a class="dropdown-item" href="/logout" onclick="return confirm('Are you sure you want to log out?')">
                <i class="fa-solid fa-fw fa-power-off"></i>
                Logout
              </a>
            </div>
          </li>

  </ul>
</nav>
<div id="wrapper">
  <ul class="sidebar navbar-nav">
    <li class="nav-item mt-3">
      <a class="nav-link" href="/">
        <i class="fa fa-fw fa-area-chart"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">
        <i class="fa fa-fw fa-tags"></i>
        <span>
              Products
              <i class="float-right fa fa-angle-down"></i>
            </span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Products</h6>
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addProductModal"> <i
                  class="fa fa-plus"></i>
          Add Product</a>
        <a class="dropdown-item" href="/products"> <i class="fa fa-tags"></i>
          All Products</a>
        <div class="dropdown-divider"></div>

        <h6 class="dropdown-header">Product Category</h6>
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addCategoryModal"> <i
                  class="fa fa-plus">
          </i>Add New Category</a>
        <a class="dropdown-item" href="categories"> <i class="fa fa-tag">
          </i>Product Categories</a>
      </div>
    </li>
    <li class="nav-item mt-3">
      <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">
        <i class="fa fa-fw fa-truck"></i>
        <span>
              Suppliers
              <i class="float-right fa fa-angle-down"></i>
            </span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Suppliers</h6>
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addSupplierModal"> <i
                  class="fa fa-fw fa-plus">
          </i> Add Supplier</a>
        <a class="dropdown-item" href="/suppliers"><i class="fa fa-fw fa-truck">
          </i> All Suppliers</a>
      </div>
    </li>
    <li class="nav-item mt-3">
      <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">
        <i class="fa fa-fw fa-shopping-cart"></i>
        <span>
              Cashier
              <i class="float-right fa fa-angle-down"></i>
            </span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Cashier</h6>
        <a class="dropdown-item" href="/orders_create"> <i class="fa fa-fw fa-desktop"></i> Add Order</a>
        <a class="dropdown-item" href="/orders"> <i class="fa fa-fw fa-history"></i> All Orders</a>
        <a class="dropdown-item" href="/billings"> <i class="fa fa-fw fa-receipt"></i> All Billings</a>
      </div>
    </li>

    @if(Auth::check() && Auth::user()->hasRole('admin'))
      <li class="nav-item mt-3">
        <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
          <i class="fa fa-fw fa-users"></i>
          <span>
              Users
              <i class="float-right fa fa-angle-down"></i>
            </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Users</h6>
          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal"> <i
                    class="fa fa-plus"></i>
            Add User</a>

            <a class="dropdown-item" href="/users"> <i class="fa fa-users"></i>
            All Users</a>
        </div>
      </li>
    @endif
    <li class="nav-item mt-3">
      <a class="nav-link" href="/inventories">
        <i class="fa fa-fw fa-list-alt"></i>
        <span>Inventory</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <a class="nav-link" href="/logout" onclick="return confirm('Are you sure you want to log out?')">
        <i class="fa-solid fa-power-off"></i>
        <span>Logout</span>
      </a>
    </li>
  </ul>
  <div id="content-wrapper">
    <div class="container-fluid">

      @yield('content')

    </div>
    @include('components.footer')
  </div>
  @include('components.modals')

</div>



<script>
  $(document).ready(function () {
    setTimeout(function () {
      $("div.alert").remove();
    }, 12000);
  });
</script>

@yield('script')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/chart.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/sidebar.min.js')}}"></script>
<script src="{{asset('js/chart-area-demo.js')}}"></script>

</body>
</html>
