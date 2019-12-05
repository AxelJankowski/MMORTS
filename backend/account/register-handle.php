<?php
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
    $email = $_POST['email'];
    $password = $_POST['password'];

    //encrypt password
    $password = password_hash($password, PASSWORD_BCRYPT);

    //check if user already exists
    $sql = "SELECT username FROM users WHERE username = '$username'";
    if($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
    }
    if($rowcount >= 1) {
        echo "That username is already in use.";
    } else {
        //add user data to database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if($conn->query($sql) === true) {
            header("Location: ../../index.php?msg=registrationsuccess");
            die();
        } else {
            echo "Error: ".$sql."<br/>".$conn->error;
        }
    }
?>