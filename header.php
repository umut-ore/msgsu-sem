<?php
require_once "settings.php";

?>
<!DOCTYPE html>
<html class="no-js" lang="tr">
<head>
    <!-- Meta Tags -->
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="description" content="<?=$settings['description']?>">
    <meta name="keywords" content="<?=$settings['keywords']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>MSGSÜ SEM - Mimar Sinan Güzel Sanatlar Üniversitesi Sürekli Eğitim Merkezi</title>

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/font-awesome.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/niceselect.css">
    <!-- Fancy Box CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/jquery.fancybox.min.css">
    <!-- Fancy Box CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/cube-portfolio.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/owl.carousel.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/animate.min.css">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/slicknav.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/magnific-popup.css">

    <!-- Eduland Stylesheet -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/normalize.css?ver=<?=time(); ?>">
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/style.css?ver=<?=time(); ?>">
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/responsive.css">

    <!-- Eduland Colors -->
    <link rel="stylesheet" href="<?=$basedir?>themes/pkurg-eduland/assets/css/colors/color1.css">
    <script src="<?=$basedir?>themes/pkurg-eduland/assets/js/jquery.min.js"></script>
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }
        .grecaptcha-badge{
            visibility: hidden!important;
            opacity: 0!important;
        }

        /* The sticky class is added to the header with JS when it reaches its scroll position */
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999999991;
            transition: all ease-in-out 500ms;
            box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.35);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.35);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.35);
        }

        /* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
        .sticky + .content {
            padding-top: 102px;
        }
        .ofi {
            object-fit: cover;
            object-position: center;
            font-family: 'object-fit: cover; object-position: center;';
        }

        .msgsuWrapper{
            border: .4em #01158E dashed;
            background: #F0EFDB;
            padding: .4em;
            position: relative;
            font-size: 1em!important;
            transition: ease-in-out all 400ms;
        }
        .msgsuWrapper:hover{
            transform: scale(1.1);
        }


        <?php
        $x = $db->read("colors");
        foreach ($x->fetchAll(PDO::FETCH_ASSOC) as $a){
            ?>
        .msgsuWrapper.<?=$a['colors_class_name']?>>div{
            background-color: <?=$a['colors_hex']?>;
        }
        .msgsuWrapper.<?=$a['colors_class_name']?>>div>div::after{
            background-color: <?=$a['colors_hex']?>;
        }
        <?php
        }
        ?>

        .msgsuWrapper::after{
            display: block;
            content: "";
            padding-bottom: 100%;
        }
        .msgsuWrapper>div{
            position: absolute;
            width: calc(100% - .8em);
            height: calc(100% - .8em);
            border-radius: 1em;
            overflow: hidden;
            text-align: center;
        }
        .msgsuWrapper>div>div{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            padding: .4em;
            position: relative;
        }
        .msgsuWrapper>div>div:first-child{
            height: 50%;
        }
        .msgsuWrapper>div>div:first-child::after{
            width: 100%;
            height: 0;
            padding-bottom: 1.2em;
            content: "";
            display: block;
            position: absolute;
            bottom: -.5em;
            z-index: 99999999;
            border-bottom-left-radius: 100%;
            border-bottom-right-radius: 100%;
        }
        .msgsuWrapper>div>div:nth-child(2){
            height: 30%;
            background: rgba(0,0,0,0.2);
            z-index: 999999;
            padding-top: .4em;
            position: relative;
        }
        .msgsuWrapper>div>div:nth-child(3){
            height: 20%;
            background: rgba(0,0,0,0.4);
            z-index: 9999999;
            padding-top: .2em;
            padding-bottom: 1.2em;
            color: white;
        }
        .msgsuWrapper>div>div:first-child>h3{
            color: white;
            font-weight: 400;
        }
        .msgsuWrapper h1,
        .msgsuWrapper h2,
        .msgsuWrapper h3{
            margin: 0;
            font-size: inherit!important
        }





        @media (min-width: 576px) {
            .msgsuWrapper{
                font-size: .5em;
            }
        }


        @media (min-width: 768px) {
            .msgsuWrapper{
                font-size: .6em;
            }
        }


        @media (min-width: 992px) {
            .msgsuWrapper{
                font-size: .8em;
            }
        }


        @media (min-width: 1200px) {
            .msgsuWrapper{
                font-size: 1em;
            }
        }
        #iudi{background-image:url("http://film-arsivi.msgsu.edu.tr/sem/themes/pkurg-eduland/assets/images/slider/slide-bg1-yesillik-v2.jpg");}#ipaahl{background-image:url("themes/pkurg-eduland/assets/images/cta-bg.jpg");}</style>    </head>
 <script src="https://www.google.com/recaptcha/api.js?render=6Lfs2MAZAAAAAPQ-fSdCIpsmnSH73sLTIuAjmG8k"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.4/ofi.min.js" integrity="sha512-7taFZYSf0eAWyi1UvMzNrBoPVuvLU7KX6h10e4AzyHVnPjzuxeGWbXYX+ED9zXVVq+r9Xox5WqvABACBSCevmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <body class="content">



<!-- Header -->
<header class="header" id="header">
    <!-- Header Inner -->
    <div class="header-inner overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?=$basedir?>" id="icf2y"><img src="img/settings/<?=$settings['logo-colored']?>" alt="" id="i31z8" /></a>
                    </div>
                    <!--/ End Logo -->
                    <div class="mobile-menu"></div>
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="menu-bar">
                        <nav class="navbar navbar-default">
                            <div class="navbar-collapse">
                                <!-- Main Menu -->
                                <ul id="nav" class="nav menu navbar-nav">
                                    <li class=""><a href="<?=$basedir?>"><i class="fa fa-home"></i>Anasayfa</a></li>
                                    <li><a href="<?=$basedir?>hakkimizda"><i class="fa fa-clone"></i>Hakkımızda</a>
<!--                                        <ul class="dropdown" style="display:none;">
                                            <?php
                                                $subPages=$db->read("pages",["columns_name"=>"pages_must",
                                                    "columns_sort"=>"ASC"]);
                                                $subPages=$subPages->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($subPages as $page){
                                                    if ($page['pages_url'] != "kurumsal-egitim"){
                                            ?>
                                            <li><a href="<?=$basedir.$page['pages_url']?>"><?=$page['pages_title']?></a></li>
                                            <?php }} ?>
                                        </ul> -->
                                    </li>
                                    <li><a href="<?=$basedir?>egitimler"><i class="fa fa-clone"></i>Eğitimler</a></li>
                                    <li><a href="<?=$basedir?>galeri"><i class="fa fa-photo"></i>Galeri</a></li>
                                    <li><a href="<?=$basedir?>iletisim"><i class="fa fa-address-book"></i>İletişim</a> </li>
                                    <li><a class="odeme" href="https://odeme.msgsu.edu.tr/PaymentType/6" target="_blank">ONLINE ÖDEME</a> </li>
                                </ul>
                                <!-- End Main Menu -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("header");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>



