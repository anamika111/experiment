<?php
require 'config.php';

if ($con){

$q = mysqli_query($con, "select * from information");

if ($q)
{
?>
<html>
<body>
<table border=1px>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Edit Action</th>
        <th> Delete Action</th>

    </tr>

    <?php
    while ($arr = mysqli_fetch_array($q)) {
        $id = $arr['id'];
        ?>
        <tr>
            <td><?= $arr['name'] ?></td>
            <td><?= $arr['email'] ?></td>
            <td><?= $arr['contact'] ?></td>
            <td><?= $arr['address'] ?></td>
            <td><a href='edit.php?id=<?php $id ?>'>edit</a></td>
            <td><a href='delete.php?id=<?php $id ?>'>Delete</a></td>
        </tr>
        <?php

    }
}
    }
    ?>
</table>
        </body>
        </html>
