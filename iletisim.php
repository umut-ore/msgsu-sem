<?php require_once "header.php"; $contactPage=TRUE;?>
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" style="background-image:url('themes/pkurg-eduland/assets/images/breadcrumb-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h2>Bize Ulaşın</h2>
            </div>
        </div>
    </div>
</div>
<!--/ End Breadcrumb -->

<!-- Contact Us -->
<section id="contact" class="contact section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="section-title bg">
                    <h2>Bize <span>Ulaşın</span></h2>
                    <p>Aklınızda soru işaretleri mi kaldı? Daha fazla bilgi mi almak istiyorsunuz? Aşağıdaki formu doldurarak bize ulaşabilirsiniz.</p>
                    <div class="icon"><i class="fa fa-paper-plane"></i></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="form-head">
                    <!-- Contact Form --><?php if ($_GET['status']==1){
                        ?>
                        <div class="alert alert-success text-center" role="alert">
                            Mesajınız Başarı ile Gönderildi.
                        </div>
                        <?php
                    }?>
                    <form class="form" action="mail.php" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <i class="fa fa-user"></i>
                                    <input name="first_name" type="text" placeholder="Ad (Zorunlu)" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <i class="fa fa-envelope"></i>
                                    <input name="last_name" type="text" placeholder="Soyad (Zorunlu)" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <i class="fa fa-envelope"></i>
                                    <input name="email" type="email" placeholder="E-Posta (Zorunlu)" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group message">
                                    <i class="fa fa-pencil"></i>
                                    <textarea name="message" placeholder="Mesajınız (Zorunlu)" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="button">
                                        <input type="text" class="d-none" name="breakFree" placeholder="Doldurmayınız" id="breakFree">
                                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse" value="6Lfs2MAZAAAAAPQ-fSdCIpsmnSH73sLTIuAjmG8k">
                                        <button type="submit" id="readyContact" class="btn primary w-100">Mesaj Gönder</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Contact Form -->
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="contact-right">
                    <!-- Contact-Info -->
                    <?php if (!empty($settings['adres'])){?>
                    <div class="contact-info">
                        <div class="icon"><i class="fa fa-map"></i></div>
                        <h3>Adresimiz</h3>
                        <p><?=$settings['adres']."<br> ".$settings['ilce']." / ".$settings['il']?></p>
                    </div>
                    <?php } ?>
                    <?php if (!empty($settings['phone']) OR !empty($settings['email']) OR !empty($settings['fax'])){?>
                    <!-- Contact-Info -->
                    <div class="contact-info">
                        <div class="icon"><i class="fa fa-envelope"></i></div>
                        <h3>İletişim Bilgileri</h3>
                        <?php if (!empty($settings['email'])){?><p>Email: <a href="mailto:<?=$settings['email']?>"><?=$settings['email']?></a> </p><?php }?>
                        <?php if (!empty($settings['phone'])){?><p>Telefon: <a href="tel:<?=str_replace(' ', '', $settings['phone'])?>"><?=$settings['phone']?></a> </p><?php }?>
                        <?php if (!empty($settings['fax'])){?><p>Faks: <a href="fax:+90<?=str_replace(' ', '', $settings['fax'])?>"><?=$settings['fax']?></a> </p><?php }?>
                    </div>
                    <?php } ?>
                    <!-- Contact-Info -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Us -->
<?php require_once "footer.php"; ?>

