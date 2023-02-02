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

<?php
$egt = $_GET['egt'];
?>


<div id="accordion" >

  <div class="card" id="scroll1">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        <h4>Güzel Sanatlar Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseOne" class="collapse <?php if($egt=="1"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("10","59","60","99","100","106","107","108","121");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>

                
                
     <div class="card" >
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseTwo">
        <h4>Mimarlık-Peyzaj-Bilimsel Rapor Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseTwo" class="collapse <?php if($egt=="2"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("13","17","18","42","45","67","86","87","88");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>             
                

                
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseThree">
        <h4>Tasarım Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseThree" class="collapse <?php if($egt=="3"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("24","56","63","64","81","82","85","91","92","120","122","124");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>             
                
                
    <div class="card" id="scroll2">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseFour">
        <h4>Sahne Sanatları Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseFour" class="collapse <?php if($egt=="4"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("26","41","50","54","102");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                 
                
                
                
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseFive">
        <h4>Bilişim Teknolojileri Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseFive" class="collapse <?php if($egt=="5"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("28","29","58","65","66","68","77","78","79","101","118");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                   
                
                
                
                
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseSix">
        <h4>Tarih, Kültür ve Edebiyat Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseSix" class="collapse <?php if($egt=="6"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("12","20","27","30","38","40","51","57","62","123");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                   
                
                
                
  <div class="card" id="scroll3">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseSeven">
        <h4>Kişisel Gelişim Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseSeven" class="collapse <?php if($egt=="7"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("16","23","35","52","95","96","97","98");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                   
                
                
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseEight">
        <h4>Eğitim Bilimleri Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseEight" class="collapse <?php if($egt=="8"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("70","71","72","73","74","75","76");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                   
                
                
    <div class="card" >
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseNine">
        <h4>Koçluk Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseNine" class="collapse <?php if($egt=="9"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("14");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                  
                
  
                
                <div class="card" >
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseTwelve">
        <h4>Türkçe Hazırlık Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseTwelve" class="collapse <?php if($egt=="12"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("15");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                  
                
                
                
                
                
 
<div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseEleven">
        <h4>Restorasyon ve Konservasyon Eğitimleri</h4>
      </a>
    </div>
    <div id="collapseEleven" class="collapse <?php if($egt=="11"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("48","90","104","105","115","126");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>                
      </div>
    </div>
  </div>                  
                             
                
                
                
<div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseTen">
        <h4>Diğer Eğitimler</h4>
      </a>
    </div>
    <div id="collapseTen" class="collapse <?php if($egt=="10"){ echo "show";} ?>" data-parent="#accordion">
      <div class="card-body">
        
 <div class="row">
 <?php
                $date = date("Y-m-d",time());
                $coursesDetail = $db->read("courses_detail",["columns_name"=>"courses_detail_order_num","columns_sort"=>"ASC"]);
                $coursesDetail=$coursesDetail->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coursesDetail as $courseDetail){
                   
                
                    
                    $courseArray=array("9","34","36","53","116","119","125");
                    //echo $courseDetail['courses_detail_title'];
                    //echo "<br>";
                    if (in_array($courseDetail['courses_detail_title'],$courseArray)) {

                
                    
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
<!-- Course Meta -->
                            <div class="course-meta" style="display:none;">
                                <!-- Rattings -->
                                <div class="course-info"><span><i class="fa fa-calendar-o"></i><?=$courseDetail['courses_detail_length']?></span></div>
                            </div>
                            <!--/ End Course Meta -->
                        </div>
                        <!--/ End Single Course -->
                    </div>
                <?php }} ?>

</div>




      </div>
    </div>
  </div>                      
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
 <hr/>               
  <?php require_once "footer.php"; ?>


