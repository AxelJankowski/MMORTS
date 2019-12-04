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
                    <h2>Register</h2>
                    <form role="form">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <?php require_once("frontend/templates/footer.php"); ?>
        </div>
    </body>
</html>