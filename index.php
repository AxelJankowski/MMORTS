<?php
    session_start();
    
    require_once("backend/system/includes.php");
    if ($maintenance == true) {
        //display maintenance message
        echo "The site is under construction.";
    }
    elseif ($maintenance == false) {
        //open the game
        getPage();
    }
?>