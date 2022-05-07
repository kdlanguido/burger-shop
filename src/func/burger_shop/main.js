let pages = {
  feedback: "page_feedback",
  order: "page_order",
  order_history: "page_order_history",
  inventory: "page_inventory",
  dashboard: "page_dashboard",
  feedback: "page_feedback",
  product: "page_product",
  viewMenu: 'page_viewMenu',
  btn_navbar_home: 'page_home',
  btn_navbar_contactUs: 'page_contactUs',
  my_orders: 'page_transaction',
  cart: 'page_myPurchase'
};

var token = '';


function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function setCookie(cookie) {
  document.cookie = cookie;
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function camelize(str) {
  return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
}
function check_if_number(txt_id) {
  $('#' + txt_id).keypress(function (e) {

    var charCode = (e.which) ? e.which : event.keyCode


    if ($('#' + txt_id).val().length > 10) {
      return false;

    }
    if (String.fromCharCode(charCode).match(/[^0-9]/g)) {
      return false;

    }


  });
}

var pass_type = 'password'

$('.view_password').on('click', function () {

  if (pass_type == 'password') {
    $('.password').attr('type', 'text')
    pass_type = 'text';

  }
  else {
    $('.password').attr('type', 'password')
    pass_type = 'password';


  }
})

$(document).ready(function () {

  check_if_number('txt_register_phone');
  check_if_number('txt_payment_details');
  check_if_number('txt_signup_phone');



  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  $('.show-password').on('click', function () {
    $('#txt_view_password').attr('type', 'text')
    $('.hide-password').removeClass('d-none')
    $(this).addClass('d-none')
  })

  $('.hide-password').on('click', function () {
    $('#txt_view_password').attr('type', 'password')
    $('.show-password').removeClass('d-none')
    $(this).addClass('d-none')

  })

  page = getCookie("page");
  cart_id = $('#txt_card_id').val()

  $("#txt_order_ref_no_payment2").val('test');


  if (cart_id) {
    load_cart_orders(cart_id)
  }


  if ($("#txt_user_access").val() == "admin") {

    setInterval(() => {
      load_notifications()
      load_orders();
    }, 10000);



    if (page == "products") {
      $("#btn_sidebar_products").trigger("click");
      $(".overlay").removeClass("opacity-0");
    }

    if (page == "dashboard") {
      $("#btn_sidebar_dashboard").trigger("click");
      $(".overlay").removeClass("opacity-0");


    }

    if (page == "feedback") {
      $("#btn_sidebar_feedback").trigger("click");
      $(".overlay").removeClass("opacity-0");
    }

    if (page == "inventory") {
      $("#btn_sidebar_inventory").trigger("click");
      $(".overlay").removeClass("opacity-0");
    }

    if (page == "order_history") {
      $("#btn_sidebar_order_history").trigger("click");
      $(".overlay").removeClass("opacity-0");
    }

    if (page == "order") {
      $("#btn_sidebar_order").trigger("click");
      $(".overlay").removeClass("opacity-0");
    }


    if (!page) {
      $("#btn_sidebar_dashboard").trigger("click");
      $(".overlay").removeClass("opacity-0");
    }

    // ADMIN
    load_feedbacks();

    load_notifications()
    load_orders();

    //order_history.js
    load_order_history();

    //dashboard.js
    load_filter_dates();



    $("#btn_account_settings").on("click", function () {
      load_account_settings($("#txt_user_id").val());
    });

    $("#btn_delete_account").on("click", function () {
      delete_account($("#txt_user_id").val());
    });

    $("#btn_update_account").on("click", function () {
      $('#md_account_settings').modal('hide')
      update_account($("#txt_user_id").val());
    });
  } else {

    load_filter_category()
    $('.list-group-item ').on('click', function () {
      $('#burger_machine_sidebar').offcanvas('toggle')
    })


    // USER
    load_products();

    //home.js
    load_best_sellers()


    // 

    $('#btn_sidebar_user_home').on('click', function () {
      $('#btn_navbar_home').trigger('click')
    })
    $('#viewMenu').on('click', function () {
      change_page('viewMenu')
    })

    $('#clone_btn_navbar_contactUs').on('click', function () {
      $('#btn_navbar_contactUs').trigger('click')
    })

    $('#clone_btn_navbar_myorders').on('click', function () {
      $('#view_my_orders').trigger('click')
    })



  }
});

function change_page(pagename) {
  $(".page").addClass("d-none");
  $("#" + pages[pagename]).removeClass("d-none");
}

function load_account_settings(id) {
  $.ajax({
    type: "GET",
    url:
      "src/database/burger_shop/func/admin/read_account_settings.php?id=" + id,
    success: function (data) {
      write_account_settings(JSON.parse(data));
    },
  });
}
function write_account_settings(data) {
  $.each(data, function (key, val) {
    $("#txt_username").val(val.username);
    $("#txt_email").val(val.email);
    $("#txt_password").val(val.password);
    $("#txt_phone").val(val.phone);
    $("#txt_full_name").val(val.name);

  });
}
function delete_account(id) {
  $.ajax({
    type: "POST",
    url: "src/database/burger_shop/func/admin/delete_account.php?id=" + id,
    success: function (data) {
      $("#msg_title").text("Delete Account");
      $("#msg_body").text("Account deleted successfully.");
      $("#md_msg_box").modal("show");

    },
  });
}
function update_account(id) {
  if ($("#txt_username").val() && $("#txt_email").val() && $("#txt_phone").val() && $("#txt_password").val() && $("#txt_full_name").val()) {
    $.ajax({
      type: "POST",
      data: {
        username: $("#txt_username").val(),
        email: $("#txt_email").val(),
        password: $("#txt_password").val(),
        phone: $("#txt_phone").val(),
        full_name: $("#txt_full_name").val(),
      },
      url: "src/database/burger_shop/func/admin/update_account.php?id=" + id,
      success: function (data) {
        $("#msg_title").text("Update Account");
        $("#msg_body").text("Account updated successfully.");
        $("#md_msg_box").modal("show");
        $('#admin_menu_name').empty()
        $('#admin_menu_name').append('Welcome, <b>' + data + '</b>')
      },
    });
  }
  else {
show_msg("Update Account", "Please fill in required fields.")
  }

}


function generate_token(length) {
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() *
      charactersLength));
  }
  return result;
}

