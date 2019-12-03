<?php
    //database connection
    $dbserver = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "MMORTS";

    //establish connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    } else {
        echo "Connected succesfully";
    }

    //general variables
    $title = "MMORTS";
    $separator = " | ";
    $description = "Browser strategy game";

    //technical settings
    $maintenance = false;
?>