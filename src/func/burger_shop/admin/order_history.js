function load_order_history() {
  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_orders_history.php",
    success: function (data) {
      write_tbl_order_history(JSON.parse(data));
    },
  });
}
function write_tbl_order_history(data) {
  output = "";
  $.each(data, function (key, val) {
    // output += "<tr>";
    // output += '<td class="text-center p-1">' + val.ref_no + "</td>";
    // output += '<td class="text-center p-1">' + val.name + "</td>";
    // output += '<td class="text-center p-1">' + val.phone + "</td>";
    // output += '<td class="text-center p-1">' + val.status + "</td>";
    // output +=
    //   '<td class="text-center p-1"><i class="fa-solid fa-eye icon_btn text-primary pe-1" onClick="view_order_paid(\'' +val.ref_no +'\')"></i>';
    // output += "</td>";
    // output += "</tr>";

    output += `
                <tr> 
                  <td class="text-center p-1"> `+ val.ref_no +`</td>
                  <td class="text-center p-1"> `+ val.name +`</td>
                  <td class="text-center p-1"> `+ val.phone +`</td>
                  <td class="text-center p-1"> <span class="badge bg-success">`+ val.status +`</span> </td>
                  <td class="text-center p-1"><i class="fa-solid fa-eye icon_btn text-primary pe-1" onClick="view_order_paid(\'` +val.ref_no +`\')"></i></td>
                </tr>
    `
  });

  $("#tbl_order_history tbody").empty();
  $("#tbl_order_history tbody").append(output);
}
