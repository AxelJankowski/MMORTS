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
                    <h2>Login</h2>
                    <form role="form" action="backend/account/login-handle.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="username" class="form-control" name="username">
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