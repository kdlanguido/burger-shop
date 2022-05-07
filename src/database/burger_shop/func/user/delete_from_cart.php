<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id = $_POST['id'];

  $q = '
  DELETE FROM
    tbl_orders
  WHERE
    id = ' . $id;



$db = new Database();
$result = $db->update($q);

if (!empty($result)) {
  echo '1';
} else {
  echo '0';
}
