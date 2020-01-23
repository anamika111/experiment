<?php

require 'db.php';
$db = new DB();

$id = trim(filter_input(INPUT_GET, 'id'));
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
        <form method="post" id="edit-form" class="col-md-6 bg-white">
            <input type="hidden" name="id" id="id" value="<?= $id ?>"/>
            <div class="container">
                <h1>Contact Form</h1>

                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input class="form-control" type="text" id="name" placeholder="Enter name" name="name"
                           value="<?php echo $res['name'] ?>">


                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input class="form-control" type="text" id="email" placeholder="Enter Email" name="email"
                               value="<?php echo $res['email'] ?>">
                    </div>


                    <div class="form-group">
                        <label for="contact"><b>Contact</b></label>
                        <input class="form-control" type="text" id="contact" placeholder="Enter Contact Number"
                               name="contact"
                               value="<?php echo $res['contact'] ?>">
                    </div>


                    <div class="form-group">
                        <label for="address"><b>Address</b></label>
                        <input class="form-control" type="text" id="address" placeholder="Enter address" name="address"
                               value="<?php echo $res['address'] ?>">
                    </div>
                    <hr>


                    <button type="submit" class="registerbtn">Submit</button>
                </div>


        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


</body>
</html>


<!--Dob-([0-9]{2})\/([0-9]{2})\/([0-9]{4})-->
<!--mobile no-^[6789]\d{9}$-->