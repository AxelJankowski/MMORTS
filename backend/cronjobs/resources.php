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

        //buildings data
        $query = "SELECT keep_level, tavern_level, barracks_level FROM buildings WHERE city_id = '$cityId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $keepLevel = $row['keep_level'];

        //production data:

        //KEEP
        $query = "SELECT wood_production, stone_production, clay_production, iternit_production, food_production FROM building_types WHERE type = 'keep' AND level = '$keepLevel'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $keepWood = $row['wood_production'];
        $keepStone = $row['stone_production'];
        $keepClay = $row['clay_production'];
        $keepIternit = $row['iternit_production'];
        $keepFood = $row['food_production'];

        $query = "UPDATE resources SET wood = wood + '$keepWood' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource wood has been updated!<br/>";
        }
        $query = "UPDATE resources SET stone = stone + '$keepStone' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource stone has been updated!<br/>";
        }
        $query = "UPDATE resources SET clay = clay + '$keepClay' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource clay has been updated!<br/>";
        }
        $query = "UPDATE resources SET iternit = iternit + '$keepIternit' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource iternit has been updated!<br/>";
        }
        $query = "UPDATE resources SET food = food + '$keepFood' WHERE city_id = '$cityId'";
        if(mysqli_query($conn, $query)) {
            echo "City's resource food has been updated!<br/>";
        }
    }
?>