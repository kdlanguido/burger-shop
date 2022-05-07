<?php
//DATABASE FUNCTIONS
include '../../db.php';


$db = new Database();

$date = $_GET['date'];
if ($date == 'all') {


        $data = [];
        $year = explode('-', $date);

        $q = '

        SELECT 
                count(id) as "total_user"
        FROM
                tbl_users
        WHERE
                access_level = "user"
       
';

        $total_users = $db->read($q);

        $q = '

        SELECT 
                count(distinct(ref_no)) as "total_completed"
        FROM
                tbl_orders
        WHERE
                status = "Completed";
';

        $total_completed = $db->read($q);

        $q = '

        SELECT 
                count(distinct(ref_no)) as "total_order"
        FROM
                tbl_orders;
';

        $total_order = $db->read($q);

        $q = '

        SELECT 
                sum(price * b.qty) as "annual_sale"
        FROM
                tbl_products a
        INNER JOIN
                tbl_orders b
        ON
                a.id = b.product_id
        WHERE 
                b.status = "Completed"
        ;
';

        $annual_sale = $db->read($q);

        $q = '
        SELECT 
                a.name as "top_seller",
                sum(qty) as "top_seller_count"
        FROM
                tbl_products a
        INNER JOIN
                tbl_orders b
        ON
                a.id = b.product_id
        WHERE 
                b.status = "Completed"
       

        GROUP BY 
                a.name
        ORDER BY 
                top_seller_count 
        DESC
        LIMIT 5
        ;
';

        $top_selling["top_sellers"] = $db->read($q);


        $q = '
        SELECT 
                name, 
                (select sum(qty)) as qty 
        FROM
                tbl_orders a 
        LEFT JOIN 
                tbl_products b 
        ON 
                a.product_id = b.id
        WHERE
                a.status = "Completed"
        GROUP BY 
                a.product_id
;
';
        $chart_data['chart_data'] = $db->read($q);


        array_push($data, $total_order[0], $total_completed[0], $total_users[0], $annual_sale[0], $top_selling, $chart_data);

        echo json_encode($data);
} else {

        $data = [];
        $year = explode('-', $date);

        $q = '
        
                SELECT 
                        count(id) as "total_user"
                FROM
                        tbl_users
                WHERE 
                        register_date ="' . $date . '";
        ';

        $total_users = $db->read($q);

        $q = '
        
                SELECT 
                        count(distinct(ref_no)) as "total_completed"
                FROM
                        tbl_orders
                WHERE 
                        order_date ="' . $date . '"
                AND
                        status = "Completed";
        ';

        $total_completed = $db->read($q);

        $q = '
        
                SELECT 
                        count(distinct(ref_no)) as "total_order"
                FROM
                        tbl_orders
                WHERE 
                        order_date ="' . $date . '"
                ;
        ';

        $total_order = $db->read($q);

        $q = '
        
                SELECT 
                        sum(price * b.qty) as "annual_sale"
                FROM
                        tbl_products a
                INNER JOIN
                        tbl_orders b
                ON
                        a.id = b.product_id
                WHERE 
                        b.status = "Completed"
                AND
                        year(order_date) = ' . $year[0] . '
                ;
        ';

        $annual_sale = $db->read($q);

        $q = '
                SELECT 
                        a.name as "top_seller",
                        sum(qty) as "top_seller_count"
                FROM
                        tbl_products a
                INNER JOIN
                        tbl_orders b
                ON
                        a.id = b.product_id
                WHERE 
                        b.status = "Completed"
                AND
                        order_date = "' . $date . '"
        
                GROUP BY 
                        a.name
                ORDER BY 
                        top_seller_count 
                DESC
                LIMIT 5
                ;
        ';

        $top_selling["top_sellers"] = $db->read($q);


        $q = '
                SELECT 
                        name, 
                        (select sum(qty)) as qty 
                FROM
                        tbl_orders a 
                LEFT JOIN 
                        tbl_products b 
                ON 
                        a.product_id = b.id
                WHERE
                        a.status = "Completed"
                AND
                        a.order_date = "'.$date.'"
                GROUP BY 
                        a.product_id
        ;
        ';
        $chart_data['chart_data'] = $db->read($q);


        array_push($data, $total_order[0], $total_completed[0], $total_users[0], $annual_sale[0], $top_selling, $chart_data);

        echo json_encode($data);
}
