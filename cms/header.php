<?php require_once "setconfig.php";

$fileUrl = substr($_SERVER['SCRIPT_NAME'],4);
$fileUrl = str_replace(".php","",$fileUrl);
$fileUrl = str_replace("/","",$fileUrl);
$a = false;
switch ($fileUrl){
    case "products":
    case "product-categories":
    case "admins":
    case "courses":
    case "instructors":
        $aspectRatio = 1;
        break;
    case "pages":
        $aspectRatio = "0.66";
        break;
    case "lessons":
        $aspectRatio = "1.78";
        break;
    case "courses2":
        $getIdent = TRUE;
        break;
    case "registers":
        $getRegs = TRUE;
        break;
    case "gallery":
        $a = true;
        break;
    default:
        $aspectRatio = "";
        break;
}
/*Aspect Ratios 16:9=1.78 , 4:3=1.33 , 1:1=1*/
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MSGSÜ - SEM CMS</title>

    <link rel="shortcut icon" href="../img/favicon.ico" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!--DataTables-->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->




    <!--Cropper.JS-->
    <link rel="stylesheet" href="dist/css/cropper.css">
    <!---->
    <style>#cropper{
            display: block;
            max-width: 100%;
        }
    pre{ width: 100% !important; overflow: scroll!important;}td{
            max-width: 50% !important;
                                                             }</style>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?=($a)?"<link rel='stylesheet'
          href='dist/css/bootstrap-grid.min.css'>":""?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>S</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>MS</b>GSÜ</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="../img/admins/<?=$_SESSION['admins']['admins_file']?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?=$_SESSION['admins']['admins_namesurname']?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="../img/admins/<?=$_SESSION['admins']['admins_file']?>" class="img-circle" alt="User Image">

                                <p>
                                    <?=$_SESSION['admins']['admins_namesurname']?>
                                    <small>Admin</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Güvenli Çıkış</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../img/admins/<?=$_SESSION['admins']['admins_file']?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?=$_SESSION['admins']['admins_namesurname']?></p>
                    <!-- Status -->
                    <a href="#">Admin</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <!-- Optionally, you can add icons to the links -->
                <li class="header"><i class="fa fa-bars margin-r-5"></i>Menüler</li>
                <li><a href="./"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="announcements.php"><i class="fa fa-bullhorn"></i> <span>Duyurular</span></a></li>
                <li class="header"><i class="fa fa-bars margin-r-5"></i>Yönetim</li>
                <li><a href="admins.php"><i class="fa fa-user"></i> <span>Yöneticiler</span></a></li>
                <li><a href="instructors.php"><i class="fa fa-user"></i> <span>Eğitmenler</span></a></li>
                <li><a href="courses.php"><i class="fa fa-book"></i> <span>Eğitimler</span></a></li>
                <li><a href="courses2.php"><i class="fa fa-clock-o"></i> <span>Eğitim Detayları</span></a></li>
<!--                <li><a href="registers.php"><i class="fa fa-pencil"></i> <span>Eğitim Kayıtları</span></a></li>-->
                <li><a href="settings.php"><i class="fa fa-cogs"></i> <span>Ayarlar</span></a></li>
                <li><a href="colors.php"><i class="fa fa-columns"></i> <span>Renkler</span></a></li>
                <li class="header"><i class="fa fa-bars margin-r-5"></i>Sayfalar</li>
                <li><a href="faqs.php"><i class="fa fa-question-circle-o"></i> <span>SSS</span></a></li>
                <li><a href="gallery.php"><i class="fa fa-image"></i> <span>Galeri</span></a></li>
                <li><a href="pages.php"><i class="fa fa-file-text"></i> <span>Sayfalar</span></a></li>
                <li><a href="locations.php"><i class="fa fa-location-arrow"></i> <span>Konumlar</span></a></li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
