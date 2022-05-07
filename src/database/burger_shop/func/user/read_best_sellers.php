<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '

        SELECT 
               
               DISTINCT(b.id),
               name,
                b.price,
                b.picture
        FROM
                tbl_orders a 
        INNER JOIN
                tbl_products b
        ON
                a.product_id = b.id 
        ORDER BY
                qty
        DESC LIMIT 3    
        ;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>