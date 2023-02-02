<?php
session_start();
$privkey = "!1qaz2WSX3edc4RFV%56";
header('Content-Type: text/html; charset=utf-8');
$a=!isset($_SESSION['checkKey']) || $_SESSION['checkKey'] != $privkey;
if ($_SERVER['PHP_SELF']!== "/testing/login.php" && $a){
    header("Location: ./login.php");
}