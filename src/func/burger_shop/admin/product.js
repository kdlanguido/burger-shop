function load_products() {
  $.ajax({
    type: "GET",
    url: "src/database/burger_shop/func/admin/read_products.php",
    success: function (data) {
      write_tbl_products(JSON.parse(data));
    },
  });
}
function write_tbl_products(data) {
  output = "";
  var count = 1;
  $.each(data, function (key, val) {
    output +=`
              <tr>  
                <td class="text-center p-1"> `+ count  + ` </td>
                <td class="text-center p-1"> `+ val.name + ` </td>
                <td class="text-center p-1"> <a target="blank" href="`+ val.picture +`"><img src=" `+ val.picture +`"style="height:250px; width:230px;"/></a></td>
                <td class="text-center p-1"> `+ val.category + ` </td>
                <td class="text-center p-1"> `+ val.price + `</td>

                <td class="text-center p-1">
                 
                  <i class="fa-solid fa-pen-to-square icon_btn text-primary pe-1 edit_product" 
                  attr-name="`+ val.name + `"
                  attr-picture="`+ val.picture + `"
                  attr-category="`+ val.category +`"
                  attr-price="`+ val.price + `"
                  attr-id= `+val.id +`></i>

                  <i class="fa-solid text-danger fa-trash-can icon_btn text-primary pe-1 delete_product" attr-id= `+val.id +`></i>
                </td>
              </tr>  
    `;
    count = count+1
  });

  $("#tbl_products tbody").empty().append(output);

  $('.delete_product').on('click', function(){
    var prod_id = $(this).attr('attr-id')
    show_msg('Delete Product','Do you want to delete this product? <br><br><div class="text-center"><button class="btn border-danger mt-2 text-danger py-0 px-3" id="btn_confirm_delete">Delete Product</button></div>')
    $('#btn_confirm_delete').on('click', function(){
      delete_product(prod_id)
    })
  })

  $('.edit_product').on('click', function(){
    load_category('txt_edit_product_category', $(this).attr('attr-category').toLowerCase())
    $('#md_edit_item').modal('show')
    $('#btn_preview_image').attr('href', $(this).attr('attr-picture'))
    $('#img_product').attr('src', $(this).attr('attr-picture'))
    $('#txt_edit_product_name').attr('value',$(this).attr('attr-name'))
    $('#txt_edit_product_price').attr('value',$(this).attr('attr-price'))
    $('#txt_edit_product_category').val($(this).attr('attr-category'))
    $('#txt_edit_product_picture').attr('value',$(this).attr('attr-picture'))
    $('#txt_edit_product_id').attr('value',$(this).attr('attr-id'))
  })
}

function load_category(id,val){
  var output = "";
  $.getJSON("src/database/burger_shop/func/admin/read_product_categories.php",function(data){
    $.each(data, function(key,val){
      output += `<option value="`+val.category.toLowerCase()+`">`+val.category.toUpperCase()+`</option>`
    })
    output += `<option value="other">OTHER</option>`
    $('#'+id).empty().append(output)
    $('#'+id).val(val)

  })
}

$('#btn_edit_product_change_picture').on('click', function(){
  $('#txt_edit_product_picture').trigger('click')
})

$('#txt_edit_product_picture').on('change', function(){
  readURL(this)
})

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#img_product').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}

function delete_product(id) {
  $.ajax({
    type: "POST",
    url: "src/database/burger_shop/func/admin/delete_product.php",
    data: {
      id:id
    },
    success: function (data) {
        $('#msg_title').empty().append("Product Deleted")
        $('#msg_body').empty().append("Product has been deleted successfully.")
        $('#md_msg_box').modal('show')
        load_products()
    },
  });
}

$('.txt_product_category').on("change",function(){
  if($(this).val() == 'other'){
    $('#txt_other_category').removeClass('d-none')
  }
  else{
    $('#txt_other_category').addClass('d-none')
  }
})



