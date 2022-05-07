<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '

        SELECT 
                email,feedback,name,phone,a.id
        FROM
                tbl_feedbacks a
        INNER JOIN
                tbl_users b
        ON      
                a.user_id = b.id        ;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>