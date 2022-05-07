<?php
session_start();

//DATABASE FUNCTIONS
include '../../db.php';

$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];
$qty = $_POST['qty'];
$new_qty = 0;
$orders = [];

if (!isset($_SESSION['cart_id']) || $_SESSION['cart_id'] == null) {
  $_SESSION['cart_id'] = 'O.R.D.' . generate_ref_no();
  $new_qty = $qty;
  $q = '
    INSERT INTO
                tbl_orders(user_id,product_id,qty,status,ref_no)
    VALUES  ("' . $user_id . '","' . $product_id . '", ' . $new_qty . ', "cart", "' . $_SESSION['cart_id'] . '")    
    ';

} else {
  $cart_orders_count = get_cart_orders_count();
  $existing_order_qty = check_if_order_exists($product_id);

  if ($existing_order_qty != 0) {
    $new_qty = $existing_order_qty + $qty;

    $q = '
        UPDATE 
          tbl_orders
        SET
          qty = ' . $new_qty . '
        WHERE
        product_id = ' . $product_id . ' AND      
        user_id = ' . $user_id . ' AND      
        ref_no = "' . $_SESSION['cart_id'] . '"    
    ';

  } else {
    $new_qty = $qty;
    $q = '
      INSERT INTO
                  tbl_orders(user_id,product_id,qty,status,ref_no)
      VALUES  ("' . $user_id . '","' . $product_id . '", ' . $new_qty . ', "cart", "' . $_SESSION['cart_id'] . '")    
      ';
  }


}


function get_cart_orders_count(){
  $q = '

    SELECT 
        count(product_id) as "order_count"
    FROM
        tbl_orders
    WHERE
        ref_no = "' . $_SESSION['cart_id'] . '"

  ';

  $db = new Database();
  $result = $db->read($q);
  return $result[0]['order_count'];
}


function check_if_order_exists($product_id){
  $q = '

    SELECT 
        qty
    FROM
        tbl_orders
    WHERE
        product_id = ' . $product_id . '
    AND
      ref_no = "' . $_SESSION['cart_id'] . '"

  ';

  $db = new Database();
  $result = $db->read($q);
  if (count($result)>0) {
    return $result[0]['qty'];
  } else {
    return 0;
  }
}


function generate_ref_no(){
  $numbers = range(1000, 9999);
  shuffle($numbers);
  return array_slice($numbers, 0, 1)[0];
}



$db = new Database();
$result = $db->update($q);
echo json_encode([
  "cart_id" => $_SESSION['cart_id'] ,
  "order_count" => get_cart_orders_count(),
]);