<?php
    include "session.php";

    if(array_key_exists("logout", $_GET) && $_GET['logout'] == true) {
        session_destroy();
        header("Location: ../index.php");
    }
?>