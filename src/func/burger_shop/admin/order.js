function load_orders() {
  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_orders.php",
    success: function (data) {
      write_tbl_order(JSON.parse(data));
    },
  });
}
function write_tbl_order(data) {
  output = "";
  $.each(data, function (key, val) {
    output += "<tr>";
    output += '<td class="text-center p-1">' + val.ref_no + "</td>";
    output += '<td class="text-center p-1">' + val.name + "</td>";
    output += '<td class="text-center p-1">' + val.phone + "</td>";
    output += '<td class="text-center p-1">' + val.address + "</td>";

    if (val.status == "Out for Delivery") {
      output += '<td class="text-center p-1"><span class="badge bg-warning">' + val.status + "</span></td>";
    }
    else if (val.status == "Pending") {
      output += '<td class="text-center p-1"><span class="badge bg-warning">' + val.status + "</span></td>";

    }
    else if (val.status == "Completed") {
      output += '<td class="text-center p-1"><span class="badge bg-success">' + val.status + "</span></td>";
    }
    else {
      output += '<td class="text-center p-1"><span class="badge bg-danger">' + val.status + "</span></td>";
    }

    output +=
      '<td class="text-center p-1"><i class="fa-solid fa-eye icon_btn text-primary pe-1" onClick="view_order(\'' + val.ref_no + '\')"></i>';
    output += "</td>";
    output += "</tr>";
  });

  $("#tbl_orders tbody").empty().append(output);
}

function print_order() {
  var element = document.getElementById("div_to_print");
  var clonedElement = element.cloneNode(true);
  $(clonedElement).css("display", "block");
  // html2pdf(clonedElement);

  var opt = {
    filename: 'Receipt.pdf',
  };

  html2pdf().set(opt).from(clonedElement).save();
  clonedElement.remove();
}

function view_order(id) {

  var total = 0;
  var subtotal = 0;
  var delivery_fee = 0;


  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_order_data.php?id=" + id,
    success: function (data) {
      output = "";
      $.each(JSON.parse(data).data, function (key, val) {

        output += "<tr>";
        output += '<td class="text-center p-1">' + val.name + "</td>";
        output += '<td class="text-center p-1">' + val.qty + "</td>";
        output += '<td class="text-center p-1">&#8369;' + val.price + "</td>";
        output += "</tr>";

        $('#btn_save_update_order').attr('attr-id', val.ref_no)

      });
      $.each(JSON.parse(data).total, function (key, val) {
        $("#txt_total").empty().append("&#8369;" + val.total);
        $("#txt_total_print").empty().append("&#8369;" + val.total);
      });

      $.each(JSON.parse(data).subtotal, function (key, val) {
        $("#txt_subtotal").empty().append("&#8369;" + val.subtotal);

        subtotal = parseInt(val.subtotal)

      });

      $.each(JSON.parse(data).customer, function (key, val) {
        $('#print_name').text(val.name)
        $('#print_phone').text(val.phone)

      });



      $.each(JSON.parse(data).payment, function (key, val) {
        $("#txt_payment_method").val(val.payment_method);

        $('#print_payment_method').text(val.payment_method)
        // $('#print_payment').text('₱' + val.payment)
        $('#print_delivery_address').text(val.delivery_address)
        $('#print_note_to_rider').text(val.note_to_rider)

        $("#txt_payment_amount").val("₱" + numberWithCommas(val.payment));
        $("#txt_payment_number").val(val.payment_details);

        $("#img_payment_proof").attr("src", val.gcash_payment_proof);
        $("#img_payment_proof_a").attr("href", val.gcash_payment_proof);


        $("#txt_delivery_fee").text("₱" + val.delivery_fee);

        delivery_fee = parseInt(val.delivery_fee)

        if (val.payment_method == "GCASH") {
          $('#gcash').removeClass('d-none')
        }
        else {
          $('#gcash').addClass('d-none')

        }

      });
      total = parseInt(delivery_fee + subtotal)
      $('#txt_total').text("₱" + total)
      $('#txt_total_print').text("₱" + total)
      $('#print_payment').text('₱' +total)

      $('#txt_subtotal_view').text("₱" + subtotal)
      $('#txt_delivery_fee_view').text("₱" + delivery_fee)
      $("#tbl_view_order tbody").empty().append(output);
      $("#tbl_view_order_print tbody").empty().append(output);



      $("#md_view_order").modal("show");
      $('#btn_update_order').removeClass('d-none')

    },
  });
}