// $("#btn_login").on("click", function (e) {
//   e.preventDefault();
//   $.ajax({
//     type: "POST",
//     url: "src/database/burger_shop/func/login.php",
//     data: {
//       username: $("#txt_username").val(),
//       password: $("#txt_password").val(),
//       token: generate_token(10)
//     }
//   });
// });


$('#btn_signup_submit').on('click', function (e) {
  e.preventDefault();

  if (
    $("#txt_signup_username").val() && $("#txt_signup_password").val() &&
    $("#txt_signup_fullname").val() && $("#txt_signup_phone").val() &&
    $("#txt_signup_email").val() && $("#txt_signup_address_no").val() &&
    $("#txt_signup_address_st").val() && $("#txt_signup_address_brgy").val() &&
    $("#txt_signup_address_city").val() && $("#txt_signup_password2").val()
  ) {
    $.ajax({
      type: "POST",
      url: "src/database/burger_shop/func/user/add_account.php",
      data: {
        username: $("#txt_signup_username").val(),
        password: $("#txt_signup_password").val(),
        fullname: $("#txt_signup_fullname").val(),
        phone: $("#txt_signup_phone").val(),
        email: $("#txt_signup_email").val(),
        address_no: $("#txt_signup_address_no").val(),
        address_st: $("#txt_signup_address_st").val(),
        address_brgy: $("#txt_signup_address_brgy").val(),
        address_city: $("#txt_signup_address_city").val()

      },
      success: function () {
        $('#signUpModal').modal('hide')
        $("#msg_title").text("Sign up Account");
        $("#msg_body").text("Registration Successful");
        $("#md_msg_box").modal("show");
      }
    });
  }
  else {
    show_msg("Registration Failed", "Please input required fields")
  }






})

