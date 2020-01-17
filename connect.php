<?php
require 'db.php';
$db=new DB();

echo '<pre>';
print_r($_POST);
echo '</pre>';
exit();
  $is_inserted=  $db->insert('information',$_POST);


  if($is_inserted){
//      header("location: experiment.local/listing.php");
      echo "New records created successfully";
  }else
      {
      echo "New records could not insert";
  }

?>
