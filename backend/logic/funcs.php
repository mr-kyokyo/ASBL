<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

function logged_only() {
    if(!isset($_SESSION['auth'])) {
        $_SESSION['flash'] = "Connectez vous pour accéder à cette page";
        header('location: ../index.php');
        exit();
    }
}

function logged_only2() {
    if(!isset($_SESSION['auth'])) {
        $_SESSION['flash'] = "Connectez vous pour accéder à cette page";
        header('location: ../../index.php');
        exit();
    }
}
?>