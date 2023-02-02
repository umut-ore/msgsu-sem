<!-- Footer -->
<footer class="footer section">
    <!-- Footer Top -->
    <div class="footer-top overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="/" id="icf2y"><img src="img/settings/<?= /** @var array $settings recieved from header */
                        $settings['logo-white']?>" alt="" id="i31z8" style="margin-top: 60px; max-height: 78px" /></a>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- About -->
                    <div class="single-widget about">
                        <ul class="list">
                            <?php if (!empty($settings['phone'])){?><li><i class="fa fa-phone"></i>Telefon: <a href="tel:<?=str_replace(' ', '', $settings['phone'])?>"><?=$settings['phone']?></a> </li><?php }?>
                            <?php if (!empty($settings['fax'])){?><li><i class="fa fa-phone"></i>Faks: <a href="fax:+90<?=str_replace(' ', '', $settings['fax'])?>"><?=$settings['fax']?></a> </li><?php }?>
                            <?php if (!empty($settings['email'])){?><li><i class="fa fa-envelope"></i>E-Posta: <a href="mailto:<?=$settings['email']?>"><?=$settings['email']?></a> </li><?php }?>
                            <?php if (!empty($settings['adres'])){?><li><i class="fa fa-map-o"></i>Adres: <?=$settings['adres']." ".$settings['ilce']." / ".$settings['il']?> </li><?php }?>
                        </ul>
                        <!-- Social -->
                        <ul class="social">
                            <?php if (!empty($settings['twitter'])){?><li><a href="https://<?=$settings['twitter']?>"><i class="fa fa-twitter"></i></a></li><?php }?>
                            <?php if (!empty($settings['facebook'])){?><li><a href="https://<?=$settings['facebook']?>"><i class="fa fa-facebook"></i></a></li><?php }?>
                            <?php if (!empty($settings['linkedin'])){?><li><a href="https://<?=$settings['linkedin']?>"><i class="fa fa-linkedin"></i></a></li><?php }?>
                            <?php if (!empty($settings['instagram'])){?><li><a href="https://<?=$settings['instagram']?>"><i class="fa fa-instagram"></i></a></li><?php }?>
                            <?php if (!empty($settings['youtube'])){?><li><a href="https://<?=$settings['youtube']?>"><i class="fa fa-youtube"></i></a></li><?php }?>
                        </ul>
                        <!-- End Social -->
                    </div>
                    <!--/ End About -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Useful Links -->
                    <div class="single-widget list">
                        <ul>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>">Anasayfa</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>hakkimizda">Hakkımızda</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>yonerge">MSGSÜ SEM Yönerge</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>yonetmelik">MSGSÜ SEM Yönetmelik</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>KVKK-aydinlatma-metni.pdf" target="_blank">Kişisel Verilerin Korunmasına İlişkin Aydınlatma Metni</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>egitimler">Eğitimler</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>SEM_egitim_oneri_formu.doc">Eğitim Öneri Formu</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>galeri">Galeri</a></li>
                            <li style="display:none;"><i class="fa fa-angle-right"></i><a href="<?=$basedir?>egitmenler">Eğitmenlerimiz</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?=$basedir?>iletisim">İletişim</a></li>

                        </ul>
                    </div>
                    <!--/ End Useful Links -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Top -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p><a style="color:#FFF;" href="http://www.msgsu.edu.tr" target="_blank">Mimar Sinan Güzel Sanatlar Üniversitesi</a> © 2020 Tüm Hakları Saklıdır.</p>
                    </div>
                    <!--/ End Copyright -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Bottom -->
</footer>
<!--/ End Footer -->



<!-- Jquery JS-->

