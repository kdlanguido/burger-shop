<?php
//DATABASE FUNCTIONS
include '../../db.php';


$q = '

SELECT 
DISTINCT (a.order_ref_no),
               (
                   SELECT 
                       count(distinct(order_ref_no))
                   FROM 
                       tbl_payments a
                   INNER JOIN
                       tbl_orders z
                   ON      
                       z.ref_no = a.order_ref_no
                   WHERE
                       z.status = "Pending"
                                      
               ) as notif_count
              
       FROM
               tbl_payments a
      
       INNER JOIN
               tbl_orders b
       ON      
               b.ref_no = a.order_ref_no
       INNER JOIN
               tbl_users c
       ON      
               b.user_id = c.id
       WHERE
               b.status = "Pending"
        ;
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>