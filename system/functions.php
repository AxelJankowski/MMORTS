<?php
    function getPage() {
        if (isset($_GET['page'])){
            $page = $_GET['page'];
            if ($page == "index") {
                require_once("frontend/pages/index.php");
            } elseif ($page == "contact") {
                require_once("frontend/pages/contact.php");
            }
        } else {
            require_once("frontend/pages/index.php");
        }
        
    }
?>