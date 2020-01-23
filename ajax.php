<?php

require 'db.php';
$db = new DB();
$id=$_POST['id'];
$error = array();

if (isset($_POST['name'])) {
    if (empty($_POST['name'])) {
        $error['name'] = "Name field should not be empty";
    } else {

        preg_match_all('([0-9\%\@\#\&\*\$\+\-\=\.\`\~\,\;\^\(\)\[\]\{\}\?\<\>])', $_POST['name'], $matches);

        if (!empty($matches[0]))
        {
            $error['name'] = "Name field should not contain any digit(0-9) or special charcter";
        }

    }
}


if (isset($_POST['email'])) {
    if (empty($_POST['email'])) {
        $error['email'] = "Email field should not be empty";
    } else {
        $matches = array();
        preg_match_all('(^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$)', $_POST['email'], $matches);
        if (empty($matches[0])) {
            $error['email'] = "Please enter valid email address (abc@gmail.com)";

        }
    }
}

if (isset($_POST['contact'])) {
    if (empty($_POST['contact'])) {
        $error['contact'] = "Contact field should not be empty";
    } else {
        preg_match_all('(^[6789]\d{9}$)', $_POST['contact'], $matches);
        if (empty($matches[0])) {
            $error['contact'] = "Please Enter valid contact Number ";

        }
    }

}

//if(isset($_POST['contact'])) {
//    $num = $_POST['contact'];
//    if ((strlen($num) != 10)) {
//
//        $error['contact'] = "Please enter only number & number should be 10 digit";
//
//    } elseif ($num[0] != 9 && $num[0] != 8 && $num[0] != 7 && $num[0] != 6) {
//        $error['contact'] = "Please enter only number & number Should start with 9 8 7 6";
//    }
//}


if (isset($_POST['address'])) {
    if (empty($_POST['address'])) {
        $error['address'] = "Address field should not be empty";
    } else {
        preg_match_all('(^(\w*\s*[\-\,\/\.\(\)\&]*)+)', $_POST['address'], $matches);
        if (empty($matches[0])) {
            $error['address'] = "Please Enter valid address ";

        }
    }

}



if ($_POST && empty($error))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $db->update('information', $_POST, " id='$id'");
}
if(!empty($error)){
    header('HTTP', true, 400);
    echo json_encode($error);
}

