<?php
require_once "netting/class.crud.php";
$db = new crud();
header('Content-Type: application/json');
$title=$_POST['ident'];
$ident=$db->wread("courses","courses_id",$title);
$ident=$ident->fetch(PDO::FETCH_ASSOC);
echo json_encode($ident);
