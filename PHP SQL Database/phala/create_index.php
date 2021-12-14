<?php

session_start();
//connection
$hostname="localhost";
$username="root";
$password="";
$database="phala";

$connection = mysqli_connect($hostname,$username,$password);

if($connection){
    echo("<script>alert('you connected to the server successsfuly')</script>");
    $connection = mysqli_connect($hostname,$username,$password,$database);
    if($connection){
        echo("<script>alert('you connected to the database')</script>");
    }
    else{
        echo("<script>alert('failed to connect to the database')</script>");
    }
}
else{
    echo("<script>alert('failed to connect to the server')</script>");
}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form method="post">
        <table>
            <tr>
                <td>Represantative's Name</td><td><input type="text" name="represent" value=""required></td>
                <td>Book table for :</td><td><input type="number" name="tablefor" value=""required></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_submit" value="Book"></td>
            </tr>
        </table>
    </form>
    </table>

    <?php


      if(isset($_POST['btn_submit']))
      {

        $represent=$_POST["represent"];
        $tablefor=$_POST["tablefor"];

          $sql = "INSERT INTO phalatable2 (represent, tablefor) VALUES ('$represent', '$tablefor')";

              if ($connection->query($sql) === TRUE) {
                echo " Booking successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
              }
              $connection->close();

              }
       ?>

       <?php
         echo "<br>";
        echo "<a href=main.php>check booking list </a>";
        echo "<br>";
        echo "<a href=logout.php>LOGOUT NOW</a>";
        ?>


  </body>
</html>
