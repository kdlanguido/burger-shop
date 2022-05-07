<?php
//DATABASE FUNCTIONS
include '../../db.php';

$dir = '../../../../uploaded/' . basename($_FILES["picture"]["name"]);
$pic = 'src/uploaded/' . basename($_FILES["picture"]["name"]);

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
if($_POST['other_category']){
    $category = $_POST['other_category'];
}
$price = $_POST['price'];
$picture = $dir;

$q = '
        UPDATE
            tbl_products
        SET  
            name = "'.$name.'",
            picture ="'.$pic.'",
            price = "'.$price.'",
            category = "'.$category.'" 
        WHERE
            id ='.$id;


$db = new Database();
$result = $db->update($q);

move_uploaded_file($_FILES["picture"]["tmp_name"], $dir);
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>