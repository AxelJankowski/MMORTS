<?php
    global $logo;
?>
<div class="layer">
    <div class="header">
        <div class="logo">
            <img src="frontend/images/<?php echo $logo; ?>" class="responsive" />
        </div>
        <div class="title">
            <h1><a href="index.php?page=index"><?php echo $title.$separator.$description; ?></a></h1>
        </div>
        <div class="account">
            <a href="index.php?page=login">Login</a> <a href="index.php?page=register">Register</a>
        </div>
    </div>
</div>