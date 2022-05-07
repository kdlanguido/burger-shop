<?php
session_start();
$_SESSION['theme'] = 'burger_shop';
$_SESSION['logo_path'] = 'src/resources/img/otakulogo.png';

if (!isset($_SESSION['access_level'])) {
    $_SESSION['access_level'] = 'user';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>

        <?php
            if ($_SESSION['theme'] == 'burger_shop') {
                echo 'Otaku Burger House';
            }
        ?>

    </title>
    <link rel="stylesheet" href="src/resources/lib/bootstrap/bs.css">
    <link rel="stylesheet" href="src/resources/lib/fontawesome/css/all.css">
    <link rel="stylesheet" href="src/resources/lib/carousel/carousel.css">
    <link rel="stylesheet" href="src/resources/styles/main.css">

    <?php
        if ($_SESSION['theme'] == 'burger_shop') {
            echo '<link rel="stylesheet" href="src/resources/styles/burger_shop.css">';
            echo '<link rel="stylesheet" href="src/resources/styles/burger_shop_kd.css">';
        }
    ?>

    <script src="src/resources/lib/bootstrap/bs.js"></script>
    <script src="src/resources/lib/jquery/jquery.js"></script>
    <script src="src/resources/lib/carousel/carousel.js"></script>
    <script src="src/resources/lib/jsPdf/html2pdf.js"></script>
    <script src="src/resources/lib/chartJs/chart.js"></script>

</head>

<body>


    <input type="hidden" id="txt_card_id" value="<?php
                                                    if (isset($_SESSION['cart_id'])) {
                                                        echo $_SESSION['cart_id'];
                                                    }
                                                    ?>">
    <input type="hidden" value="<?php echo $_SESSION['access_level']; ?>" id="txt_user_access">
    <input type="hidden" value="<?php echo $_SESSION['contact_no']; ?>" id="txt_user_mobile">

    <input type="hidden" id="txt_cart_order_count">
    <input type="hidden" id="txt_user_id" value="<?php

                                                    if (isset($_SESSION['user_id'])) {
                                                        echo $_SESSION['user_id'];
                                                    }



                                                    ?>">

    <!-- CONTENTS -->
    <?php


    if ($_SESSION['theme'] == 'burger_shop' && $_SESSION['access_level'] == 'user') {
        //DATABASE FUNCTIONS
        include_once 'src/database/burger_shop/db.php';

        // PAGE FUNCTIONS

        include_once 'src/pages/burger_shop/user/navbar.php';

        include_once 'src/pages/burger_shop/user/home.php';
        include_once 'src/pages/burger_shop/user/viewMenu.php';
        include_once 'src/pages/burger_shop/user/modals.php';
        include_once 'src/pages/burger_shop/user/contactUs.php';
        include_once 'src/pages/burger_shop/user/myPurchase.php';
        include_once 'src/pages/burger_shop/user/transaction.php';
        include_once 'src/pages/burger_shop/user/sidebar.php';

        echo '<script src="src/func/burger_shop/main.js"></script>';
        echo '<script src="src/func/burger_shop/user/home.js"></script>';
        echo '<script src="src/func/burger_shop/user/userPages.js"></script>';
        echo '<script src="src/func/burger_shop/user/viewMenu.js"></script>';
    } else if ($_SESSION['theme'] == 'burger_shop' && $_SESSION['access_level'] == 'admin') {

        // PAGE FUNCTIONS
        include_once 'src/pages/burger_shop/admin/navbar.php';
        include_once 'src/pages/burger_shop/admin/sidebar.php';
        include_once 'src/pages/burger_shop/admin/feedback.php';
        include_once 'src/pages/burger_shop/admin/order.php';
        include_once 'src/pages/burger_shop/admin/order_history.php';
        include_once 'src/pages/burger_shop/admin/inventory.php';
        include_once 'src/pages/burger_shop/admin/dashboard.php';
        include_once 'src/pages/burger_shop/admin/modals.php';
        include_once 'src/pages/burger_shop/admin/product.php';

        echo '<script src="src/func/burger_shop/main.js"></script>';
        echo '<script src="src/func/burger_shop/admin/feedback.js"></script>';
        echo '<script src="src/func/burger_shop/admin/sidebar.js"></script>';
        echo '<script src="src/func/burger_shop/admin/order.js"></script>';
        echo '<script src="src/func/burger_shop/admin/order_history.js"></script>';
        echo '<script src="src/func/burger_shop/admin/dashboard.js"></script>';
        echo '<script src="src/func/burger_shop/admin/product.js"></script>';
    }

    ?>

</body>

</html>