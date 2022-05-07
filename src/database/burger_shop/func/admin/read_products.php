<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '
        SELECT 
        id,
                name,
                category,
                picture,
                price
        FROM
                tbl_products
        ORDER BY
                id
        DESC;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);
