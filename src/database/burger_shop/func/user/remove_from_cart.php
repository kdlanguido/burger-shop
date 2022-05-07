<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id = $_GET['id'];

$new_qty = get_order_qty($id);
$new_qty--;

if($new_qty >= 1){
  $q = '
      UPDATE
        tbl_orders
      SET
        qty = '.$new_qty.'
      WHERE
        id = ' . $id;

}
else{
  $q = '
  DELETE FROM
    tbl_orders
  WHERE
    id = ' . $id;

}


$db = new Database();
$result = $db->update($q);

if (!empty($result)) {
  echo '1';
} else {
  echo '0';
}


function get_order_qty($id)
{
  $q = '
    SELECT
      qty 
    FROM
      tbl_orders
    WHERE
    id = ' . $id;



  $db = new Database();
  $result = $db->read($q);

  return $result[0]['qty'];
}
