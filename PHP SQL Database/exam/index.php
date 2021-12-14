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

///////////////////////////////////////////////////////////////////
//now checking login button was clicked

if (isset($_POST["Login"]))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];
        $title=$_POST["title"];
        $surname=$_POST["surname"];
          $email=stripcslashes($email);
          $password=stripcslashes($password);
          $title=stripcslashes($title);
          $surname=stripcslashes($surname);
            $surname=strtolower($surname);
            $surname=ucfirst($surname);

            echo "Welcome " . $title ." " . $surname . "!";


            //seaching pre defined user
          $sql="SELECT * FROM examtable WHERE email='$email' AND password='$password'";
          $result=mysqli_query($connection,$sql);
          $count=mysqli_num_rows($result);

          //going row by row searching
          if($count==1)
        {
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;

      }
        else {
        echo("<script>alert('Wrong password or Email')</script>");
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
<h1>LOGIN</h1>
    <form class="" action="index.php" method="post">
<?php
if (!(isset($_SESSION['email'])))
{
 ?>


      Email<input type="email"name="email" value="<?php print isset($_POST["email"]) ? $_POST["email"] :""; ?>"required><br><br>
      Password<input type="password" name="password" value="<?php print isset($_POST["password"]) ? $_POST["password"] :""; ?>"required><br><br>
      Surname<input type="text" name="surname" value="<?php print isset($_POST["surname"]) ? $_POST["surname"] :""; ?>"required><br><br>


            Title<select class="" name="title">
              <option value=""></option>
              <option value="Mr.">Mr.</option>
              <option value="Ms.">Ms.</option>
              <option value="Mrs.">Mrs.</option>
            </select><br><br>
            <input type="submit" name="Login" value="Login"><br><br>
<?php
}
else {
               echo "You have logged in";
               echo "<br>";
               echo "<a href=main.php>Mainpage</a>";
                echo "<br>"; echo "<br>";
               echo "<a href=logout.php>Logout</a>";

             }
 ?>
    </form>



  </body>
</html>
