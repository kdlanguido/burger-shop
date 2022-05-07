<?php
session_start();
//DATABASE FUNCTIONS
include '../../db.php';

$dir = '../../../../uploaded/payments/' . basename($_FILES["gcash_payment_proof"]["name"]);
$gcash_payment_proof = 'src/uploaded/payments/' . basename($_FILES["gcash_payment_proof"]["name"]);

$order_ref_no = $_POST['order_ref_no'];
$payment_method = $_POST['payment_method'][0];
$note_to_rider = $_POST['note_to_rider'];
$delivery_address = $_POST['delivery_address'];
$payment = $_POST['payment'];
$delivery_fee = $_POST['delivery_fee'];
$payment_details = $_POST['payment_details'];

if($payment_method == 'CASH')
{
    $q = '
        INSERT INTO
                    tbl_payments(
                        order_ref_no,
                        payment_method,
                        payment,
                        note_to_rider,
                        delivery_address,
                        delivery_fee
                    )
        VALUES  
                    (
                        "'.$order_ref_no.'",
                        "'.$payment_method.'",
                        "'.$payment.'",
                        "'.$note_to_rider.'",
                        "'.$delivery_address.'",
                        "'.$delivery_fee.'"
                    )    
      ';
}
else{
    $q = '
        INSERT INTO
                    tbl_payments(
                        order_ref_no,
                        payment_method,
                        payment,
                        payment_details,
                        gcash_payment_proof,
                        note_to_rider,
                        delivery_address,
                        delivery_fee
                    )
        VALUES  
                    (
                        "'.$order_ref_no.'",
                        "'.$payment_method.'",
                        "'.$payment.'",
                        "'.$payment_details.'",
                        "'.$gcash_payment_proof.'",
                        "'.$note_to_rider.'",
                        "'.$delivery_address.'",
                        "'.$delivery_fee.'"
                    )    
      ';
}



$db = new Database();
$result = $db->update($q);

move_uploaded_file($_FILES["gcash_payment_proof"]["tmp_name"], $dir);


$q = '
        UPDATE
            tbl_orders
        SET
            status = "Pending"
        WHERE
            ref_no = "'.$order_ref_no.'"
';


$db = new Database();
$result = $db->update($q);


unset($_SESSION['cart_id']);
echo '1';


// 
