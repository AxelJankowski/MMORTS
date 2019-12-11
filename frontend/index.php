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
                            require_once("frontend/templates/navigation.php");

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

                            //check if user has any city
                            if(mysqli_num_rows($result) > 0) {
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

                                //buildings data
                                $query = "SELECT keep_level, tavern_level, barracks_level FROM buildings WHERE city_id = '$cityId'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);

                                $keepLevel = $row['keep_level'];
                                $tavernLevel = $row['tavern_level'];
                                $barracksLevel = $row['barracks_level'];

                                //production data:

                                //keep
                                $query = "SELECT wood_production, stone_production, clay_production, iternit_production, food_production FROM building_types WHERE type = 'keep' AND level = '$keepLevel'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);

                                $keepWood = $row['wood_production'];
                                $keepStone = $row['stone_production'];
                                $keepClay = $row['clay_production'];
                                $keepIternit = $row['iternit_production'];
                                $keepFood = $row['food_production'];

                                //will be more (e.g. lumber mill, mines)
                                ?>
                                    <h2 class="text-center"><?php echo $cityName; ?></h2>
                                    <div class="village-container">
                                        <div class="resources">
                                            <h3>RESOURCES</h3>
                                            <?php
                                                echo "<img src='frontend/images/icons/wood.svg' class='icon' /> Wood: ".$wood."<br/>";
                                                echo "<img src='frontend/images/icons/stone.svg' class='icon' /> Stone: ".$stone."<br/>";
                                                echo "<img src='frontend/images/icons/clay.svg' class='icon' /> Clay: ".$clay."<br/>";
                                                echo "<img src='frontend/images/icons/iternit.svg' class='icon' /> Iternit: ".$iternit."<br/>";
                                                echo "<img src='frontend/images/icons/food.svg' class='icon' /> Food: ".$food."<br/>";
                                            ?>
                                            <h4>PRODUCTION</h4>
                                            <?php
                                                echo "Wood + ".$keepWood."<br/>";
                                                echo "Stone + ".$keepStone."<br/>";
                                                echo "Clay + ".$keepClay."<br/>";
                                                echo "Iternit + ".$keepIternit."<br/>";
                                                echo "Food + ".$keepFood."<br/>";
                                            ?>
                                        </div>
                                        <div class="village">
                                            <?php
                                                if($keepLevel > 0) {
                                                    ?>
                                                        <div class="keep" title="Keep lvl. <?php echo $keepLevel ?>">
                                                            <a href="index.php?page=index"><img src="frontend/images/keep.png"/></a>
                                                        </div>
                                                    <?php
                                                }
                                                if($tavernLevel > 0) {
                                                    ?>
                                                        <div class="tavern" title="Tavern">
                                                            <a href="index.php?page=tavern"><img src="frontend/images/tavern.png"/></a>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="army">
                                            <h3>ARMY</h3>
                                        </div>
                                    </div>
                                <?php
                            } else {
                                ?>
                                    You are not in control of any village now.

                                    Create your settlement!
                                <?php
                            }
                        } else {
                            ?>
                                <h2>Main</h2>
                                <p>This is the main page.</p>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php require_once("frontend/templates/footer.php"); ?>
        </div>
    </body>
</html>