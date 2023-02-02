<?php require_once "header.php";
$item=$db->wread("pages","pages_url",$_GET['page']);
$item=$item->fetch(PDO::FETCH_ASSOC);
if ($item == false){
    ?>
    <script>
        window.location=<?=$basedir?>
    </script>
    <?php
}
?>
    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2><?=$item['pages_title']?></h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Faqs -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <?php if (!empty($item['pages_file'])){?>
                    <div class="faq-image"><img src="img/pages/<?=$item['pages_file']?>" alt="<?=$item['pages_title']?>" /></div>
                    <?php } else { ?>
                    <div class="faq-image"><img src="themes/pkurg-eduland/assets/images/faq6.jpg" alt="<?=$item['pages_title']?>" /></div>
                    <?php } ?>
                </div>                                
                <div class="col-lg-7 col-12" id="page">
                    <h1><?=$item['pages_title']?></h1>
                    <?=$item['pages_text']?>
                    <p></p>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blogs -->
<?php require_once "footer.php"; ?>
