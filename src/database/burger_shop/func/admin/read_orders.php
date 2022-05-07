<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '
        SELECT 
                distinct(ref_no),
                name,
                phone,
                concat(address_no," ",address_st," ",address_brgy," ",address_city) as `address`,
                status
        FROM
                tbl_orders a
        INNER JOIN
                tbl_users b
        ON
            a.user_id = b.id
        WHERE
                status = "Pending" OR status = "Out for Delivery"
        ORDER BY
                a.id DESC;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>