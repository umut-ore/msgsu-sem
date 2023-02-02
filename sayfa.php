<?php require_once "header.php"; ?>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <section class="home-slider">
<div id="carouselExampleIndicators" class="home-slider carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="container" style="position: relative;">
            <div class="row" style="position:absolute;">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Slider Content -->
                    <div class="slider-content">
                        <h1 class="slider-title">Eğitimlerimiz devam ediyor</h1>
                        <p class="slider-text" style="background-color:#ea5a0c;color:#FFF;">MSGSÜ SEM farklı alanlarda uzmanlaşma imkânı sunuyor, tüm belgeler e-Devlet üzerinden veriliyor</p><!-- Button -->
                        <!--/ End Button -->
                    </div>
                    <!--/ End Slider Content -->
                </div>
            </div>
        </div>
      <img class="d-block w-100" src="https://sem.msgsu.edu.tr/img/images/slider-msgsu-sem.jpg" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </section>
    <!--/ End Slider Area -->
    <!-- Courses -->
    <section class="courses section">
        <div class="container" style="max-width: 1600px!important;">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12 order-md-1 order-3 pt-5 pt-md-0">
                    <div class="section-title bg">
                        <h2>Duyurular</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12 order-md-2 order-1">
                    <div class="section-title bg">
                        <h2>Güncel Eğitimlerimiz</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-12 order-md-3 order-4">
                    <section class="events section bg-transparent p-0 pr-3">
                        <div class="coming-event">
                            <?php
                            $date = date("Y-m-d",time());
                            $events = $db->read("announcements",["columns_name"=>"announcements_date","columns_sort"=>"Desc","today"=>"announcements_date","limit"=>5,"date"=>$date,"operator"=> "<="]);
                            $events=$events->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($events as $item){
                                ?>
                                <div class="single-event">
                                    <div class="event-date">
                                        <p><?=date("d",strtotime($item['announcements_date']))?><span><?=strftime("%B <br> %Y",strtotime($item['announcements_date']))?></span></p>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="event-title"><?=$item['announcements_title']?></h3>
                                        <?=$item['announcements_text']?>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </section>
                    <br>
                    <a class="btn  btn-prrimary col-12" href="/duyurular">Tüm Duyuruları Göster</a>
                </div>
                <div class="col-lg-8 col-md-7 col-12 order-md-4 order-2">

                     
 <style>
 @import url('https://fonts.googleapis.com/css?family=Roboto:300');

.contenedor {
	height: 100%;
	padding: 5% 0;
}

h1 {
	color: #FCFBFA;
}

.container_foto {
	background-color: rgba(57, 62, 93, 0.7);
	padding: 0;
	overflow: hidden;
    max-height:200px;
	margin: 5px;
}

.container_foto article {
	padding: 10%;
	position: absolute;
	bottom: 0;
	z-index: 1;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.container_foto h2 {
	color: #fff;
	font-weight: 800;
	font-size: 25px;
	border-bottom: #fff solid 1px;
}

.container_foto h4 {
	font-weight: 300;
	color: #fff;
	font-size: 16px;
}

.container_foto img {
	width: 100%;
	top: 0;
	left: 0;
	opacity: 0.4;
	-webkit-transition: all 4s ease;
	-moz-transition: all 4s ease;
	-o-transition: all 4s ease;
	-ms-transition: all 4s ease;
	transition: all 4s ease;
}

.ver_mas {
	background-color: #FEB66C;
	position: absolute;
	width: 100%;
	height: 70px;
	bottom: 0;
	z-index: 1;
	opacity: 0;
	transform: translate(0px, 70px);
	-webkit-transform: translate(0px, 70px);
	-moz-transform: translate(0px, 70px);
	-o-transform: translate(0px, 70px);
	-ms-transform: translate(0px, 70px);
	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-ms-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

.ver_mas span {
	font-size: 40px;
	color: #fff;
	position: relative;
	margin: 0 auto;
	width: 100%;
	top: 13px;
}


/*hovers*/

.container_foto:hover {
	cursor: pointer;
}

.container_foto:hover img {
	opacity: 0.1;
	transform: scale(1.5);
}

.container_foto:hover article {
	transform: translate(2px, -69px);
	-webkit-transform: translate(2px, -69px);
	-moz-transform: translate(2px, -69px);
	-o-transform: translate(2px, -69px);
	-ms-transform: translate(2px, -69px);
}

.container_foto:hover .ver_mas {
	transform: translate(0px, 0px);
	-webkit-transform: translate(0px, 0px);
	-moz-transform: translate(0px, 0px);
	-o-transform: translate(0px, 0px);
	-ms-transform: translate(0px, 0px);
	opacity: 1;
}





 </style>
                            
                            
                            
                            
                    <div class="row">
 
 <section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
 

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=1">
      <div class="col-12 container_foto">
      <div class="ver_mas text-center">
            <span  class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>GÜZEL SANATLAR <br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt01.jpg" alt="">
      </div>
      </a>
 	  </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=2#scroll1">
      <div class="col-12 container_foto">
 		<div class="ver_mas text-center">
            <span id="click" class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>MİMARLIK - PEYZAJ - BİLİMSEL RAPOR<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt02.jpg" alt="">
      </div>
      </a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=3#scroll1">
      <div class="col-12 container_foto">
         <div class="ver_mas text-center">
            <span class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>TASARIM<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt03.jpg" alt="">
      </div>
      </a>
      </div>
     
 
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=4#scroll1">
      <div class="col-12 container_foto">
      <div class="ver_mas text-center">
            <span  class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>SAHNE SANATLARI <br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt04.jpg" alt="">
      </div>
      </a>
 	  </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=5#scroll1">
      <div class="col-12 container_foto">
 		<div class="ver_mas text-center">
            <span id="click" class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>BİLİŞİM TEKNOLOJİLERİ<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt05.jpg" alt="">
      </div>
      </a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=6#scroll1">
      <div class="col-12 container_foto">
         <div class="ver_mas text-center">
            <span class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>TARİH, KÜLTÜR ve EDEBİYAT<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt06.jpg" alt="">
      </div>
      </a>
      </div>
 
 
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=7#scroll2">
      <div class="col-12 container_foto">
      <div class="ver_mas text-center">
            <span  class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>KİŞİSEL GELİŞİM<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt07.jpg" alt="">
      </div>
      </a>
 	  </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=8#scroll2">
      <div class="col-12 container_foto">
 		<div class="ver_mas text-center">
            <span id="click" class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>EĞİTİM BİLİMLERİ<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt08.jpg" alt="">
      </div>
      </a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=9#scroll2">
      <div class="col-12 container_foto">
         <div class="ver_mas text-center">
            <span class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>KOÇLUK<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt09.jpg" alt="">
      </div>
      </a>
      </div>
 
 
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=12#scroll2">
      <div class="col-12 container_foto">
      <div class="ver_mas text-center">
            <span  class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>TÜRKÇE HAZIRLIK<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt12.jpg" alt="">
      </div>
      </a>
 	  </div>
      
 	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=11#scroll3">
      <div class="col-12 container_foto">
      <div class="ver_mas text-center">
            <span  class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>RESTORASYON ve KONSERVASYON<br>EĞİTİMLERİ</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt11.jpg" alt="">
      </div>
      </a>
 	  </div>
 
 
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a href="/egitimler2?egt=10#scroll3">
      <div class="col-12 container_foto">
      <div class="ver_mas text-center">
            <span  class="lnr lnr-eye"></span>
         </div>
         <article class="text-left">
            <h2>DİĞER<br>EĞİTİMLER</h2>
            <h4>İncelemek için tıklayınız...</h4>
         </article>
         <img src="/img/egt10.jpg" alt="">
      </div>
      </a>
 	  </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a href="https://sem.msgsu.edu.tr/iletisim">
      <div class="col-12 container_foto">
 		<div class="ver_mas text-center">
            <span id="click" class="lnr lnr-pencil"></span>
         </div>
         <article class="text-left">
            <h2>EĞİTİM TALEPLERİNİZ İÇİN BİZE YAZIN</h2>
            <h4>sem@msgsu.edu.tr</h4>
         </article>
         <img src="/img/bizeyazin.jpg" alt="">
      </div>
      </a>
      </div>
      
 
 
 
 
 
 
 
 
 
 
 
 
 
                       
      </div>
    </div>
  </div>
</section>                            
 
                            
                            
                            
                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Courses -->
    <!-- Features -->
    <div data-stellar-background-ratio="0.5" class="features overlay section" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                        <div class="icon-img"><img src="themes/pkurg-eduland/assets/images/feature1.jpg" alt="#" /><i class="fa fa-clone"></i></div>
                        <div class="feature-content">
                            <h4 class="f-title">Alanında Uzman ve Yetkin Eğitmenler</h4>
                        </div>
                    </div>
                    <!--/ End Single Feature -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                        <div class="icon-img"><img src="themes/pkurg-eduland/assets/images/feature2.jpg" alt="#" /><i class="fa fa-book"></i></div>
                        <div class="feature-content">
                            <h4 class="f-title">Güncel Eğitim İçerikleri ve Programları</h4>
                        </div>
                    </div>
                    <!--/ End Single Feature -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                        <div class="icon-img"><img src="themes/pkurg-eduland/assets/images/feature1.jpg" alt="#" /><i class="fa fa-institution"></i></div>
                        <div class="feature-content">
                            <h4 class="f-title">İş Hayatına Yönelik Pratik Uygulamalar</h4>
                        </div>
                    </div>
                    <!--/ End Single Feature -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                        <div class="icon-img"><img src="themes/pkurg-eduland/assets/images/feature3.jpg" alt="#" /><i class="fa fa-users"></i></div>
                        <div class="feature-content">
                            <h4 class="f-title">MSGSÜ Onaylı Sertifika veya Katılım Belgesi</h4>
                        </div>
                    </div>
                    <!--/ End Single Feature -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Features -->
    <!-- Events -->
<?php /*
    <section class="events section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="section-title bg">
                        <h2>Güncel Duyurular</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="coming-event">
                        <?php
                        $date = date("Y-m-d",time());
                        $events = $db->read("announcements",["columns_name"=>"announcements_date","columns_sort"=>"Desc","today"=>"announcements_date","limit"=>50,"date"=>$date,"operator"=> "<="]);
                        $events=$events->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($events as $item){
                        ?>
                            <div class="single-event">
                                <div class="event-date">
                                    <p><?=date("d",strtotime($item['announcements_date']))?><span><?=strftime("%B",strtotime($item['announcements_date']))?></span></p>
                                </div>
                                <div class="event-content">
                                    <h3 class="event-title"><?=$item['announcements_title']?></h3>
                                    <?=$item['announcements_text']?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
 */ ?>
    <!--/ End Events -->
    <!-- Clients CSS -->
    <div class="clients" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="text-content">
                        <h3>Kurumsal<br />Referanslarımız</h3>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="client-slider">
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client1.png" alt="#" /></a></div>
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client2.png" alt="#" /></a></div>
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client3.png" alt="#" /></a></div>
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client4.png" alt="#" /></a></div>
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client5.png" alt="#" /></a></div>
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client1.png" alt="#" /></a></div>
                        <div class="single-slider"><a href="#"><img src="themes/pkurg-eduland/assets/images/client2.png" alt="#" /></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Clients CSS -->

<?php require_once "footer.php"; ?>

