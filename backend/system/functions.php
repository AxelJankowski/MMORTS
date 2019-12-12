<?php
    function getPage() {
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page == "index") {
                require_once("frontend/index.php");
            }
            elseif($page == "worldmap") {
                require_once("frontend/pages/worldmap.php");
            }
            elseif($page == "tavern") {
                require_once("frontend/pages/tavern.php");
            }
            elseif($page == "login") {
                require_once("frontend/pages/login.php");
            }
            elseif($page == "register") {
                require_once("frontend/pages/register.php");
            }
            elseif($page == "logout") {
                session_destroy();
                
                header("Location: index.php?msg=logoutsuccess");
                die();
            }
        } else {
            require_once("frontend/index.php");
        }
    }
?>