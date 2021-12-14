<?php
session_start();
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
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>
<h2>Book a Table</h2>


<?php


$sql="SELECT * FROM phalatable2";
$result= mysqli_query($connection, $sql) ;
if($result->num_rows>0)
{
    echo '<table border="2"><tr><td>ID</td><td>Represantative</td><td>Tablbe For:</td></tr>';

    while($row =$result->fetch_Assoc())
    {
        echo '<tr><td>'.$row["id"].'</td><td>'.$row["represent"].'</td><td>'.$row["tablefor"].'</td></tr>';

    }
    echo '</table>';

}


 ?>

        <form method="post">
            <table>
                <tr>
                    <td>Type something</td><td><textarea name="txt_id" cols="15" rows="2" required="required" value="<?php echo $description=isset($_POST['txt_id'])? $_POST['txt_id']:""  ?>"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn_submit" value="SEARCH"></td>
                </tr>
            </table>
        </form>
        </table>

<?php
//logout
  echo "<br>";
  echo "<a href=create_index.php>BOOk NOW</a>";

 ?>


      <?php
          if(isset($_POST['btn_submit']))
          {
              $id=isset($_POST['txt_id'])? $_POST['txt_id'] : "" ;
              $sql="SELECT * FROM phalatable2 WHERE represent LIKE '%".$id."%'  OR  tablefor LIKE'%".$id."%'";
              $result= mysqli_query($connection, $sql) ;
              if($result->num_rows>0)
              {
                  echo '<table border="2"><tr><td>ID</td><td>Represantative</td><td>Tablbe For:</td></tr>';

                  while($row =$result->fetch_Assoc())
                  {
                      echo '<tr><td>'.$row["id"].'</td><td>'.$row["represent"].'</td><td>'.$row["tablefor"].'</td></tr>';

                  }
                  echo '</table>';

              }
          }

          //logout
            echo "<br>";
            echo "<a href=logout.php>LOGOUT NOW</a>";
      ?>





</body>
</html>
