<?php
    session_start();
    require_once("system/functions.php");
    require_once("system/config.php");

    if ($maintenance == true) {
        echo "The site is under construction.";
    } elseif ($maintenance == false) {
        getPage();
    }
?>