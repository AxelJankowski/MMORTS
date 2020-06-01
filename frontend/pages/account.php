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

                            //get user data
                            $username = $_SESSION['loggedin'];

                            $query = "SELECT email, password FROM users WHERE username = '$username'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            $userEmail = $row['email'];
                            $userPassword = $row['password'];

                            ?>

                                <div class="text-center">
                                    <h2>Account</h2>
                                    <p>Your user information and settings.</p>
                                </div>

                                <p>Your name is <?php echo $username; ?>.</p>

                                <p>Your e-mail address: <?php echo $userEmail; ?></p>

                            <?php
                        } else {
                            ?>
                                <p>You have to login in order to see account settings.</p>
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