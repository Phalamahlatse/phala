<?php

    require("conn.php");

    session_start();
    $_SESSION['firstName'] = "";

    $firstName = "";$firstNameError = "";
    $lastName = "";$lastNameError = "";
    $idNumber = "";$idNumberError = "";


    #5 crude database functionalities  ....... INSERTING DATA , RETRIEVING(SELECT) , DELETING DATA , UPDATE DATA , SEARCHING(SELECT)

    #before we can validate our form we have to know if the user have submitted the form
    if(isset($_POST['submitBtn'])){
        #echo("<script>alert('it means that the user have submitted the form')</script>");
        if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['idNumber'])){
           #if any of these inputs field have an empty space we now check which one have the empty space
           #check if the first name is the one that is empty
           if(empty($_POST['firstName'])){
                $firstNameError = " you cannot leave the first name input field empty";
           }
           else{
                $firstName = $_POST['firstName'];
           }
           #check if the lastName is the one that is empty
           if(empty($_POST['lastName'])){
                $lastNameError = " you cannot leave the last name input field empty";
           }
           else{
               $lastName = $_POST['lastName'];
           }
           #check if the identity number is the one that is empty
           if(empty($_POST['idNumber'])){
                $idNumberError = " you cannot leave the id number input field empty";
           }
           else{
               $idNumber = $_POST['idNumber'];
           }
        }
        else{
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $idNumber = $_POST['idNumber'];

            $_SESSION['firstName'] = $firstName;
            #it means all the input fields are not empty
            #now check if the id that the user is providing is not taken
            $sql = "SELECT idNumber FROM studyingTable WHERE idNumber = '$idNumber' ;";
            $results = mysqli_query($connection,$sql);
            if(mysqli_num_rows($results)==1){
                //echo("<script>alert('the id number you are trying to use is taken')</script>");
                $idNumberError = " the id number you are trying to use is already taken ";
            }
            else{
                $insertSql = "INSERT INTO studyingTable VALUES('$firstName','$lastName','$idNumber');";
                if(mysqli_query($connection,$insertSql)){
                    echo("<script>alert('You were registered successfuly')</script>");
                    header("Location:https://localhost//studying//login.php");
                }
                else{
                    echo("<script>alert('failed to register you as a user')</script>");
                }
            }
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="register.php" method="post">
        First Name
        <input type="text" name="firstName" id="" value="<?php echo("$firstName") ?>">
        <p id="firstNameError" style="color:red"><?php echo("$firstNameError") ?></p><br><br>

        Middle Name
        <input type="text" name="lastName" id="" value="<?php echo("$lastName") ?>">
        <p id="lastNameError" style="color:red" ><?php echo("$lastNameError") ?></p><br><br>

        Identity Number
        <input type="text" name="idNumber" id=""  value="<?php echo("$idNumber") ?>">
        <p id="idNumberError" style="color:red" ><?php echo("$idNumberError") ?></p>
        <br><br><br>

        <input type="submit" name="submitBtn" value="Submit Button">
    </form>


</body>
</html>
