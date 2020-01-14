<?php
$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$address=$_POST['address'];


require 'config.php';

if($con === false){
   // die("ERROR: Could not connect. " . mysqli_connect_error());
}

$q="INSERT INTO information (name, email,contact,address) VALUES ('$name', '$email', '$contact','$address')";


if(mysqli_query($con, $q)){
    echo "Records inserted successfully.";
}
else
{
   // echo "ERROR: Could not able to execute $q. " . mysqli_error($con);
}
mysqli_close($con);


?>
