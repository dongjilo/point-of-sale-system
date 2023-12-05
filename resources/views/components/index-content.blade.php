      <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-header">
                  <h1>Sales Count</h1>
                  <small class="float-left">Last 7 days</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-money"></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>135</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="sales-count.html">
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
                  <h1>Top-Selling</h1>
                  <small class="float-left">Speakers</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-flash"></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>24</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="top-selling.html">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
              <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-header">
                  <h1>Short Items</h1>
                  <small class="float-left">Includes short and requested items</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-tags"></i>
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
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-header">
                  <h1>Improvements</h1>
                  <small class="float-left">Based on total monthly sales</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="card-text">
                    <h1 class="text-center display-3"><strong>27%</strong></h1>
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
              Sales Chart</div>

            <div class="card-body">
              <canvas id="salesChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Last Updated: </div>
          </div>
        </div>
        <br/><br/><br/>
        @include('components.footer')
      </div>
