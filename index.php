<?php
    session_start();
    
    require_once("system/includes.php");

    if ($maintenance == true) {
        echo "The site is under construction.";
    } elseif ($maintenance == false) {
        getPage();
    }
?>