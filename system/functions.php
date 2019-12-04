<?php
    function getPage() {
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page == "index") {
                require_once("frontend/pages/index.php");
            } elseif($page == "contact") {
                require_once("frontend/pages/contact.php");
            } elseif($page == "login") {
                require_once("frontend/pages/login.php");
            } elseif($page == "register") {
                require_once("frontend/pages/register.php");
            } elseif($page == "logout") {
                session_destroy();
                
                header("Location: index.php?msg=logoutsuccess");
                die();
            }
        } else {
            require_once("frontend/pages/index.php");
        }
        
    }
?>