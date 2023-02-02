<?php
setlocale(LC_ALL, 'tr_TR.UTF-8', 'tr_TR', 'tr', 'turkish');
//if (!isset($_COOKIE['bypass'])){
//    header("Location: /bakim.html");
//}
require_once 'cms/netting/class.crud.php';
$db = new crud();
$sql=$db->qSql("SELECT * FROM settings");
$row=$sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($row as $key) {
    $settings[$key['settings_key']] = $key['settings_value'];
}
$basedir = "/";
if ($settings['banner-display']==1 && !isset($_COOKIE["bannerShown"])){
    setcookie("bannerShown", true, time() + (60*15)); // 60 seconds ( 1 minute) * 15 = 15 minutes
}
?>
