<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '

        SELECT 
                *
        FROM
                tbl_locations;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>