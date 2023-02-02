<?php require_once "header.php";
$item = $db->wread("locations", "locations_url", $_GET['location']);
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
                    <h2><?= $item['locations_title']?></h2>
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
                        <div class="course-head"><img src="<?php if (!empty($item['locations_file'])){echo'img/locations/'.$item['locations_file'];} else {echo 'img/images/user.png';}?>" alt="<?=$instructor['locations_namesurname']?>" /></div>
                        <!-- instructor Body -->
                        <div class="course-body">
                            <div class="name-price">
                                <span class="price"><?=$item['locations_title']." ".$item['locations_namesurname']?></span>
                            </div>
                        </div><!-- instructor Meta -->
                        <div class="course-meta border-0 ml-0 w-100">
                            <!-- Rattings -->
                            <?php if (!empty($item['locations_mail'])){?>
                                <div class="course-info"><span><i class="fa fa-envelope"></i></span><a href="mailto:<?=$item['locations_mail']?>" class="float-right"><?=$item['locations_mail']?></a></div>
                            <?php } ?>
                            <?php if (!empty($item['locations_phone'])){?>
                                <div class="course-info"><span><i class="fa fa-phone"></i></span><a href="tel:<?=str_replace(' ','',str_replace('-','',$item['locations_phone']))?>" class="float-right"><?=$item['locations_phone']?></a></div>
                            <?php } ?>
                            <div class="course-info"><span><i class="fa fa-location-arrow"></i></span><a href="<?php if (!empty($item['locations_maps_url'])){ echo $item['locations_maps_url']; } else { echo 'javascript:void(0)'; }?>" class="float-right"><?=$item['locations_address']?></a></div>
                        </div>
                        <!--/ End instructor Meta -->
                    </div>
                    <!--/ End Single instructor -->
                </div>
                <div class="col-lg-8 col-md-6 col-12 mt-3 mt-md-0">
                    <!-- Single instructor -->
                    <?php if (!empty($item['locations_maps'])){?>
                        <div class="single-course mb-3">
                        <div class="course-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?=$item['locations_maps']?>"></iframe>
                            </div>
                        </div><!-- instructor Meta --></div>
                    <?php } ?>
                    <div class="single-course">
                        <!-- instructor Head -->
                        <div class="course-body">

                            <?=$item['locations_text']?>
                        </div><!-- instructor Meta -->
                        <!--/ End instructor Meta -->
                    </div>
                    <!--/ End Single instructor -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <!--/ End Blogs -->
<?php require_once "footer.php"; ?>
