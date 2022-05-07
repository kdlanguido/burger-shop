<div class="burger_machine_nav fixed-top ">

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand text-white" href="#"><img src="src/resources/img/otakuNav.png" width="50" height="40"><small>Otaku Burger House</small></a>

      <button class=" navbar-toggler collapsed auto" type="button">
        <i class="fa-solid fa-bars icon_btn ps-3 pb-1 text-white" data-bs-toggle="offcanvas" href="#burger_machine_sidebar" role="button"></i>
      </button>

      <div class="collapse navbar-collapse">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link text-white" id="btn_navbar_home">Home</a></li>
          <?php
          if ( isset($_SESSION['user_id']) ) {
            
            echo ' <li class="nav-item"><a class="nav-link text-white" id="btn_navbar_contactUs">Contact Us</a></li>';
            echo ' <li class="nav-item"> <a class="nav-link text-white view_account" data-bs-toggle="modal" data-bs-target="#myAccModal" attr-id="'.$_SESSION['user_id'].'"> My Account</a></li>';
            echo ' <li class="nav-item"> <a class="nav-link text-white view_my_orders" id="view_my_orders" attr-id="'.$_SESSION['user_id'].'"> My Orders</a></li>';
            echo ' <li class="nav-item"> <a class="nav-link text-white view_cart"  attr-id="'.$_SESSION['user_id'].'"> <i class="fa-solid fa-cart-shopping"></i><sup class="bg-danger rounded-circle " style="font-size:8pt; margin-left:-7px; padding:5px; padding-top:2px; padding-bottom:2px;" id="order_count">0</sup> Carts</a></li>';
            echo ' <li class="nav-item"><form action="src/database/burger_shop/func/logout.php" method="post"><button style="font-weight:bold; background:#FFD600; border-radius:20px; width:100px; margin: 6px; border: none;">Logout</button></form></li>';
          
          }
          else{
            echo '<li class="nav-item"><button id="btn_navbar_login" style="font-weight:bold; background:#FFD600; border-radius:20px; width:100px; margin: 6px; border: none;" data-bs-toggle="modal" data-bs-target="#md_login">Login</button></li>';
          }
          ?>

          
          
    

        </ul>
      </div>
    </div>
  </nav>

</div>