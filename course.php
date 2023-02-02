<?php require_once "header.php";
$item = $db->wread("courses", "courses_ident", $_GET['course']);
$item = $item->fetch(PDO::FETCH_ASSOC);
$date = date("Y-m-d", time());
$date = date('Y-m-d', strtotime($date . ' + 2 days'));
$courseDetail = $db->wread("courses_detail", "courses_detail_ident", $_GET['course'], ["columns_name" => "courses_detail_starting_date", "columns_sort" => "Asc", "today" => "courses_detail_starting_date", "limit" => 1, "operator" => ">="]);
$courseDetail = $courseDetail->fetch(PDO::FETCH_ASSOC);
$instructor=$db->wread("instructors","instructors_id",$courseDetail['courses_detail_instructor_id']);
$instructor=$instructor->fetch(PDO::FETCH_ASSOC);
$location=$db->wread("locations","locations_id",$courseDetail['courses_detail_location']);
$location=$location->fetch(PDO::FETCH_ASSOC);
$item = $db->wread("courses", "courses_id", $item['courses_id']);
$item = $item->fetch(PDO::FETCH_ASSOC);
if ($item == false){
    ?>
    <script>
        window.location=<?=$basedir?>
    </script>
    <?php
}
$coursePage=TRUE;



?>
    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2><?= $item['courses_title'] ?></h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Faqs -->
    <section class="courses section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12 order-2 order-md-1">
                    <!-- Single Course -->
                    <div class="single-course course-detail">
                        <!-- Course Head -->
                        <div class="course-head"><!--<img src="img/courses/$item['courses_file']" alt="#" id="itglh">-->
                            <style>
                                .msgsuWrapper{
                                    font-size: 3em!important;
                                }
                            </style>
                            <div class="msgsuWrapper <?=$courseDetail['courses_detail_color']?>">
                                <div>
                                    <div>
                                        <h3><?=$item['courses_subtitle']?></h3>
                                        <h2><?=$item['courses_title']?></h2>
                                    </div>
                                    <div><span><?=$instructor['instructors_title']?></span> <h3><?=$instructor['instructors_namesurname']?></h3></div>
                                    <div><?=$courseDetail['courses_detail_category']=="orgun"?"Yüz Yüze Eğitim":"Online Eğitim"?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Course Body -->
                        <div class="course-body" id="page">
                            <div class="name-price">
<?php
  if ($instructor['instructors_namesurname'] == "")
      $styleTeacher="style='display:none;'";
  else
      $styleTeacher="";
?>
                                <div class="teacher-info" <?=$styleTeacher; ?> ><img src="<?php if(!empty($instructor['instructors_file'])){echo 'img/instructors/'.$instructor['instructors_file'];} else { echo 'img/images/user.png';}?>" alt="<?=$instructor['instructors_title']?> <?=$instructor['instructors_namesurname']?>">
                                    <h4 class="title"><?=$instructor['instructors_title']?> <?=$instructor['instructors_namesurname']?></h4>
                                </div>
                            </div>
                            <h4 class="c-title" style="display:none;"><?=$item['courses_title']?></h4>
                            <?= $item['courses_about'] ?>
                            <hr>
                            <?= $item['courses_text'] ?>
                        </div><!-- Course Meta -->
                        <!--/ End Course Meta -->
                    </div>
                    <!--/ End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12 order-1 order-md-2">
                    <!-- Single Course -->
                    <div class="single-course">
                        <img src="https://sem.msgsu.edu.tr/img/courses/<?=$item['courses_file']?>" width="100%" height="450" />                      
                        <!-- Course Head -->
                        <div class="course-body pt-3 pb-3 ml-0">
                            <h2>Eğitim Detayları</h2>
                        </div>
                        <?php /* ?>
                        <div class="d-flex pb-3">
                            <div id="registerPercentage" class="img-responsive"></div>
                            <div class="pl-3">
                                <span class="h5">Kalan Kontenjan</span>
                                <br>
                                <span class="h6"><b><?= $courseDetail['courses_detail_min_quota'] ?></b> / <?= $courseDetail['courses_detail_registered'] ?> / <b><?= $courseDetail['courses_detail_max_quota'] ?></b></span>
                            </div>
                        </div>
                        <?php */ ?>
                        <div class="pt-3">
                            <?php /* ?>
                            <div class="h5"><i class="fa fa-calendar pr-3"></i><b>Başlangıç Tarihi: </b><span
                                        class="float-right"><?php
                                        $course_date = date("d.m.Y", strtotime($courseDetail['courses_detail_starting_date']));
                                        if ($course_date == "01.01.1970")
                                            echo "Pek yakında";
                                        else
                                            echo $course_date;
                                        ?></span></div>
                            <?php */ ?>
                            <div class="h5" style="height:30px;"><i class="fa fa-briefcase pr-3"></i><b>Kurs Ücreti: </b><span class="float-right"><?=$item['courses_price']?></span></div>
                            <div class="h5 row px-3"><i class="fa fa-clock-o pr-3"></i><b>Kurs Süresi: </b><div class="text-right ml-auto mr-0"><?= $courseDetail['courses_detail_length'] ?></div></div>
                            <div class="h5" style="height:30px;"><i class="fa fa-location-arrow pr-3"></i><b>Konum: </b><span class="float-right"><?=$location['locations_text']?></span></div>
                            <div class="h5" style="height:50px;"><i class="fa fa-calendar pr-3"></i><b>Eğitim Tarihi: </b><span class="float-right" style="width:150px;text-align:right;">
                                    <?php
                                echo strftime("%e %B %Y", strtotime($courseDetail['courses_detail_starting_date']));
                                ?></span></div>
                            <?php

                            ?>
                        </div>
                    </div>
                    <!--/ End Single Course -->

