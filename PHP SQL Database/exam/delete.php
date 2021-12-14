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

$sql="DELETE FROM examtable2 WHERE id='$id'";
 $results=mysqli_query($connection,$sql);
 if($results==true)
 {

    header("location:main.php");
}
 ?>
