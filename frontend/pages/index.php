<?php
    global $title;
    global $separator;
    global $description;
    global $logo;
?>
<html lang="en">
    <head>
        <?php require_once("frontend/templates/html-head.php"); ?>
    </head>

    <body>
        <div class="container">
            <?php require_once("frontend/templates/header.php"); ?>
            <div class="layer">
                <div class="content">
                    <h2>Main</h2>
                    <p>This is the main page.</p>
                    <?php
                        if(isset($_GET['msg'])) {
                            $msg = $_GET['msg'];

                            if($msg == "loginsuccess") {
                                $msg = "Logged in successfully.";
                            } elseif($msg == "registrationsuccess") {
                                $msg = "Account has been created successfully.";
                            } elseif($msg == "logoutsuccess") {
                                $msg = "Logged out successfully.";
                            }

                            ?>
                            <div class="alert alert-success" role="alert"><?php echo $msg; ?></div>
                            <?php
                        }
                        if(isset($_SESSION['loggedin'])) {
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

                            //city data
                            $query = "SELECT id, name, resources_id FROM cities WHERE user_id = '$userId'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            $cityId = $row['id'];
                            $cityName = $row['name'];
                            $cityResourcesId = $row['resources_id'];

                            //resources data
                            $query = "SELECT wood, stone, clay, iternit, food FROM resources WHERE id = '$cityResourcesId'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            $wood = $row['wood'];
                            $stone = $row['stone'];
                            $clay = $row['clay'];
                            $iternit = $row['iternit'];
                            $food = $row['food'];

                            //production data
                            $query = "SELECT wood_production, stone_production, clay_production, iternit_production, food_production FROM production WHERE city_id = '$cityId'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            $woodProduction = $row['wood_production'];
                            $stoneProduction = $row['stone_production'];
                            $clayProduction = $row['clay_production'];
                            $iternitProduction = $row['iternit_production'];
                            $foodProduction = $row['food_production'];
                            ?>
                                <h3 class="text-center"><?php echo $cityName; ?></h3>
                                <div class="village-wrapper">
                                    <div class="resources">
                                        <h4>RESOURCES</h4>
                                        <?php
                                            echo "<img src='frontend/images/icons/wood.svg' class='icon' /> Wood: ".$wood."<br/>";
                                            echo "<img src='frontend/images/icons/stone.svg' class='icon' /> Stone: ".$stone."<br/>";
                                            echo "<img src='frontend/images/icons/clay.svg' class='icon' /> Clay: ".$clay."<br/>";
                                            echo "<img src='frontend/images/icons/iternit.svg' class='icon' /> Iternit: ".$iternit."<br/>";
                                            echo "<img src='frontend/images/icons/food.svg' class='icon' /> Food: ".$food."<br/>";
                                        ?>
                                        <h5>PRODUCTION</h5>
                                        <?php
                                            echo "Wood + ".$woodProduction."<br/>";
                                            echo "Stone + ".$stoneProduction."<br/>";
                                            echo "Clay + ".$clayProduction."<br/>";
                                            echo "Iternit + ".$iternitProduction."<br/>";
                                            echo "Food + ".$foodProduction."<br/>";
                                        ?>
                                    </div>
                                    <div class="village">
                                        <div class="keep">
                                            <a href="http://google.com"><img src="frontend/images/keep.png"/></a>
                                        </div>
                                    </div>
                                    <div class="army">
                                        <h4>ARMY</h4>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <a href="index.php?page=index">Main</a>
                    <a href="index.php?page=contact">Contact</a>
                </div>
            </div>
            <?php require_once("frontend/templates/footer.php"); ?>
        </div>
    </body>
</html>