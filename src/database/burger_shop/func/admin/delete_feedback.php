<?php
//DATABASE FUNCTIONS
include '../../db.php';

$id = $_GET['id'];

$q = '

        DELETE FROM
            tbl_feedbacks
        WHERE
            id= '.$id;


$db = new Database();
$result = $db->update($q);

echo json_encode($result);


?>