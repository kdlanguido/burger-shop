<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$name = $_POST['name'];
$email = $_POST['email'];
$address_no = $_POST['address_no'];
$address_city = $_POST['address_city'];
$address_st = $_POST['address_st'];
$address_brgy = $_POST['address_brgy'];

$q = '

        UPDATE
            tbl_users
        SET
            username="'.$username.'",
            password="'.$password.'",
            phone="'.$phone.'",
            name="'.$name.'",
            email="'.$email.'",
            address_no="'.$address_no.'",
            address_city="'.$address_city.'",
            address_st="'.$address_st.'",
            address_brgy="'.$address_brgy.'"
        WHERE
            id= '.$id;


$db = new Database();
$result = $db->update($q);

echo json_encode($result);


?>