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

                                //keep
                                $query = "SELECT defence, wood_production, stone_production, clay_production, iternit_production, food_production FROM building_types WHERE type = 'keep' AND level = '$keepLevel'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);

                                $keepDefence = $row['defence'];
                                $keepWood = $row['wood_production'];
                                $keepStone = $row['stone_production'];
                                $keepClay = $row['clay_production'];
                                $keepIternit = $row['iternit_production'];
                                $keepFood = $row['food_production'];

                                //tavern
                                $query = "SELECT defence FROM building_types WHERE type = 'tavern' AND level = '$tavernLevel'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);

                                $tavernDefence = $row['defence'];

                                //will be more (e.g. lumber mill, mines)
                                ?>
                                    <h2 class="text-center"><?php echo $cityName; ?></h2>
                                    <div class="village-container">

                                        <!-- LEFT PANEL -->
                                        <div class="left-panel">
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

                                        <!-- VILLAGE (MIDDLE) -->
                                        <div class="village">
                                            <div class="keep" title="Keep lvl. <?php echo $keepLevel; ?>" onclick="openBuildPanel(keep)">
                                            <?php
                                                if($keepLevel > 0) {
                                                ?>
                                                    <img src="frontend/images/keep.png"/>
                                                <?php
                                                } else {
                                                ?>
                                                    <!-- should be image of building site -->
                                                    <img src="frontend/images/keep.png"/>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                            <div class="tavern" onclick="openBuildPanel(tavern)">
                                            <?php
                                                if($tavernLevel > 0) {
                                                ?>
                                                    <img src="frontend/images/tavern.png" title="Tavern"/>
                                                <?php
                                                } else {
                                                ?>
                                                    <!-- should be image of building site -->
                                                    <img src="frontend/images/tavern.png" title="Tavern ruins"/>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                        </div>

                                        <!-- RIGHT PANEL -->
                                        <div class="right-panel" id="army">
                                            <h3>ARMY</h3>
                                            Your people use chopsticks instead of forks and knives.
                                            <br/><br/>
                                            Train them to fight.
                                        </div>

                                        <div class="right-panel" id="keep-panel">
                                            <h3 style="display:inline-block;">KEEP</h3>
                                            <button type="button" class="close" onclick="closeBuildPanel(keep)">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br/>
                                            <?php
                                            if($keepLevel > 0) {
                                                ?>
                                                <b>Building lvl. <?php echo $keepLevel; ?></b>
                                                <br/>
                                                Defence: <?php echo $keepDefence; ?>
                                                <?php
                                            } else {
                                                echo "Keep has fallen.";
                                            }
                                            ?>
                                        </div>

                                        <div class="right-panel" id="tavern-panel">
                                            <h3 style="display:inline-block;">TAVERN</h3>
                                            <button type="button" class="close" onclick="closeBuildPanel(tavern)">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br/>
                                            <?php
                                            if($tavernLevel > 0) {
                                                ?>
                                                Defence: <?php echo $tavernDefence; ?>
                                                <br/><br/>
                                                <a href="index.php?page=tavern" class="btn btn-outline-dark">Go inside</a>
                                                <?php
                                            } else {
                                                echo "Ruins and ashes...";
                                            }
                                            ?>
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

        <script src="frontend/animations/functions.js"></script>
    </body>
</html>