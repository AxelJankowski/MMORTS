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

    $query = "SELECT * FROM resources";
    $result = $conn->query($query);

    $count = 0;
    while($row = $result->fetch_assoc()) {
        $cityId = $row['city_id'];
        $query = "SELECT wood_production, stone_production, clay_production, iternit_production, food_production FROM production WHERE city_id = '$cityId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $woodProduction = $row['wood_production'];
        $stoneProduction = $row['stone_production'];
        $clayProduction = $row['clay_production'];
        $iternitProduction = $row['iternit_production'];
        $foodProduction = $row['food_production'];

        $query = "UPDATE resources SET wood = wood + '$woodProduction' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource wood has been updated!<br/>";
        }
        $query = "UPDATE resources SET stone = stone + '$stoneProduction' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource stone has been updated!<br/>";
        }
        $query = "UPDATE resources SET clay = clay + '$clayProduction' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource clay has been updated!<br/>";
        }
        $query = "UPDATE resources SET iternit = iternit + '$iternitProduction' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource iternit has been updated!<br/>";
        }
        $query = "UPDATE resources SET food = food + '$foodProduction' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource food has been updated!<br/>";
        }
    }
?>