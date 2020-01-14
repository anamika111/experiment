<?php

include 'config.php';
try
{
    $host=DB_HOST;
    $user=DB_USER;
    $pwd=DB_PASSWORD;
    $dbname=DB_DATABASE;
    $conn= new PDO("mysql:dbname={$dbname};host={$host}",$user,$pwd);
//new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
}
catch(PDOException $e)
{
    echo "Error:".$e->getMessage();
}
