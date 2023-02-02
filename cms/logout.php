<?php
session_start();
unset($_SESSION['admins']);
session_destroy();
setcookie("adminsLogin", "",strtotime("-30 day"),"/");
header("Location:login.php");
die();