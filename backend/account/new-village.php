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

    //get user data
    $username = $_SESSION['loggedin'];

    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $userId = $row['id'];

    $newCity = $_POST['new-city'];

    $newCity = htmlentities($newCity, ENT_QUOTES, "UTF-8");

    //check if city name is already in use
    $query = "SELECT name FROM cities WHERE name = '$newCity'";
    if($result = mysqli_query($conn, $query)) {
        $rowcount = mysqli_num_rows($result);
    }
    if($rowcount >= 1) {
        echo "A village with this name already exists.";
    } else {
        //add new city data to database
        $query = "INSERT INTO cities (user_id, name) VALUES ('$userId', '$newCity')";

        if($conn->query($query) === true) {
            //get new city data
            $query = "SELECT id FROM cities WHERE user_id = '$userId'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            $cityId = $row['id'];

            //add new buildings and resources data to database
            $query = "INSERT INTO buildings (city_id) VALUES ('$cityId')";
            $conn->query($query);
            $query = "INSERT INTO resources (user_id, city_id) VALUES ('$userId', '$cityId')";
            $conn->query($query);

            header("Location: ../../index.php?msg=villagecreated");
            die();
        } else {
            echo "Error: ".$sql."<br/>".$conn->error;
        }
    }
?>