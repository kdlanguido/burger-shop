<?php
//DATABASE FUNCTIONS
include '../../db.php';

$ref_no = $_GET['id'];
if(isset($ref_no))
{
        $_SESSION['cart_id'] = $ref_no ;
}

$q = '
        SELECT 
                b.id,
                a.name, 
                qty, 
                a.price, 
                picture, 
                qty*a.price as subtotal,
                (
                        SELECT
                                count(product_id)
                        FROM 
                                tbl_orders
                        WHERE 
                                ref_no = "'.$ref_no .'"
                        AND 
                                b.status = "cart" 
                ) as order_count,
                (
                        SELECT
                                sum(qty*a.price) 
                        FROM
                                tbl_products a
                        INNER JOIN
                                tbl_orders b
                        ON
                                a.id = b.product_id
                        WHERE 
                                ref_no = "'.$ref_no .'"
                        AND 
                                b.status = "cart" 
                      
                ) as subtotal_all
               

                
        FROM
                tbl_products a
        INNER JOIN
                tbl_orders b
        ON
                a.id = b.product_id
        INNER JOIN
                tbl_users c 
        ON
                c.id = b.user_id
        
        WHERE 
                ref_no = "'.$ref_no .'"
        AND
                b.status = "cart" 
';

$db = new Database();
$result = $db->read($q);

echo json_encode($result);


?>