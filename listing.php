<?php
require 'db.php';
$db = new DB();

?>

<html>
<body>
<table border=1px>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Edit Action</th>
        <th> Delete Action</th>

    </tr>
    </thead>
    <tbody>
    <?php


    foreach ($db->select("SELECT * from information") as $row) {
        ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['contact'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><a href='edit.php?id=<?php $id ?>'>edit</a></td>
            <td><a href='delete.php?id=<?php $id ?>'>Delete</a></td>
        </tr>
        <?php
    }

    ?>
    </tbody>

</table>
</body>
</html>