function show_msg(title, msg) {
  $("#msg_title").text(title);

  $("#msg_body").empty().append(msg);
  $("#md_msg_box").modal("show");


}

function CheckPassword(inputtxt) {
  var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  if (inputtxt.match(passw)) {
    return true;
  }
  else {
    return false;
  }
}


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$('#txt_register_email').on('keypress', function () {
  if (!isEmail($(this).val())) {
    $('#notify_email_admin').show()
    $('#btn_register_account_submit').attr('disabled', true)
  }
  else {
    $('#notify_email_admin').hide()
    $('#btn_register_account_submit').attr('disabled', false)

  }
})


$('#btn_nav_admin_view_account').on('click', function () {
  $('#btn_account_settings').trigger('click')
})

$('#btn_nav_admin_add_account').on('click', function () {
  $('#md_add_account').modal('show')
})
$('#btn_register_account_submit').on('click', function () {

  if ($("#txt_register_username").val() && $("#txt_register_password").val() && $("#txt_register_email").val() && $("#txt_register_phone").val() && $("#txt_register_full_name").val()) {
    $.ajax({
      type: "POST",
      url: "src/database/burger_shop/func/admin/add_admin_account.php",
      data: {
        username: $("#txt_register_username").val(),
        password: $("#txt_register_password").val(),
        email: $("#txt_register_email").val(),
        phone: $("#txt_register_phone").val(),
        name: $("#txt_register_full_name").val()
      },
      success: function (data) {
        $('#md_add_account').modal('hide')
        show_msg('Register Success', 'Admin account registered successfully!<br><br>Username : <b class="ps-1">' + $("#txt_register_username").val() + '</b><br>Password : <b class="ps-1">' + $("#txt_register_password").val() + '</b>')

      }
    });
  }
  else {
    show_msg('Register Fail', 'Please enter required fields')

  }

})

$('#login_form').on('submit', function (e) {
  e.preventDefault();

  token = generate_token(10)
  $.ajax({
    type: "POST",
    url: "src/database/burger_shop/func/login.php",
    data: {
      username: $("#txt_username").val(),
      password: $("#txt_password").val(),
      token: token,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.result == 0) {
        $('#md_login').modal('hide')
        $("#msg_title").text("Login Failed");
        $("#msg_body").text("Invalid username/password");
        $("#msg_box_close").attr("data-bs-toggle", "modal");
        $("#msg_box_close").removeAttr("data-bs-dismiss");
        $("#msg_box_close").attr("data-bs-target", "#md_login");
        $("#md_msg_box").modal("show");
      }
      else {

        if (data.access_level == "admin") {
          show_msg("Login Success", "Login Successful, Page authenticating please wait..")
          setTimeout(() => {
            location.reload();
          }, 1500);

        }
        else {
          show_msg("Verify Email", `
          <small>Please confirm that you are trying to log-in.</small> 
          <input class='form-control' id="txt_verification_code"><br>
          <div class='text-center'>
          <button id="btn_verify_email" class="btn btn-secondary btn-sm">Verify</button><br>
          </div>
          `);

          body = `
          <p>Hi! `+ data.name + `<br>
          Your OTP is: <b>`+ data.code + `</b><br>
          Use this code for logging in your account.</p>`

          $.post("email_sender.php", {
            customer_email: data.email,
            email_subject: 'Email Verification Otaku Burger Shop',
            email_body: body
          }).done(function () {
            console.log("email sent")
          })

          $('#btn_verify_email').on('click', function () {
            $.getJSON("verify_email.php?code=" + $('#txt_verification_code').val() + "&token=" + token, function (data) {
              console.log(data)
              if (data.result == 1) {
                show_msg("Login Success", "Login Successful, Page authenticating please wait..")
                setTimeout(() => {
                  location.reload();
                }, 1500);

              }
              else {
                show_msg("Invalid Code", "You have entered an invalid code!")
              }
            })
          })
        }



      }

    }
  });
})