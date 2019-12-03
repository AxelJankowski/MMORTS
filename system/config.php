<?php
    //database connection
    $dbserver = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "mmorts";

    //establish connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    } else {
        //if connection works, get data from database
        $query = "SELECT * FROM configuration";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        //general settings
        $title = $row['name'];
        $separator = $row['separator'];
        $description = $row['description'];

        //technical settings
        $maintenance = $row['maintenance'];
    }
?>