<?php
require_once 'class.crud.php';
$db=new crud();

if (isset($_GET['blogs_must'])) {

    $sonuc=$db->orderUpdate("blogs",$_POST['item'],"blogs_must","blogs_id");

    // $returnMsg=array();
    $returnMsg= ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}
if (isset($_GET['sliders_must'])) {

    $sonuc=$db->orderUpdate("sliders",$_POST['item'],"sliders_must","sliders_id");

    // $returnMsg=array();
    $returnMsg= ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}
if (isset($_GET['pages_must'])) {

    $sonuc=$db->orderUpdate("pages",$_POST['item'],"pages_must","pages_id");

    // $returnMsg=array();
    $returnMsg= ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}
