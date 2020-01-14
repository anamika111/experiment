<?php

//1
$id=$_GET['id'];

//2
require 'config.php';


//3 delete the particular record from id
if($con)
{

    $q=mysqli_query($con,"delete from information where id='$id' ");
    if($q)
    {
        echo header("location:listing.php");
    }
    else
    {
        echo mysqli_error($con);
    }
}


?>
