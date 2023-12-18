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
                    <h1 class="text-center display-3" id="sales-count"><strong>0</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/billings">
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
                  <h1 id="best-seller">TBD</h1>
                  <small class="float-left">Top-Selling</small>
                </div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-external-link-square "></i>
                  </div>
                  <div class="card-text">
                      <strong><h1 class="text-center display-3" id="total-sales">0.00</h1></strong>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/bestsellers">
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
                    <h1 class="text-center display-3" id="out-of-stock"><strong>0</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/inventories">
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
                    <h1 class="text-center display-3" id="nearly-expired"><strong>0</strong></h1>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/inventories">
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
            <div class="card-footer small text-muted" id="last-updated"></div>


	@endsection

    @section('script')
          <script>

              $(document).ready(function () {
                  fetchSalesCount()
                  fetchBestSeller()
                  fetchOutOfStock()
                  fetchNearlyExpired()
                  fetchMonthlySales()
                  lastUpdated()
              })

              function animateCounter(element, initialValue, finalValue, duration) {
                  $({ Counter: initialValue }).animate({
                      Counter: finalValue
                  }, {
                      duration: duration,
                      easing: 'linear',
                      step: function () {
                          element.text(Math.ceil(this.Counter))
                      }
                  });
              }

              function animateCounterFloat(element, initialValue, finalValue, duration) {
                  $({ Counter: initialValue }).animate({
                      Counter: finalValue
                  }, {
                      duration: duration,
                      easing: 'linear',
                      step: function () {
                          element.text(parseFloat(this.Counter).toFixed(2));
                      }
                  });
              }

              function editSalesCount(data) {
                  $('#sales-count').html(data.data)
                  animateCounter($('#sales-count'), 0, data.data, 1000);
              }
              function editTopSellingCard(data) {
                  $('#best-seller').html(data.data.product_details.product_name)
                  $('#total-sales').html(data.data.bestseller_total_sales)
                  animateCounterFloat($('#total-sales'), 0, data.data.bestseller_total_sales, 1000)
              }

              function editOutOfStockCount(data){
                  $('#out-of-stock').html(data.data)
                  animateCounter($('#out-of-stock'), 0, data.data, 1000)
              }

              function editNearlyExpiredCount(data){
                  $('#nearly-expired').html(data.data)
                  animateCounter($('#nearly-expired'), 0, data.data, 1000)
              }

              function fetchSalesCount() {
                  $.ajax({
                      url: '/fetch/sales-count',
                      method: 'get',
                      dataType: 'JSON',
                      success: function (data){
                          editSalesCount(data)
                      }, error: function (response) {
                          console.error(response)
                      }
                  })
              }

              function fetchBestSeller() {
                  $.ajax({
                      url: "/bestseller/fetch",
                      method: "GET",
                      dataType: "JSON",
                      success: function (data) {
                          editTopSellingCard(data)
                      },
                      error: function (response) {
                          console.error(response)
                      }
                  })
              }

              function fetchOutOfStock() {
                  $.ajax({
                      url: "/fetch/out-of-stock",
                      method: "GET",
                      dataType: "JSON",
                      success: function (data) {
                          editOutOfStockCount(data)
                      },
                      error: function (response) {
                          console.error(response)
                      }
                  })
              }

              function fetchNearlyExpired() {
                  $.ajax({
                      url: "/fetch/nearly-expired",
                      method: "GET",
                      dataType: "JSON",
                      success: function (data) {
                          editNearlyExpiredCount(data)
                      },
                      error: function (response) {
                          console.error(response)
                      }
                  })
              }

              function lastUpdated(){
                  var currentdate = new Date();
                  var datetime = "Last Updated: " + currentdate.getDate() + "/"
                      + (currentdate.getMonth()+1)  + "/"
                      + currentdate.getFullYear() + " @ "
                      + currentdate.getHours() + ":"
                      + currentdate.getMinutes() + ":"
                      + currentdate.getSeconds();
                  $('#last-updated').html(datetime)
              }

              function populateChart(data) {
                  var ctx = document.getElementById("myAreaChart");
                  let monthAbbreviations = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'];

                  data.forEach(item => {
                      item.total_sales = parseFloat(item.total_sales);
                  });

                  var myLineChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                          labels: data.map(item => monthAbbreviations[item.month]),
                          datasets: [{
                              label: "Profit",
                              lineTension: 0.3,
                              backgroundColor: "#00a63f",
                              borderColor: "#00a63f",
                              pointRadius: 5,
                              pointBackgroundColor: "#00a63f",
                              pointBorderColor: "rgba(255,255,255,0.8)",
                              pointHoverRadius: 5,
                              pointHoverBackgroundColor: "#00a63f",
                              pointHitRadius: 50,
                              pointBorderWidth: 2,
                              data: data.data.total_sales,
                          }],
                      },
                      options: {
                          scales: {
                              xAxes: [{
                                  time: {
                                      unit: 'date'
                                  },
                                  gridLines: {
                                      display: false
                                  },
                                  ticks: {
                                      maxTicksLimit: 12
                                  }
                              }],
                              yAxes: [{
                                  ticks: {
                                      min: 0,
                                      max: 50000,
                                      maxTicksLimit: 16
                                  },
                                  gridLines: {
                                      color: "rgba(0, 0, 0, .125)",
                                  }
                              }],
                          },
                          legend: {
                              display: false
                          }
                      }
                  });
              }

              function fetchMonthlySales() {
                  $.ajax({
                      url: 'fetch/monthly-sales',
                      method: 'get',
                      dataType: 'JSON',
                      success: function (data)
                      {
                          populateChart(data)


                      }, error: function (response) {
                          console.error(response)
                      }
                  })
              }


          </script>
    @endsection
