<?php
//DATABASE FUNCTIONS
include '../../db.php';

if(isset($_GET['category']) && $_GET['category'] != 'all'){
        $q = '

        SELECT 
                *
        FROM
                tbl_products
        WHERE
                category = "'.$_GET['category'].'";
';
}
else{
        $q = '

        SELECT 
                *
        FROM
                tbl_products;
';
}
// var_dump($q);
$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>