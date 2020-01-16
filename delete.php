<?php

require 'db.php';
$db = new DB();

$id=$_GET['id'];

$sql = "DELETE FROM information WHERE id=$id";



?>
