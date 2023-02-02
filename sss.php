<?php require_once "header.php"; ?>

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2>Sıkça Sorulan Sorular</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Faqs -->
    <section class="faqs section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="faq-image"><img src="themes/pkurg-eduland/assets/images/faq.jpg" alt="#" /></div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="faq-main">
                        <div class="faq-content">
                            <div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group">
                                <!-- Single Faq -->

                                <?php
                                $row=$db->read("faqs");
                                $row=$row->fetchAll(PDO::FETCH_ASSOC);
                                $i = 1;
                                foreach ($row as $item){
                                ?>
                                    <div class="panel panel-default">
                                        <div id="FaqTitle<?=$i?>" class="faq-heading">
                                            <h4 class="faq-title"><a data-toggle="collapse" data-parent="#accordion" href="#faq<?=$i?>" class="collapsed"><i class="fa fa-question"></i><?=$item['faqs_title']?></a></h4>
                                        </div>
                                        <div id="faq<?=$i?>" role="tabpanel" aria-labelledby="FaqTitle<?=$i?>" class="panel-collapse collapse">
                                            <div class="faq-body"><?=$item['faqs_text']?></div>
                                        </div>
                                    </div>
                                <?php $i++; }?>

                                <!--/ End Single Faq -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blogs -->
<?php require_once "footer.php"; ?>
