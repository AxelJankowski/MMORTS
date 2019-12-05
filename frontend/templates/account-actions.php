<?php
    if(isset($_SESSION['loggedin'])) {
        ?>
            <nav class="nav justify-content-end">
                <a href="index.php?page=logout" class="nav-item nav-link">Logout</a>
                <a href="index.php?page=account" class="nav-item nav-link">Account</a>
            </nav>
        <?php
    } else {
        ?>
            <nav class="nav justify-content-end">
                <a href="index.php?page=login" class="nav-item nav-link">Login</a>
                <a href="index.php?page=register" class="nav-item nav-link">Register</a>
        </nav>
        <?php
    }
?>