<?php require_once "header.php";
?>

    <div class="content-wrapper">


        <section class="content">


            <div class="box box-primary">
                <div class="content-header">
                    <?php
                    $getRegisteryData = $db->wread("registers","registers_id",$_GET['id']);
                    $read = $getRegisteryData->fetchAll(PDO::FETCH_ASSOC)[0];

                    $a = $db->wread("courses","courses_id",$db->wread("courses_detail","courses_detail_id",$read['registers_courses_detail_id'])->fetch(PDO::FETCH_ASSOC)['courses_detail_title'])->fetch(PDO::FETCH_ASSOC)['courses_title'];
                    ?>
                    <h1 class="box-title"><?=$a." kursiyeri: <br> <br>" . $read['registers_namesurname']." adlı kişiye cevap yazılıyor."?></h1>
                    <h5><?=$read['registers_text']?></h5>
                </div>
                <div class="box-body">
                    <form role="form" style="padding: .5rem" method="post" enctype="multipart/form-data" action="mail-send-reply.php">
                        <!-- text input -->
                        <div class="form-group">
                            <label>E-Posta <br><small>E-posta adresi hatalı veya yanlış yazıldıysa bu noktadan gönderirken düzeltebilirsiniz</small></label>
                            <input type="email" class="form-control" name="email" placeholder="eposta@alanadi.uzanti" value="<?=$read['registers_email']?>">
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" class="form-control" name="title" placeholder="Bu mail hk.">
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label>Mesaj</label>
                            <textarea class="form-control" rows="9" id="textarea" name="msg" placeholder="Enter ..."></textarea>
                            <script src="bower_components/ckeditor/ckeditor.js"></script>
                            <script src="bower_components/ckeditor/config.js"></script>
                            <script>
                                CKEDITOR.replace( 'textarea' );
                            </script>
                        </div>
                        <input type="hidden" value="<?=$_GET['id']?>" name="registers_id">
                        <input type="submit" value="GÖNDER" class="btn btn-lg btn-success" style="width: 100%;">
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php require_once "footer.php"; ?>

