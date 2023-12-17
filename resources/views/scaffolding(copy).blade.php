
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home - Dashboard</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  </head>

  <body>
    <nav class="navbar navbar-expand navbar-dark static-top">
      <a class="navbar-brand mr-1" href="#">Jun-Ianez</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fa fa-bars"></i>
        </button>

      <ul class="navbar-nav ms-auto ml-md-0">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false" >
            <i class="fa fa-fw fa-plus"></i>
          </a>
          <div class="dropdown-menu" id="navbarDropdwon" aria-labelledby="navbarDropdown">
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-target="">
            <i class="fa fa-fw fa-tags"></i>
            New Products
            </a>
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-target="">
            <i class="fa fa-fw fa-truck"></i>
            New Suppliers
            </a>
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-target="">
            <i class="fa fa-fw fa-tags"></i>
            New Products
            </a>
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-target="">
            <i class="fa fa-fw fa-tags"></i>
            New Products
            </a>
          </div>
        </li>
        <li class="nav-item dropdown"></li>
        <li class="nav-item dropdown"></li>
        <li class="nav-item dropdown"></li>
      </ul>
    </nav>
    <div id="wrapper">
      <ul class="sidebar navbar-nav">
        <li class="nav-item mt-3">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-area-chart"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-tags"></i>
            <span>
              Products
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Products</h6>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addProductModal"> <i class="fa fa-plus"></i>
            Add Product</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-tags"></i>
            All Products</a>
            <div class="dropdown-divider"></div>

            <h6 class="dropdown-header">Product Category</h6>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addProductCategoryModal"> <i class="fa fa-plus">
            </i>Add New Category</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-tag">
            </i>Product Categories</a>
          </div>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-truck"></i>
            <span>
              Suppliers
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Suppliers</h6>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addSupplierModal"> <i class="fa fa-fw fa-plus">
            </i> Add Supplier</a>
            <a class="dropdown-item" href="#"><i class="fa fa-fw fa-truck">
            </i> All Suppliers</a>

            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">
            Supplier Order/Receive</h6>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addSupplierOrderModal"> <i class="fa fa-fw fa-plus">
            </i>Order Product(s)</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-fw fa-arrow-circle-down"></i>Receive Product(s)</a>
          </div>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>
              Orders
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Cashier</h6>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addOrderModal"> <i class="fa fa-fw fa-desktop"></i> Add Order</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-fw fa-history"></i> All Orders</a>
          </div>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-list-alt"></i>
            <span>Inventory</span>
          </a>
        </li>
      </ul>
      <div id="content-wrapper">
        <a id="scroll-to-top" class="rounded" onclick="scrollToTop()"  title="Go to top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
      @include('components.modals')
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/sidebar.min.js"></script>
    <script src="js/chart-area-demo.js"></script>
  </body>
</html>