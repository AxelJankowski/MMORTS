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
                            ?>
                                <h3 class="text-center">Village</h3>
                                <div class="village-wrapper">
                                    <div class="resources">
                                        <h4>Resources</h4>
                                        <?php
                                            echo $cityResourcesId;
                                        ?>
                                    </div>
                                    <div class="village">
                                        <div class="keep">
                                            <a href="http://google.com"><img src="frontend/images/keep.png"/></a>
                                        </div>
                                    </div>
                                    <div class="army">
                                        <h4>Army</h4>
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