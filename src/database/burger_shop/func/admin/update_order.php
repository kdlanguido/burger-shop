<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id = $_POST['id'];
$status = $_POST['status'];

$q = '

        UPDATE
            tbl_orders
        SET
            status="'.$status.'"
        WHERE
            ref_no="'.$id.'"';


$db = new Database();
$result = $db->update($q);

echo json_encode($result);


?>