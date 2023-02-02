<?php require_once "header.php"; ?>

<?php

$values["name"] = $_POST["first_name"]; 
$values["surname"] = $_POST["last_name"]; 
$values["message"] = $_POST["message"]; 
$values["email"] = $_POST["email"];    
$values["created_date"] = date("Y-m-d h:i:sa");


if ($row=$db->insert("contacts",$values))
    echo '<script tyle="text/javascript">window.location="'.$basedir.'iletisim?status=1";</script>';


?>