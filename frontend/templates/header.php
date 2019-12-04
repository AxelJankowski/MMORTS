<?php
    global $logo;
?>
<div class="layer">
    <div class="header">
        <div class="logo">
            <a href="index.php?page=index"><img src="frontend/images/<?php echo $logo; ?>" class="responsive" /></a>
        </div>
        <div class="title">
            <h1><a href="index.php?page=index"><?php echo $title.$separator.$description; ?></a></h1>
        </div>
        <?php
            require_once("frontend/templates/account-actions.php");
        ?>
    </div>
</div>