<section id="contact" class="contact">
                        <div class="single-course">
                            <h2 class="pb-3">Ön Başvuru</h2>
                            <div class="form-head">
                                <?php if (isset($_POST['registerInsert'])) {
                                $values['registers_namesurname'] = $_POST['registers_namesurname'];
                                $values['registers_email'] = $_POST['registers_email'];
                                $values['registers_phone'] = $_POST['registers_phone'];
                                $values['registers_text'] = $_POST['registers_text'];
                                $values['registers_courses_detail_id'] = $_POST['registers_courses_detail_id'];
                                $values['registers_created_date'] = date('Y-m-d');


                                        $sonuc = $db->insert("registers", $values, '');
                                        if ($sonuc['status']) {
                                            ?>
                                        <div class="alert alert-success">
                                            Kayıt Başarılı
                                        </div>
                                <?php
                                }} ?>
                                <form class="form" action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <i class="fa fa-user"></i>
                                                <input name="registers_namesurname" type="text" placeholder="Ad Soyad(Zorunlu)" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <i class="fa fa-envelope"></i>
                                                <input name="registers_email" type="email" placeholder="E-Posta (Zorunlu)" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <i class="fa fa-phone"></i>
                                                <input name="registers_phone" type="tel" placeholder="Telefon (Zorunlu)" required>
                                                <input type="hidden" name="registers_courses_detail_id" value="<?php echo $courseDetail['courses_detail_id']; ?>" />
                                            </div>
                                        </div>
                                        <style>span.current{position: relative; top: 50%;transform: translateY(-50%);display: block}</style>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <i class="fa fa-pencil"></i>
                                                <textarea name="registers_text" placeholder="Mesajınız"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="button">
                                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                                    <button type="submit" id="readyContact" class="btn primary w-100" name="registerInsert">Ön Başvuru Yap</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--/ End Contact Form -->
                            </div>
                        </div>
                    </section>


                </div>

                <div class="col-lg-8 col-md-6  col-12 order-3" style="display:none;">
                    <div class="single-course">
                        <h2 class="pb-3">SONRAKİ DÖNEMLER</h2>
                        <div class="pb-5">Eğitim bütçenizi ve diğer detayları düzenlemek için diğer dönemlerin bilgisine ihtiyaç duyabileceğinizi düşündüğümüzden dolayı bu bilgileri sizinle
                            paylaşıyoruz. Aşağıda sonraki dönemlerin başlangıç tarihlerini görebilirisiniz.
                        </div>
                        <div class="row">
                            <?php
                            $coursesDetail = $db->wread("courses_detail", "courses_detail_ident", $_GET['course'], ["columns_name" => "courses_detail_starting_date", "columns_sort" => "Asc", "today" => "courses_detail_starting_date", "limit" => 6, "date" => $date, "operator" => ">=", "offset"=>1]);
                            $coursesDetail = $coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($coursesDetail as $crs){

                                $instructor=$db->wread("instructors","instructors_id",$crs['courses_detail_instructor_id']);
                                $instructor=$instructor->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <div class="col-12 col-lg-4 col-12 py-3">
                                    <div class="item">
                                        <div class="date">
                                            <i class="fa fa-calendar pr-3"></i><?=date("d.m.Y", strtotime($crs['courses_detail_starting_date']))?>
                                        </div>
                                        <div  class="text-right d-flex"><i class="fa fa-address-card-o pr-3 pt-1"></i><?=$crs['courses_detail_title']?></div>
                                        <div class="d-flex"><i class="fa fa-users pr-3 pt-1"></i><span>Kontenjan:</span> <span class="ml-auto mr-0"><?=$crs['courses_detail_min_quota']?> / <?=$crs['courses_detail_registered']?> / <?=$crs['courses_detail_max_quota']?></span></div>
                                        <div class="text-right d-flex"><i class="fa fa-user pr-3 pt-1" style="padding-left: 2px"></i><span>Eğitmen:</span> <span><?=$instructor['instructors_title']." ".$instructor['instructors_namesurname']?></span></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/ End Blogs -->
<?php require_once "footer.php"; ?>


