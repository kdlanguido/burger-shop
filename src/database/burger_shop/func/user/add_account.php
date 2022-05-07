<?php
//DATABASE FUNCTIONS
include '../../db.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fullname = $_POST['fullname'];
$address_st = $_POST['address_st'];
$address_no = $_POST['address_no'];
$address_city = $_POST['address_city'];
$address_brgy = $_POST['address_brgy'];

$q = '

        INSERT INTO
          tbl_users(
            username,
            password,
            email,
            phone,
            name,
            address_st,
            address_no,
            address_city,
            address_brgy,
            access_level
            )
        VALUES  
          (
            "'.$username.'",
            "'.$password.'",
            "'.$email.'",
            "'.$phone.'",
            "'.$fullname.'",
            "'.$address_st.'",
            "'.$address_no.'",
            "'.$address_city.'",
            "'.$address_brgy.'",
            "user")    
          ';


$db = new Database();
$result = $db->update($q);

if(!empty($result)){
  echo '1';
}
else{
  echo '0';
}

?>