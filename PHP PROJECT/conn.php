<?php

    #create connection variables 
    $hostname = "localhost" ; $username = "root" ; $password = ""; $dbName = "studying"; 
    #create connection variable
    #when mysqli_connect() accept 3 arguments without the database name one it means we are trying to connect to the server
    #when mysqli_connect() accept 4 arguments it means we are connecting to the server and the database

    $connection = mysqli_connect($hostname,$username,$password);

    if($connection){
        echo("<script>alert('you connected to the server successsfuly')</script>");
        //now connect to the database
        $connection = mysqli_connect($hostname,$username,$password,$dbName);
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