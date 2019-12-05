<?php
    global $title;
    global $separator;
    global $description;
    global $logo;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title><?php echo $title.$separator.$description; ?></title>

        <link href="frontend/design/css/bootstrap.css" rel="stylesheet">
        <link href="frontend/design/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
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
                            ?>
                                <h3>Village</h3>
                                <div class="village-wrapper">
                                    <div class="resources">
                                        Resources
                                    </div>
                                    <div class="village">
                                        <div class="keep">Keep</div>
                                    </div>
                                    <div class="army">
                                        Army
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