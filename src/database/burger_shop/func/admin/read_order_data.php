<?php
//DATABASE FUNCTIONS
include '../../db.php';
$id = $_GET['id'];
$db = new Database();

$q = '
        SELECT 
                name,
                qty,
                price,
                ref_no
        FROM
                tbl_orders a
        INNER JOIN
                tbl_products b
        ON
            a.product_id = b.id
        WHERE
            ref_no ="'.$id.'";
';


$result = $db->read($q);


$q = '
        SELECT 
                (select sum(b.price) * qty) as "subtotal"
        FROM
                tbl_orders a
        INNER JOIN
                tbl_products b
        ON
            a.product_id = b.id
        WHERE
            ref_no ="'.$id.'";
';

$subtotal = $db->read($q);





$q = '
        SELECT 
                payment_method,
                payment_details,
                payment,
                payment_date,
                gcash_payment_proof,
                delivery_fee,
                delivery_address,
                note_to_rider

        FROM
                tbl_payments
        WHERE
                order_ref_no ="'.$id.'";
';

$payment = $db->read($q);



$q = '
        SELECT 
                name,
                phone

        FROM
                tbl_users a
        INNER JOIN
                tbl_orders b
        ON      
                b.user_id = a.id
        WHERE
                ref_no ="'.$id.'";
';

$customer = $db->read($q);



echo json_encode([
        "data"=>$result,
        "subtotal"=>$subtotal,
        "payment"=>$payment,
        "customer"=>$customer

]);
