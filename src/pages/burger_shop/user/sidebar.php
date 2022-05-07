<div class="offcanvas offcanvas-start burger_machine_sidebar" tabindex="-1" id="burger_machine_sidebar" aria-labelledby="burger_machine_sidebarLabel">
    <div class="offcanvas-header">

        <img src="<?php echo $_SESSION['logo_path'] ?>" class="burger_machine_nav_logo" style="width:150px; height:110px;" />

        <button class="navbar-toggler collapsed auto" type="button" id="user_sidebar_close">
            <i class="fa-solid fa-xmark icon_btn text-white" data-bs-toggle="offcanvas" href="#burger_machine_sidebar" role="button"></i>
        </button>

    </div>
    <div class="offcanvas-body burger_machine_sidebar px-0">


        <ul class="list-group list-group-flush ps-3">
            <li class="list-group-item fs-6 align-center border-0" id="btn_sidebar_user_home"><i class="fa-solid fa-fw fa-house pe-3"></i> Home</a></li>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo ' <li class="list-group-item fs-6 align-center border-0 " id="clone_btn_navbar_contactUs"> <a style="text-decoration:none" class="text-white">Contact Us</a></li>';
                echo ' <li class="list-group-item fs-6 align-center border-0 "> <a style="text-decoration:none" class="text-white view_account" data-bs-toggle="modal" data-bs-target="#myAccModal" attr-id="' . $_SESSION['user_id'] . '"> My Account</a></li>';
                echo ' <li class="list-group-item fs-6 align-center border-0 " id="clone_btn_navbar_myorders"> <a style="text-decoration:none" class="text-white view_my_orders" attr-id="' . $_SESSION['user_id'] . '"> My Orders</a></li>';
                echo ' <li class="list-group-item fs-6 align-center border-0 "> <a style="text-decoration:none" class="text-white view_cart"  attr-id="' . $_SESSION['user_id'] . '"> <i class="fa-solid fa-cart-shopping"></i><sup class="bg-danger rounded-circle " style="font-size:8pt; margin-left:-7px; padding:5px; padding-top:2px; padding-bottom:2px;" id="order_count_sm">0</sup> Cart</a></li>';
            }
            ?>


        </ul>

        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<form action="src/database/burger_shop/func/logout.php" method="post"><button type="submit" class="btn burger_machine_sidebar_btn">Logout</button></form>';
        } else {
            echo '<button class="btn burger_machine_sidebar_btn shadow" data-bs-toggle="modal" data-bs-target="#md_login">Login</button>';
        }
        ?>





    </div>


</div>