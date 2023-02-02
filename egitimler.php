<?php require_once "header.php"; ?>
    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2>Eğitimlerimiz</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Courses -->
    <section class="courses section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="section-title bg">
                        <h2>Güncel Eğitimlerimiz</h2>
                    </div>
                </div>
            </div>






            <div class="row">
                <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                    $course=$db->wread("courses","courses_ident",$courseDetail['courses_detail_ident']);
                    $course=$course->fetch(PDO::FETCH_ASSOC);

                    $instructor=$db->wread("instructors","instructors_id",$courseDetail['courses_detail_instructor_id']);
                    $instructor=$instructor->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-lg-4 col-md-6 col-9">
                        <!-- Single Course -->
                        <div class="single-course">
                            <!-- Course Head -->
                            <div class="course-head">
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

                               <!-- <img src="img/courses/<?/*=$course['courses_file']*/?>" alt="#" id="itglh"  onclick='window.location="<?/*=$basedir."kurslar/".$courseDetail['courses_detail_ident']*/?>"'/>--><a href="kurslar/<?=$db->seoUrl($courseDetail['courses_detail_ident'])?>" class="btn white primary">Kayıt Ol</a></div><!-- Course Body -->
                            <div class="course-body">
<?php
if ($instructor['instructors_namesurname'] == "")
    $stylePrice="style='display:none;'";
else
    $stylePrice="";
?>
                                <div class="name-price" <?=$stylePrice; ?> >
                                    <div class="teacher-info"><img src="<?php if(!empty($instructor['instructors_file'])){echo 'img/instructors/'.$instructor['instructors_file'];} else { echo 'img/images/user.png';}?>" alt="<?=$instructor['instructors_title']?> <?=$instructor['instructors_namesurname']?>">
                                        <h4 class="title"><?=$instructor['instructors_title']?> <?=$instructor['instructors_namesurname']?></h4>
                                    </div></span>
                                </div>
                            </div><!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--/ End Courses -->
<?php require_once "footer.php"; ?>

