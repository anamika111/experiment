<?php
$con=mysqli_connect("localhost","admin","password","detail");

if ($con){

    $q=mysqli_query($con,"select * from information");

    if($q)
    {
       echo "<table border=1px>";
       echo"<tr><th>Name</th>";
        echo"<th>Email</th>";
        echo"<th>Contact</th>";
        echo"<th>Address</th>";
        echo"<th>Edit Action</th>";
        echo"<th> Delete Action</th>";

        while($arr=mysqli_fetch_array($q))
        {
            $id=$arr['id'];
            echo "<tr>
            <td>" .$arr['name']."</td>
              <td>" .$arr['email']."</td>
                <td>" .$arr['contact']."</td>
                  <td>" .$arr['address']."</td>
                  <td><a href='edit.php?id=$id'>edit</a></td>
                  <td><a href='delete.php?id=$id'>Delete</a></td></tr>";
              

                  }


    }

}
?>