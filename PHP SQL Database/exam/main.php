<?php
session_start();
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
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>
<h2>Definition Book</h2>

                      <table border="2">
                      <tr>
                      <td>Sr.No.</td>
                      <td>Word</td>
                      <td>Definition</td>
                      <td>Edit</td>
                      <td>Delete</td>
                      </tr>

<?php
$sql="SELECT * FROM examtable2";
$result= mysqli_query($connection, $sql) ;
if($result->num_rows>0)
{
    #echo '<table border="2"><tr><td>ID</td><td>Word</td><td>Definition</td><td>Delete</td></tr>';

    while($row =$result->fetch_Assoc())
    {
      ?>
      
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['word']; ?></td>
                  <td><?php echo $row['definition']; ?></td>
                  <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                  <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>

    <?php

}
    }

    ?>

  <br>
              <br>
            <a href=add.php>Add new word</a>
              <br>
              <br>
            <a href=logout.php>LOGOUT NOW</a>

</body>
</html>
