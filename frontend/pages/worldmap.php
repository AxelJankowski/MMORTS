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
                            ?>
                                <h2>World Map</h2>
                                <p>This is the world map page.</p>
                            <?php
                            //generate map
                            echo "<div class=world-grid>";
                            for($y = 0; $y < 6; $y++) {
                                for($x = 0; $x < 6; $x++) {
                                    echo "<div class='world-box'></div>";
                                }
                            }
                            echo "</div>";
                        }
                        else {
                            ?>
                                <p>You have to login in order to see the world map.</p>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php require_once("frontend/templates/footer.php"); ?>
        </div>
    </body>
</html>