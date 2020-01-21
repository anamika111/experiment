<?php

require 'db.php';
$db = new DB();

$error = array();


$id = $_GET['id'];

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
        preg_match_all('(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,3})$)', $_POST['email'], $matches);
        if (empty($matches[0])) {
            $error['email'] = "Please enter valid email address (abc@gmail.com)";

        }
    }
}
//$num[0] != 9 && $num[0] != 8 && $num[0] != 7))
if(isset($_POST['contact'])) {
$num=$_POST['contact'];
if((strlen($num)!=10))
{
    $error['contact'] = "Please enter only number & number should be 10 digit";
}
elseif($num[0]!=9 && $num[0]!=8 && $num[0]!=7 && $num[0]!=6 ){
    $error['contact'] = "Number Should start with 9 8 7 6";
}






}
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
$editquerry = "select * from information where id='$id' ";
$res = $db->select($editquerry);
if (empty($res)) {
    echo "record could not be found";
    exit();
}
$res = $res[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 0 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        .text-error {
            margin-top: 0;
            padding: 0;
            font-size: 12px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg-secondary pt-5">
<div class="container bg-secondary">
    <div class="row justify-content-md-center ">
        <form method="post" class="col-md-6 bg-white">
            <div class="container">
                <h1>Contact Form</h1>

                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input class="form-control" type="text" placeholder="Enter name" name="name"
                           value="<?php echo(empty($error))?$res['name']:$_POST['name'] ?>">
                    <?php
                    if (isset($error['name'])) {
                        ?>
                        <p class="text-error text-danger"><?= $error['name'] ?></p>
                    <?php }


                    ?>
                </div>




                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input class="form-control" type="text" placeholder="Enter Email" name="email"
                           value="<?php echo (empty($error))?$res['email']:$_POST['email'] ?>" >
                    <?php
                    if (isset($error['email'])) {

                        ?>
                        <p class="text-error text-danger"><?= $error['email'] ?></p>
                    <?php } ?>
                </div>



                <div class="form-group">
                    <label for="contact"><b>Contact</b></label>
                    <input class="form-control" type="text" placeholder="Enter Contact Number" name="contact"
                           value="<?php echo(empty($error))? $res['contact']:$_POST['contact'] ?>">
                    <?php
                    if (isset($error['contact'])) {
                        ?>
                        <p class="text-error text-danger"><?= $error['contact'] ?></p>

                    <?php }
                   ?>
                </div>





                <div class="form-group">
                    <label for="address"><b>Address</b></label>
                    <input class="form-control" type="text" placeholder="Enter address" name="address"
                           value="<?php echo (empty($error))?$res['address']:$_POST['address'] ?>">
                    <?php
                    if (isset($error['address'])) {
                        ?>
                        <p class="text-error text-danger"><?= $error['address'] ?></p>
                    <?php } ?>
                </div>
                <hr>


                <button type="submit" class="registerbtn">Submit</button>
            </div>


        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>
