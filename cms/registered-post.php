<?php
require_once "netting/class.crud.php";
$db = new crud();
$ident=$db->update("courses_detail", $_POST, ["columns" => 'courses_detail_id']);