<script data-cfasync="false" src="themes/pkurg-eduland/assets/js/email-decode.min.js"></script><script src="themes/pkurg-eduland/assets/js/jquery-migrate.min.js"></script>
<!-- Colors JS-->
<script src="themes/pkurg-eduland/assets/js/colors.js"></script>
<!-- Popper JS-->
<script src="themes/pkurg-eduland/assets/js/popper.min.js"></script>
<!-- Bootstrap JS-->
<script src="themes/pkurg-eduland/assets/js/bootstrap.min.js"></script>
<!-- Owl Carousel JS-->
<script src="themes/pkurg-eduland/assets/js/owl.carousel.min.js"></script>
<!-- Jquery Steller JS -->
<script src="themes/pkurg-eduland/assets/js/jquery.stellar.min.js"></script>
<!-- Final Countdown JS -->
<script src="themes/pkurg-eduland/assets/js/finalcountdown.min.js"></script>
<!-- Fancy Box JS-->
<script src="themes/pkurg-eduland/assets/js/facnybox.min.js"></script>
<!-- Magnific Popup JS-->
<script src="themes/pkurg-eduland/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Circle Progress JS -->
<script src="themes/pkurg-eduland/assets/js/circle-progress.min.js"></script>
<!-- Nice Select JS -->
<script src="themes/pkurg-eduland/assets/js/niceselect.js"></script>
<!-- Jquery Steller JS-->
<script src="themes/pkurg-eduland/assets/js/jquery.stellar.min.js"></script>
<!-- Jquery Steller JS-->
<script src="themes/pkurg-eduland/assets/js/cube-portfolio.min.js"></script>
<!-- Slick Nav JS-->
<script src="themes/pkurg-eduland/assets/js/slicknav.min.js"></script>
<!-- Easing JS-->
<script src="themes/pkurg-eduland/assets/js/easing.min.js"></script>
<!-- Waypoints JS-->
<script src="themes/pkurg-eduland/assets/js/waypoints.min.js"></script>
<!-- Counter Up JS -->
<script src="themes/pkurg-eduland/assets/js/jquery.counterup.min.js"></script>
<!-- Scroll Up JS-->
<script src="themes/pkurg-eduland/assets/js/jquery.scrollUp.min.js"></script>
<!-- Gmaps JS-->
<!-- <script src="themes/pkurg-eduland/assets/js/gmaps.min.js"></script> -->
<!-- Main JS-->
<script src="themes/pkurg-eduland/assets/js/main.js"></script>
<script src="themes/pkurg-eduland/assets/js/framework.js"></script>
<script src="themes/pkurg-eduland/assets/js/framework.extras.js"></script>
<link rel="stylesheet" property="stylesheet" href="themes/pkurg-eduland/assets/css/framework.extras.css">
<?php if (isset($_GET['course'])){
?>
    <script>
        $('#registerPercentage').circleProgress({
            value:
            <?php
                $rate = floatval($courseDetail['courses_detail_registered'])/floatval($courseDetail['courses_detail_max_quota']);
            echo str_replace(",",".",$rate);
            ?>,
            size: 50.0,
            startAngle: Math.PI*3/2,
            thickness: 6,
            lineCap: "round",
            <?php if ($courseDetail['courses_detail_registered']<$courseDetail['courses_detail_min_quota']){ echo "fill: { color: '#ff0000' },"; } else { echo "fill: { color: '#05C46B' },";}?>
            emptyFill: 'rgba(0, 0, 0, .2)',
        });
    </script>
<?php

}?>


<?php if (isset($contactPage)){?>

    <script src="https://www.google.com/recaptcha/api.js?render=6LdvH7EUAAAAADqXgW-qH-UCiG52Hv1mWgrsHSsy"></script>
    <script>
        <?php if ($_GET['status']){?>
        setTimeout(function(){ $(".alert-success").alert('close');
            window.history.pushState("",document.title,"./iletisim");
        }, 7000);
        <?php } ?>

        grecaptcha.ready(function () {
            grecaptcha.execute('6LdvH7EUAAAAADqXgW-qH-UCiG52Hv1mWgrsHSsy', {action: 'iletisim'}).then(function (token) {
                let recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
<?php } ?>
<?php if (isset($coursePage)){?>

    <script src="https://www.google.com/recaptcha/api.js?render=6LdvH7EUAAAAADqXgW-qH-UCiG52Hv1mWgrsHSsy"></script>
    <script>
        <?php if ($_GET['status']){?>
        setTimeout(function(){ $(".alert-success").alert('close');
            window.history.pushState("",document.title,location.pathname);
        }, 7000);
        <?php } ?>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdvH7EUAAAAADqXgW-qH-UCiG52Hv1mWgrsHSsy', {action: 'course'}).then(function (token) {
                let recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
<?php } ?>
<!--Umut ÖRE - contact@umutore.com - https://umutore.com-->
<?php if ($settings['banner-display']==1 && !isset($_COOKIE['bannerShown'])){

    ?>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">MSGSÜ SEM - Webinar Serisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="#">
        <img src="/img/settings/<?=$settings['banner']?>" alt="SEM Webinar"/>
            <?php
            if (!empty($settings['banner-text'])&&$settings['banner-text']!==null&&$settings['banner-text']!="<p></p>"){
                echo $settings['banner-text'];
            }
            ?>
        </a>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
        $(".modal").modal('show');
    });
</script>
<?php } ?>
<style>
@media only screen and (min-width: 576px) {
.modal-dialog {
    max-width: 720px;
    }
}
</style>

</body>




</html>