$("form#form_edit_product").submit(function (e) {
  e.preventDefault();

  var formData = new FormData(this);

  if($('#txt_edit_product_name').val() && $('#txt_edit_product_price').val() )
  {
    $.ajax({
      url: "src/database/burger_shop/func/admin/update_product.php",
      type: "POST",
      data: formData,
      success: function (data) {
        show_msg("Add Product", "Product updated successfully.")
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  }
  else{
    show_msg("Add Product", "Please fill in required fields.")
  }

})
$("form#form_add_product").submit(function (e) {
  e.preventDefault();

  var formData = new FormData(this);

  if($('#txt_product_name').val() && $('#txt_price').val() && document.getElementById("txt_picture").files.length > 0)
  {
    $.ajax({
      url: "src/database/burger_shop/func/admin/add_product.php",
      type: "POST",
      data: formData,
      success: function (data) {
        show_msg("Add Product", "Product added successfully.")
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  }
  else{
    show_msg("Add Product", "Please fill in required fields.")
  }

})

// function view_products(id) {
//   $.ajax({
//     type: "GET",
//     url: "src/database/burger_shop/func/admin/read_products_data.php?id=" + id,
//     success: function (data) {
//       output = "";
//       $.each(JSON.parse(data).data, function (key, val) {
//         output += "<tr>";
//         output += '<td class="text-center p-1">' + val.name + "</td>";
//         output += '<td class="text-center p-1">' + val.qty + "</td>";
//         output += '<td class="text-center p-1">&#8369;' + val.price + "</td>";
//         output += "</tr>";

//         $('#btn_save_update_products').attr('attr-id', val.ref_no)

//       });
//       $.each(JSON.parse(data).total, function (key, val) {
//         $("#txt_total").empty();
//         $("#txt_total").append("&#8369;" + val.total);
//       });
      

//       $.each(JSON.parse(data).payment, function (key, val) {
//         $("#txt_payment_method").val(val.payment_method);
//         $("#txt_payment_amount").val("₱" + numberWithCommas(val.payment));
//         $("#txt_payment_number").val( val.payment_details);
//       });
      
//       $("#tbl_view_products tbody").empty();
//       $("#tbl_view_products tbody").append(output);
//       $("#tbl_view_products_print tbody").empty();
//       $("#tbl_view_products_print tbody").append(output);
//       $("#md_view_products").modal("show");
//       $('#btn_update_products').removeClass('d-none')

//     },
//   });
// }

// function view_products_paid(id) {
//   $.ajax({
//     type: "GET",
//     url: "src/database/burger_shop/func/admin/read_products_data.php?id=" + id,
//     success: function (data) {
//       output = "";
//       $.each(JSON.parse(data).data, function (key, val) {
//         output += "<tr>";
//         output += '<td class="text-center p-1">' + val.name + "</td>";
//         output += '<td class="text-center p-1">' + val.qty + "</td>";
//         output += '<td class="text-center p-1">&#8369;' + val.price + "</td>";
//         output += "</tr>";

//         $('#btn_save_update_products').attr('attr-id', val.ref_no)

//       });
//       $.each(JSON.parse(data).total, function (key, val) {
//         $("#txt_total").empty();
//         $("#txt_total").append("&#8369;" + val.total);
//       });
//       $("#tbl_view_products tbody").empty();
//       $("#tbl_view_products tbody").append(output);
//       $("#tbl_view_products_print tbody").empty();
//       $("#tbl_view_products_print tbody").append(output);
//       $("#md_view_products").modal("show");
//       $('#btn_update_products').addClass('d-none')
//     },
//   });
// }

// $('#btn_save_update_products').on('click', function(){
//   $.ajax({
//     type: "POST",
//     url: 'src/database/burger_shop/func/admin/update_products.php',
//     data:{
//       id:$(this).attr('attr-id'),
//       status:$('#sel_update_products_status').val()
//     },
//     success: function(data){
//         load_products()

//         $('#msg_title').empty()
//         $('#msg_title').append("products Completed")
//         $('#msg_body').empty()
//         $('#msg_body').append("Transaction Completed Successfully.")

//         $('#md_msg_box').modal('show')
        
//     }
// });
// })