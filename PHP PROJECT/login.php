<?php

    require("conn.php");

    session_start();
    $firstNameSession = $_SESSION['firstName'];

    $_SESSION['indexFirstName'] = "";

    $firstName = "";$firstNameError = "";
    $idNumber = "";$idNumberError = "";    


    #5 crude database functionalities  ....... INSERTING DATA , RETRIEVING(SELECT) , DELETING DATA , UPDATE DATA , SEARCHING(SELECT) 

    #before we can validate our form we have to know if the user have submitted the form
    if(isset($_POST['submitBtn'])){
        #echo("<script>alert('it means that the user have submitted the form')</script>");
        if(empty($_POST['firstName']) || empty($_POST['idNumber'])){
           #if any of these inputs field have an empty space we now check which one have the empty space
           #check if the first name is the one that is empty
           if(empty($_POST['firstName'])){
                $firstNameError = " you cannot leave the first name input field empty";
           } 
           else{
                $firstName = $_POST['firstName'];
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
            $idNumber = $_POST['idNumber'];
            
            $_SESSION['firstName'] = $firstName;
            #it means all the input fields are not empty
            #now check if the first name and the id number that the user is providing exist 
            $sql = "SELECT firstName,idNumber FROM studyingTable WHERE idNumber = '$idNumber' AND firstName = '$firstName' ;";
            $results = mysqli_query($connection,$sql);
            if(mysqli_num_rows($results)==1){
                echo("<script>alert('the first name and id number you provided are correct we are redirecting you to another page')</script>");
                header("Location:https://localhost//studying//index.php");
            }
            else{
               echo("<script>alert('the first name or id number provided are not correct')</script>");
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
    

    <?php echo("welcome $firstNameSession")?>

    <form action="login.php" method="post">
        First Name
        <input type="text" name="firstName" id="" value="<?php echo("$firstName") ?>">
        <p id="firstNameError" style="color:red"><?php echo("$firstNameError") ?></p><br><br>
    
        
        Identity Number
        <input type="text" name="idNumber" id=""  value="<?php echo("$idNumber") ?>">
        <p id="idNumberError" style="color:red" ><?php echo("$idNumberError") ?></p>
        <br><br><br>
        
        <input type="submit" name="submitBtn" value="Submit Button">
    </form>


</body>
</html>