<?php

    session_start();
    $firstName = $_SESSION['indexFirstName'];
    echo("welcome $firstName");


?>