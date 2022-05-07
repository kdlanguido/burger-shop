<?php
session_start();

//DATABASE FUNCTIONS
include '../../db.php';



$id = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$full_name = $_POST['full_name'];

$_SESSION['username'] = $_POST['full_name'];

$q = '

        UPDATE
            tbl_users
        SET
            username="'.$username.'",
            password="'.$password.'",
            email="'.$email.'",
            phone="'.$phone.'",
            name="'.$full_name.'"
        WHERE
            id= '.$id;


$db = new Database();
$result = $db->update($q);


echo $_POST['full_name'];


?>