<?php require_once "header.php"; ?>
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
                            $events = $db->read("announcements",["columns_name"=>"announcements_date","columns_sort"=>"Desc","today"=>"announcements_date","limit"=>50,"date"=>$date,"operator"=> "<="]);
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
                </div>
                <div class="col-lg-8 col-md-7 col-12 order-md-4 order-2">

                    <div class="row">
                        <?php
                        $date = date("Y-m-d",time());
                        $date = date('Y-m-d', strtotime($date. ' + 2 days'));
                        $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                        $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($coursesDetail as $courseDetail){
                            $course=$db->wread("courses","courses_ident",$courseDetail['courses_detail_ident']);
                            $course=$course->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="col-lg-4 col-md-6 col-9">
                                <!-- Single Course -->
                                <div class="single-course">
                                    <!-- Course Head -->
                                    <div class="course-head">
                                        <?php

                                        $instructor=$db->wread("instructors","instructors_id",$courseDetail['courses_detail_instructor_id']);
                                        $instructor=$instructor->fetch(PDO::FETCH_ASSOC);
                                        /*
                                        <img src="img/courses/<?=$course['courses_file']?>" alt="#" id="itglh"  onclick='window.location="<?=$basedir."kurslar/".$courseDetail['courses_detail_ident']?>"'/>
                                         */?>
                                        <div class="msgsuWrapper <?=$courseDetail['courses_detail_color']?>">
                                            <div>
                                                    <img src="https://sem.msgsu.edu.tr/img/courses/<?=$course['courses_file']?>" width="600" height="600" />
                                                <div>
                                                    <h3><?=$course['courses_subtitle']?></h3>
                                                    <h2><?=$course['courses_title']?></h2>
                                                </div>
                                                <div><span><?=$instructor['instructors_title']?></span> <h3><?=$instructor['instructors_namesurname']?></h3></div>
                                                <div><?=$courseDetail['courses_detail_category']=="orgun"?"Yüz Yüze Eğitim":"Online Eğitim"?></div>
                                            </div>
                                        </div>
                                        <a href="kurslar/<?=$db->seoUrl($courseDetail['courses_detail_ident'])?>" class="btn white primary">Kayıt Ol</a>
                                    </div><!-- Course Body -->

                                    <?php /*
                                    <div class="course-body">
                                        <?php
                                        if ($instructor['instructors_namesurname'] == "")
                                            $stylePrice="style='display:none;'";
                                        else
                                            $stylePrice="";
                                        ?>
                                        <div class="name-price" <?=$stylePrice; ?> >
                                            <div class="teacher-info"><img src="<?php if(!empty($instructor['instructors_file'])){echo 'img/instructors/'.$instructor['instructors_file'];} else { echo 'img/images/user.png';}?>" alt="<?=$instructor['instructors_title']?> <?=$instructor['instructors_namesurname']?>" class="ofi">
                                                <h4 class="title"><?=$instructor['instructors_title']?> <?=$instructor['instructors_namesurname']?></h4>
                                            </div>
                                        </div>
                                    </div><!-- Course Meta -->
                                    <div class="course-meta" style="display:none;">
                                        <!-- Rattings -->
                                        <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                                    </div>
 */ ?>
                                    <!--/ End Course Meta -->
                                </div>
                                <!--/ End Single Course -->
                            </div>
                        <?php } ?>
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

