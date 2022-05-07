<?php
//DATABASE FUNCTIONS
include '../../db.php';

$feedback = $_POST['feedback'];
$id = $_POST['id'];

$q = '

        INSERT INTO
                    tbl_feedbacks(feedback,user_id)
        VALUES  ("'.$feedback.'","'.$id.'")    
          ';


$db = new Database();
$result = $db->update($q);

if(!empty($result)){
  echo '1';
}
else{
  echo '0';
}

?>