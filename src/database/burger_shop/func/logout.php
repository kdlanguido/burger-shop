<?php

session_start();

$_SESSION['access_level'] = 'user';
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['cart_id']);


header('location: ../../../../index.php');



?>