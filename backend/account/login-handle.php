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

    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    $username = htmlentities($username, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

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
        echo "Username and password do not match.";
    }
?>