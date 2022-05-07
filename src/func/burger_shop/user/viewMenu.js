// <-------------VIEWMENU -------------->

// <-------------VIEWMENU -------------->

// <-------------NAVBAR -------------->
$("#btn_navbar_home").on("click", function () {
  change_page("btn_navbar_home");
});



function load_filter_category(){
  var output = `<li><a class="dropdown-item menuDropdown" attr-name="all">All Products</a></li>`;
  $.getJSON("src/database/burger_shop/func/user/read_product_categories.php",function(data){
    $.each(data, function(key,val){
      output += `<li><a class="dropdown-item menuDropdown" attr-name="`+val.category.toLowerCase()+`">`+camelize(val.category)+`</a></li>`
    })
    $('#item_categories').empty().append(output)

    $(".menuDropdown").on("click", function () {
      load_filtered_products($(this).attr("attr-name"));
      $("#btn_filter_product").text(camelize($(this).attr("attr-name")));
    });
  })


}

$("#btn_navbar_contactUs").on("click", function () {
  if ($("#txt_user_id").val()) {
    change_page("btn_navbar_contactUs");
  }
  else{
    $('#msg_title').text('Login Required')
    $('#msg_body').text('Login required!')
    $('#md_msg_box').modal('show')
  }
});

$("#btn_myPurchase").on("click", function () {

  change_page("btn_myPurchase");
});
$("#btn_transaction").on("click", function () {

  change_page("btn_transaction");
});
// <-------------NAVBAR -------------->
