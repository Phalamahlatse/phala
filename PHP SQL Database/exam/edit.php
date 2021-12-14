<?php
session_start();
$hostname="localhost";
$username="root";
$password="";
$database="exam_b_db.sql";

$connection = mysqli_connect($hostname,$username,$password,$database);

if(!$connection)
{
  echo "Not connected";
}
$id=$_GET['id'];
 if (isset($_POST['update'])) {
   $word=$_POST['word'];

   $edit="UPDATE examtable2 SET word='$word' WHERE id='$id'";
   $results2=mysqli_query($connection,$edit);

   if($results2)
   {
     header("location:main.php");
   }
   else {
     echo "not updated";
   }
 }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="" method="post">
       Word:<input type="text" name="word" value=""><br><br>
       <input type="submit" name="update" value="Update">

     </form>
   </body>
 </html>
