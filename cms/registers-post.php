<?php
require_once "netting/class.crud.php";
$db = new crud();
$_POST['registers_id']=str_replace("final-","",$_POST['registers_id']);

$ident=$db->update("registers", $_POST, ["columns" => 'registers_id']);