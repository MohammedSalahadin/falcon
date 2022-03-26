<?php

session_start();

//destory all sessions
if (session_destroy()) {
    header('location: ../index.php');
} else {
    $previousPage = $_SERVER['HTTP_REFERER'];
    header('location:'. $previousPage);
}






?>