<?php
session_start();

//DATABASE FUNCTIONS
include 'src/database/burger_shop/db.php';
$db = new Database();

if(!empty($_GET)){

    $q = '
    
            SELECT 
                    *
            FROM
                tbl_otp a
            LEFT JOIN
                tbl_users b
            ON
                a.user_id = b.id
            WHERE
                token ="'.$_GET['token'].'" 
            AND
                otp = "'.$_GET['code'].'"
            
    ';
    
    
    $result = $db->read($q);
    
    if(count($result)>0){
        $_SESSION['access_level'] = $result[0]['access_level'];
        $_SESSION['user_id'] = $result[0]['user_id'];
        $_SESSION['username'] = $result[0]['name'];
        $_SESSION['address'] = $result[0]['address_no'].' '.$result[0]['address_st'].' '.$result[0]['address_brgy'].' '.$result[0]['address_city'];
        echo json_encode([
            'result'=>1
        ]);
    }
    else{
        echo json_encode([
            'result'=>0
        ]);
    }


}
