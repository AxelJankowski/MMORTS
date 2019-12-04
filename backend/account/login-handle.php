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

    //encrypt password
    $password = md5($password);

    //check if user already exists
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    if($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
    }
    if($rowcount == 1) {
        echo "Correct.";
        $_SESSION['loggedin'] = $username;
        echo $_SESSION['loggedin'];
    } else {
        echo "Incorrect account details.";
    }
?>