<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SESSION['PassDays'] > 90 || $_SESSION['DefPass'] == 2) {
    header("Location: auth-resetpassword.html");
}



?>