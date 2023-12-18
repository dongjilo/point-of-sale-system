Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

$.ajax({
  url: '/fetch/monthly-sales',
  method: 'get',
  dataType: 'JSON',
  success: function (data) {
    data.data.forEach(item => {
      item.total_sales = parseFloat(item.total_sales);
    });
    populateChart(data.data);
  },
  error: function (response) {
    console.error(response);
  }
});

function populateChart(data) {
  var ctx = document.getElementById("myAreaChart");
  let monthAbbreviations = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: data.map(item => monthAbbreviations[item.month - 1]),
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
        data: data.map(item => item.total_sales),
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
