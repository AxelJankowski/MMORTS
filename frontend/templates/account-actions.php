<?php
    if(isset($_SESSION['loggedin'])) {
        ?>
            <div class="account">
                <a href="index.php?page=logout">Logout</a> <a href="index.php?page=account">Account</a>
            </div>
        <?php
    } else {
        ?>
            <div class="account">
                <a href="index.php?page=login">Login</a> <a href="index.php?page=register">Register</a>
            </div>
        <?php
    }
?>