<?php require_once "header.php"; ?>
    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2>Galeri</h2>
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
                        <h2>Galeri</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php $sql = $db->read("galleries",['columns_name'=>"galleries_order",'columns_sort'=>"ASC"]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                    <div class="col-lg-4 col-md-6 col-9">
                        <img src="img/galleries/<?=$row['galleries_file']?>"  class="img-responsive img-thumbnail" style="margin-bottom:20px;"  />
                    </div>
                    <?php }
                
?>                
            </div>
        </div>
    </section>
    <!--/ End Courses -->


<?php require_once "footer.php"; ?>


