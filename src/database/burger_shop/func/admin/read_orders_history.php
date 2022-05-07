<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '
        SELECT 
                distinct(ref_no),
                name,
                phone,
                status
        FROM
                tbl_orders a
        INNER JOIN
                tbl_users b
        ON
            a.user_id = b.id
        WHERE
                a.status = "Cancelled" OR a.status = "Completed"
        ORDER BY
                a.id DESC;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>