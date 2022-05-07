<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id= $_GET['id'];
$q = '

        SELECT 
                *
        FROM
                tbl_users
        WHERE 
                id ='.$id.';
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>