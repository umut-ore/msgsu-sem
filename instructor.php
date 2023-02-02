<?php require_once "header.php";
$item = $db->wread("instructors", "instructors_url", $_GET['instructor']);
$item = $item->fetch(PDO::FETCH_ASSOC);

if ($item === false){
    ?>
    <script>
        window.location=<?=$basedir?>
    </script>
    <?php
}
$instructorPage=TRUE;
?>
    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2><?= $item['instructors_title'] . " " . $item['instructors_namesurname']?></h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Faqs -->
    <section class="courses section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-3 mt-md-0">
                    <!-- Single instructor -->
                    <div class="single-course h-100">
                        <!-- instructor Head -->
                        <div class="course-head"><img src="<?php if (!empty($item['instructors_file'])){echo'img/instructors/'.$item['instructors_file'];} else {echo 'img/images/user.png';}?>" alt="<?=$instructor['instructors_namesurname']?>" /></div>
                        <!-- instructor Body -->
                    </div>
                    <!--/ End Single instructor -->
                </div>
                <div class="col-lg-8 col-md-6 col-12 mt-3 mt-md-0">
                    <!-- Single instructor -->
                    <div class="single-course h-100">
                        <!-- instructor Head -->
                        <div class="course-body" id="page">
                            <h1><?=$item['instructors_title']." ".$item['instructors_namesurname']?></h1>
                            <?=$item['instructors_resume']?>
                        </div><!-- instructor Meta -->
                        <!--/ End instructor Meta -->
                    </div>
                    <!--/ End Single instructor -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blogs -->
<?php require_once "footer.php"; ?>

