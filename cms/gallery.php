<?php require_once "header.php"; ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!--    <section class="content-header">-->
        <!--        <h1>-->
        <!--            Page Header-->
        <!--            <small>Optional description</small>-->
        <!--        </h1>-->
        <!--        <ol class="breadcrumb">-->
        <!--            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>-->
        <!--            <li class="active">Here</li>-->
        <!--        </ol>-->
        <!--    </section>-->

        <!-- Main content -->


        <section class="content">
            <!-- Default box -->
            <?php if (isset($_GET['galleriesDelete'])) {
                $sonuc = $db->delete("galleries","galleries_id",$_GET['galleries_id'],$_GET['file_delete']);
                if ($sonuc['status']) {
                    ?>
                    <div class="alert alert-success">
                        Silme Başarılı
                    </div>
                <?php } else {
                    ?>
                    <div class="alert alert-danger">
                        Silme Başarısız: <?=$sonuc['error']?>
                    </div>
                <?php }
            } ?>
            <?php if (isset($_GET['galleriesInsert'])) {
                $x = $db->qSql("SELECT COUNT(galleries_order) FROM galleries")->fetch(PDO::FETCH_ASSOC)["COUNT(galleries_order)"];

                $order = intval($x,10)+1;
                ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Resim Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['gallery_insert'])) {
                            $sonuc = $db->insert("galleries",$_POST,['form_name'=>"gallery_insert","dir"=>"galleries","file_name"=>"galleries_file"]);
                            if ($sonuc['status']) {
                                ?>
                                <div class="alert alert-success">
                                    Kayıt Başarılı
                                </div>
                            <?php } else {
                                ?>
                                <div class="alert alert-danger">
                                    Kayıt Başarısız: <?=$sonuc['error']?>
                                </div>
                            <?php }
                        } ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <label>Yüklü Resim</label>
                                    <img src="" id="cropper">
                                </div>
                                <div class="row col-xs-12 col-md-9">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="galleries_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="galleries_file" id="galleries_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="galleries_text">Açıklama (Zorunlu Değil)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="galleries_text" id="galleries_text"  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="file" id="file">
                                <input type="hidden" name="galleries_order" value="<?=$order?>">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="gallery_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['galleriesUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Resim Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['gallery_update'])) {
                                $sonuc = $db->update("galleries",$_POST,['form_name'=>"gallery_update","dir"=>"galleries","file_name"=>"galleries_file","columns"=>'galleries_id',"file_delete"=>"delete_file"]);
                                if ($sonuc['status']) {
                                    ?>
                                    <div class="alert alert-success">
                                        Kayıt Başarılı
                                    </div>
                                <?php
                                } else {
                                    ?>
                                    <div class="alert alert-danger">
                                        Kayıt Başarısız: <?=$sonuc['error']?>
                                    </div>

                                <?php }
                            }
                            $sql=$db->wread("galleries","galleries_id",$_GET['galleries_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Yüklü Resim</label>
                                        <img src="../img/galleries/<?=$row['galleries_file']?>" id="cropper">
                                    </div>
                                    <div class="row col-xs-12 col-md-9">
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="galleries_file">Resim Seç</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="file" name="galleries_file" id="galleries_file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="galleries_text">Ad Soyad</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="galleries_text" id="galleries_text" class="form-control" value="<?=$row['galleries_namesurname']?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="file" id="file">
                                <input type="hidden" name="galleries_id" value="<?=$row['galleries_id']?>">
                                <input type="hidden" name="delete_file" value="<?=$row['galleries_file']?>">
                                <div class="box-footer">
                                    <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                    <button class="btn pull-right btn-success" type="submit" name="gallery_update" id="send">Düzenle</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>

            <?php }?>
            <!-- /.box -->
            <!-- Default box -->
            <div class="box box-primary">
                <div class="content-header">
                    <h1 class="box-title">Galeri</h1 class="box-title">
                    <div class="pull-right"><a href="?galleriesInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->



                <div class="box-body" style="margin-top: 70px">
                    <div class="row p-2" id="sortable">
                        <?php $sql = $db->read("galleries",['columns_name'=>"galleries_order",'columns_sort'=>"ASC"]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-6 col-md-4 col-lg-3 pb-5" style="display: flex;flex-direction: column;" id="item-<?=$row['galleries_id']?>">
                                <div style="
-webkit-box-shadow: 0px 10px 5px 5px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 10px 5px 5px rgba(0,0,0,0.1);
box-shadow: 0px 10px 5px 5px rgba(0,0,0,0.1); border-radius: 5px;background-color: rgba(0,0,0,0.1)">
                                    <img src="../img/galleries/<?= $row['galleries_file'] ?>" style="width: 100%!important;cursor: move" class="img-responsive sortable" alt="">
                                    <p><?= $row['galleries_text'] ?></p>
                                    <div style="margin-top: auto;margin-bottom: 0;display: block;">
                                        <a href="?galleriesUpdate=true&galleries_id=<?=$row['galleries_id']?>" class="btn btn-warning" style="width: 50%;float: left;display: inline-block; border-radius: 0 0 0 5px;">
                                            <i class="fa fa-edit"></i> Düzenle
                                        </a>
                                        <a href="?galleriesDelete=true&galleries_id=<?=$row['galleries_id']?>&file_delete=<?=$row['galleries_file']?>" class="btn btn-danger" style="width: 50%;float: right;display: inline-block; border-radius: 0 0 5px 0;">
                                            <i class="fa fa-trash-o"></i> Sil
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php require_once "footer.php"; ?>

<script>
    $(function() {
        $("#sortable").sortable({
            revert:true,
            handle:".sortable",
            stop:function(event,ui) {
                let data=$(this).sortable('serialize');
                console.log(data);
                $.ajax({
                    type:"POST",
                    dataType:"json",
                    data:data,
                    url:"netting/order-ajax2.php?gallery_order=true",
                    success:function(msg) {
                        console.log(msg);
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });
</script>
