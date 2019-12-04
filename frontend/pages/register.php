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
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
    </head>

    <body>
        <div class="container">
            <?php require_once("frontend/templates/header.php"); ?>
            <div class="layer">
                <div class="content">
                    <h2>Register</h2>
                    <form role="form" action="backend/account/registration.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="username" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail address:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <?php require_once("frontend/templates/footer.php"); ?>
        </div>
    </body>
</html>