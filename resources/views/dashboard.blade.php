@extends('scaffholding-page')
	@section('title')
		{{"Home - Dashboard"}}
	@endsection

	@section('content')
          <ol class="breadcrumb rounded p-2">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
          @include('components.alertMessages')
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
                    <h1 class="text-center display-3"><strong>150</strong></h1>
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
                <a class="card-footer text-white clearfix small z-1" href="">
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
                <a class="card-footer text-white clearfix small z-1" href="">
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
	@endsection