function view_order_paid(id) {


  var total = 0;
  var subtotal = 0;
  var delivery_fee = 0;

  $('#btn_update_order').addClass('d-none')

  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_order_data.php?id=" + id,
    success: function (data) {
      output = "";
      $.each(JSON.parse(data).data, function (key, val) {

        output += "<tr>";
        output += '<td class="text-center p-1">' + val.name + "</td>";
        output += '<td class="text-center p-1">' + val.qty + "</td>";
        output += '<td class="text-center p-1">&#8369;' + val.price + "</td>";
        output += "</tr>";

        $('#btn_save_update_order').attr('attr-id', val.ref_no)

      });
      $.each(JSON.parse(data).total, function (key, val) {
        $("#txt_total").empty().append("&#8369;" + val.total);
        $("#txt_total_print").empty().append("&#8369;" + val.total);
      });

      $.each(JSON.parse(data).subtotal, function (key, val) {
        $("#txt_subtotal").empty().append("&#8369;" + val.subtotal);

        subtotal = parseInt(val.subtotal)

      });

      $.each(JSON.parse(data).customer, function (key, val) {
        $('#print_name').text(val.name)
        $('#print_phone').text(val.phone)

      });



      $.each(JSON.parse(data).payment, function (key, val) {
        $("#txt_payment_method").val(val.payment_method);

        $('#print_payment_method').text(val.payment_method)
        $('#print_payment').text('₱' + val.payment)
        $('#print_delivery_address').text(val.delivery_address)
        $('#print_note_to_rider').text(val.note_to_rider)

        $("#txt_payment_amount").val("₱" + numberWithCommas(val.payment));
        $("#txt_payment_number").val(val.payment_details);

        $("#img_payment_proof").attr("src", val.gcash_payment_proof);
        $("#img_payment_proof_a").attr("href", val.gcash_payment_proof);


        $("#txt_delivery_fee").text("₱" + val.delivery_fee);

        delivery_fee = parseInt(val.delivery_fee)


        if (val.payment_method == "GCASH") {
          $('#gcash').removeClass('d-none')
        }
        else {
          $('#gcash').addClass('d-none')

        }

      });

      $('#txt_subtotal_view').text("₱" + subtotal)
      $('#txt_delivery_fee_view').text("₱" + delivery_fee)
      total = parseInt(delivery_fee + subtotal)
      $('#txt_total').text("₱" + total)
      $('#txt_total_print').text("₱" + total)


      $("#tbl_view_order tbody").empty().append(output);
      $("#tbl_view_order_print tbody").empty().append(output);
      $("#md_view_order").modal("show");
    },
  });

}

$('#btn_save_update_order').on('click', function () {

  show_msg("Confirm", `Do you want to mark this order as ` + $('#sel_update_order_status').val() + `?
  
  <br>
  <div class="text-center mt-2">
  <button class="btn btn-sm btn-primary" id="update_order_confirm_notif">Confirm</button>
  </div>
  
  `)

  $('#update_order_confirm_notif').on('click', function () {
    $.ajax({
      type: "POST",
      url: 'src/database/burger_shop/func/admin/update_order.php',
      data: {
        id: $('#btn_save_update_order').attr('attr-id'),
        status: $('#sel_update_order_status').val()
      },
      success: function (data) {
        load_notifications();
        load_orders()

        $('#msg_title').empty().append("Order Completed")
        $('#msg_body').empty().append("Transaction Completed Successfully.")
        $('#md_msg_box').modal('show')

      }
    });
  })



})
