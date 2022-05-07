<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id = $_POST['id'];

$q = '

        DELETE FROM
            tbl_products
        WHERE
            id= '.$id;


$db = new Database();
$result = $db->update($q);

echo json_encode($result);


?>