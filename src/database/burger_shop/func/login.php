<?php
session_start();

//DATABASE FUNCTIONS
include '../db.php';
$db = new Database();


if (!empty($_POST)) {


    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $_POST['token'];

    $q = '
    
            SELECT 
                    *
            FROM
                tbl_users 
         
            WHERE
                username ="' . $username . '" 
            AND
                password = "' . $password . '";
    ';


    $result = $db->read($q);

    if (count($result) > 0) {
        // $_SESSION['access_level'] = $result[0]['access_level'];
        // $_SESSION['user_id'] = $result[0]['id'];
        // $_SESSION['username'] = $result[0]['name'];
        // $_SESSION['address'] = $result[0]['address'];

        $code = random_int(100000, 999999);

        $q = '
                INSERT INTO 
                            tbl_otp(user_id,otp,token)
                VALUES
                            (' . $result[0]['id'] . ',' . $code . ',"' . $token . '")
        ';

        $x = $db->update($q);

        if ($result[0]['access_level'] == "admin") {
            $_SESSION['access_level'] = $result[0]['access_level'];
            $_SESSION['user_id'] = $result[0]['id'];
            $_SESSION['username'] = $result[0]['name'];
            $_SESSION['address'] = $result[0]['address_no'] . ' ' . $result[0]['address_st'] . ' ' . $result[0]['address_brgy'] . ' ' . $result[0]['address_city'];
        }

        echo json_encode([
            'result' => 1,
            'code' => $code,
            'email' => $result[0]['email'],
            'name' => $result[0]['name'],
            'id' => $result[0]['id'],
            'access_level' => $result[0]['access_level'],
        ]);
    } else {

        echo json_encode([
            'result' => 0
        ]);
    }
}
