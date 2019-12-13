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

    //user data
    $username = $_SESSION['loggedin'];

    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $userId = $row['id'];

    $newCity = $_POST['new-city'];

    //check if city name is already in use
    $sql = "SELECT name FROM cities WHERE name = '$newCity'";
    if($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
    }
    if($rowcount >= 1) {
        echo "A village with this name already exists.";
    } else {
        //add city data to database
        $sql = "INSERT INTO cities (user_id, name) VALUES ('$userId', '$newCity')";

        if($conn->query($sql) === true) {
            header("Location: ../../index.php?msg=villagecreated");
            die();
        } else {
            echo "Error: ".$sql."<br/>".$conn->error;
        }
    }
?>