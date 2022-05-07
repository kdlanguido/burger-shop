function load_filter_dates() {
  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_dashboard_date_filter.php",
    success: function (data) {
      write_filter_dates(JSON.parse(data));
    },
  });
}
function write_filter_dates(data) {
  output = "";
  output += "<option value='all'>All</option>";

  $.each(data, function (key, val) {
    output += '<option value="' + val + '">' + val + "</option>";
  });



  $("#sel_date_filter").empty();
  $("#sel_date_filter").append(output);

  $("#sel_date_filter").trigger("change");
}

function load_dashboard_information(date) {
  $.ajax({
    type: "GET",
    url:
      "src/database/burger_shop/func/admin/read_dashboard_information.php?date=" +
      date,
    success: function (data) {
      var tbl_output = "";
      var count = 1;

      $("#txt_total_annual_sales").text("₱ 0");

      $.each(JSON.parse(data), function (key, val) {
        $("#txt_total_registered_users").text(val.total_user);
        $("#txt_total_completed").text(val.total_completed);
        $("#txt_total_orders").text(val.total_order);

        if (val.annual_sale > 0) {
          $("#txt_total_annual_sales").text("₱ " + numberWithCommas(val.annual_sale));
          monthly_sale = parseInt(val.annual_sale) / 12;
          monthly_sale = Math.round(monthly_sale);
          $("#txt_total_monthly_sales").text("₱ " + numberWithCommas(monthly_sale));
        }


        if (val.top_sellers) {
          $.each(val.top_sellers, function (key, valx) {

            tbl_output += `
                            <tr>
                              <td class="text-center"> `+ count + `</td>
                              <td class="text-center"> `+ valx.top_seller + `</td>
                              <td class="text-center"> `+ valx.top_seller_count + `</td>                            
                            </tr>            
            `
            count = count + 1;
          });
        }

        if (val.chart_data) {
          let products = [];
          let qtys = [];
          $.each(val.chart_data, function (key, val) {
            products.push(val.name)
            qtys.push(val.qty)
          });

          write_chart(products, qtys)

        }
      });

      $("#tbl_dashboard_top_selling_qtys tbody").empty();

      if (tbl_output) {
        $("#tbl_dashboard_top_selling_products tbody").empty().append(tbl_output);
        $('#sm_no_data_available').addClass('d-none')

      }
      else {
        $("#tbl_dashboard_top_selling_products tbody").empty().append(tbl_output);

        $('#sm_no_data_available').removeClass('d-none')
      }

    },
  });
}

function load_dashboard_information_all() {
  $.ajax({
    type: "GET",
    url:
      "src/database/burger_shop/func/admin/read_dashboard_information.php?date=all",
    success: function (data) {
      var tbl_output = "";
      var count = 1;

      $("#txt_total_annual_sales").text("₱ 0");

      $.each(JSON.parse(data), function (key, val) {
        $("#txt_total_registered_users").text(val.total_user);
        $("#txt_total_completed").text(val.total_completed);
        $("#txt_total_orders").text(val.total_order);

        if (val.annual_sale > 0) {
          console.log(val.annual_sale)

          $("#txt_total_annual_sales").text("₱ " + numberWithCommas(val.annual_sale));
          monthly_sale = parseInt(val.annual_sale) / 12;
          monthly_sale = Math.round(monthly_sale);

          console.log(monthly_sale)
          $("#txt_total_monthly_sales").text("₱ " + numberWithCommas(monthly_sale));
        }


        if (val.top_sellers) {
          $.each(val.top_sellers, function (key, valx) {

            tbl_output += `
                            <tr>
                              <td class="text-center"> `+ count + `</td>
                              <td class="text-center"> `+ valx.top_seller + `</td>
                              <td class="text-center"> `+ valx.top_seller_count + `</td>                            
                            </tr>            
            `
            count = count + 1;
          });
        }

        if (val.chart_data) {
          let products = [];
          let qtys = [];
          $.each(val.chart_data, function (key, val) {
            products.push(val.name)
            qtys.push(val.qty)
          });

          write_chart(products, qtys)

        }
      });

      $("#tbl_dashboard_top_selling_qtys tbody").empty();

      if (tbl_output) {
        $("#tbl_dashboard_top_selling_products tbody").empty().append(tbl_output);
        $('#sm_no_data_available').addClass('d-none')

      }
      else {
        $('#sm_no_data_available').removeClass('d-none')
      }

    },
  });
}

$("#sel_date_filter").on("change", function () {
  if ($(this).val() == 'all') {
    load_dashboard_information_all()
  } else {
    load_dashboard_information($(this).val());
  }
});

function load_notifications() {
  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_notifications.php",
    success: function (data) {
      write_notification(JSON.parse(data))
    },
  });
}

function write_notification(data) {

  var output = '';
  $.each(data, function (key, val) {
    output += '<li class="dropdown-divider"></li> <li class="dropdown-item notif_drop_down" > <i class="fa-solid fa-comment"></i> <span>Payment Received </span><br> <div class="text-end"> <small class="fw-bold">' + val.order_ref_no + '</small> </div> </li>'
    $('#notif_count').empty().append(val.notif_count)
  })

  $('#notif_bar').empty().append(output)

  if (data.length < 1) {
    $('#notif_count').empty().append(0)
  }





  $('.notif_drop_down').on('click', function () {
    $('#btn_sidebar_order').trigger('click')
  })
}

const ctx = document.getElementById('chart_yearly').getContext('2d');


var myChart = new Chart(ctx, {
  type: 'line',
  data: {
   
  },
  options: {
  
  }
});

function write_chart(products, sales) {

  myChart.destroy();

  myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: products,//['Borgir 1', 'Borgir 2', 'Borgir 3', 'Borgir 4', 'Borgir 5', 'Borgir 6'],
      datasets: [{
        label: 'No of Sales',
        data: sales,//[12, 19, 3, 5, 2, 100],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          // 'rgba(54, 162, 235, 0.2)',
          // 'rgba(255, 206, 86, 0.2)',
          // 'rgba(75, 192, 192, 0.2)',
          // 'rgba(153, 102, 255, 0.2)',
          // 'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          // 'rgba(54, 162, 235, 1)',
          // 'rgba(255, 206, 86, 1)',
          // 'rgba(75, 192, 192, 1)',
          // 'rgba(153, 102, 255, 1)',
          // 'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

}


$('#txt_register_password').on('keypress', function () {


  if (CheckPassword($(this).val())) {
    $('#notify_combination').hide()
    $('#notify_num_char').hide()
    $('#btn_register_account_submit').attr("disabled", false)

  }
  else {
    $('#notify_num_char').show()
    $('#notify_combination').show()
    $('#btn_register_account_submit').attr("disabled", true)

  }







})