<?php
    session_start();

    //database connection
    $dbserver = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "mmorts";

    //establish connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);

    //check connection
    if($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    //check if user already exists
    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $dbPassword = $row['password'];

    //check password
    if(password_verify($password, $dbPassword)) {
        $_SESSION['loggedin'] = $username;

        header("Location: ../../index.php?msg=loginsuccess");
        die();
    } else {
        echo "Password is incorrect.";
    }
?>