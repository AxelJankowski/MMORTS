<?php
    global $title;
    global $separator;
    global $description;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title><?php echo $title.$separator.$description; ?></title>

        <link href="frontend/design/css/bootstrap.css" rel="stylesheet">
        <link href="frontend/design/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php require_once("frontend/templates/header.php"); ?>
            <div class="layer">
                <div class="content">
                    <h2>Login</h2>
                    <p>This is the login page.</p>
                    <a href="index.php?page=index">Main</a>
                    <a href="index.php?page=contact">Contact</a>
                </div>
            </div>
            <?php require_once("frontend/templates/footer.php"); ?>
        </div>
    </body>
</html>