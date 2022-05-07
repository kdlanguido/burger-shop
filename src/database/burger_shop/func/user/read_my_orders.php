<?php
//DATABASE FUNCTIONS
include '../../db.php';

$user_id = $_GET['id'];

$q = '

        SELECT 
                a.ref_no,
                payment,
                payment_method,
                delivery_fee,
                qty,
                name,
                a.status
        FROM
                tbl_orders a
        INNER JOIN
                tbl_payments b
        ON
                a.ref_no = b.order_ref_no
        INNER JOIN
                tbl_products c
        ON
                c.id = a.product_id
        WHERE
                a.user_id ="'.$user_id.'" AND a.status != "cart"
        ORDER BY
                a.id DESC
     ;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>