<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark static-top">
      <a class="navbar-brand mr-1" href="index.html">Jun-Ianez</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fa fa-bars"></i>
      </button>
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
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-tags"></i>
            <span>
              Products
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Products</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addProductModal"> <i class="fa fa-plus"></i> Add Product</a>
            <a class="dropdown-item" href="products.html"> <i class="fa fa-tags"></i> All Products</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Product Category</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addProductTypeModal"> <i class="fa fa-plus"></i> Add New Category</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-tags"></i> Product Categories</a>
          </div>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-truck"></i>
            <span>
              Suppliers
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Suppliers</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addProductModal"> <i class="fa fa-fw fa-plus"></i> Add Supplier</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-fw fa-truck"></i> All Suppliers</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Supplier Order/Receive</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addProductTypeModal"> <i class="fa fa-fw fa-plus"></i>Order Product</a>
            <a class="dropdown-item" href="#"> <i class="fa fa-fw fa-arrow-circle-down"></i>Receive Product</a>
          </div>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>
              Orders
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Cashier</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addProductModal"> <i class="fa fa-fw fa-desktop"></i> Add Order</a>
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
        <div class="container-fluid">
          <ol class="breadcrumb p-2">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>

          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-header">
                  <h1>Sales Count</h1>
                  <small class="float-left">In the last month</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw  fa-dollar"></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>135</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-header">
                  <h1>Top-Selling</h1>
                  <small class="float-left">TBD</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-external-link-square "></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>24</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-header">
                  <h1>Almost out of stock</h1>
                  <small class="float-left">list of products with short stocks</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-tag"></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>14</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="short-items.html">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-header">
                  <h1>Nearly expired products</h1>
                  <small class="float-left">list of products nearing expiry date</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-exclamation-circle"></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>15</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="improvements.html">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-chart-area"></i>
              Profit this year</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Last Updated:  </div>
          </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/rc-pos.min.js"></script>
    <script src="js/chart-area-demo.js"></script>
  </body>
</html>