<?php

session_start();
//connection
$hostname="localhost";
$username="root";
$password="";
$database="exam_b_db.sql";

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
                <td>Word</td><td><input type="text" name="word" value=""required></td>
                <td>Definition</td><td><input type="text" name="definition" value=""required></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_submit" value="Add"></td>
            </tr>
        </table>
    </form>
    </table>

    <?php


      if(isset($_POST['btn_submit']))
      {

        $word=$_POST["word"];
        $definition=$_POST["definition"];

          $sql = "INSERT INTO examtable2 (word, definition) VALUES ('$word', '$definition')";

              if ($connection->query($sql) === TRUE) {
                echo " Added successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
              }
              $connection->close();

              }
       ?>

       <?php
         echo "<br>";
        echo "<a href=main.php>check list </a>";
        echo "<br>";
        echo "<a href=logout.php>LOGOUT NOW</a>";
        ?>


  </body>
</html>
