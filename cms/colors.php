<?php require_once "header.php";
$sql2=$db->read("colors");
$row2=$sql2->fetchAll(PDO::FETCH_ASSOC);
?>


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
            <?php if (isset($_GET['colorsDelete'])) {
                $sonuc = $db->delete("colors","colors_id",$_GET['colors_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['colorsInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Renk Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['color_insert'])) {
                            $sonuc = $db->insert("colors",$_POST,['form_name'=>"color_insert"]);
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
                                <div class="row col-xs-12">
                                    <div class="form-group col-xs-12 col-md-4">
                                        <label for="colors_name">Renk Adı (Yeşil)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="colors_name" id="colors_name" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-4">
                                        <label for="colors_class_name">Renk Class Adı (yesil) (Türkçe karakter ve boşluk olmadan)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="colors_class_name" id="colors_class_name" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-4">
                                        <label for="colors_hex">Renk Hex Kodu (#a0a0a0)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="colors_hex" id="colors_hex" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn pull-right btn-success" type="submit" name="color_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['colorsUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">SSS Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['color_update'])) {
                                $sonuc = $db->update("colors",$_POST,['form_name'=>"color_update","columns"=>'colors_id']);
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
                            $sql=$db->wread("colors","colors_id",$_GET['colors_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="row col-xs-12">
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="colors_title">SSS Başlığı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="colors_title" id="colors_title" required class="form-control" value="<?=$row['colors_title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="editor1">SSS Yazısı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <textarea name="colors_text" id="editor1" class="form-control"><?=$row['colors_text']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="colors_id" value="<?=$row['colors_id']?>">
                                <div class="box-footer">
                                    <button class="btn pull-right btn-success" type="submit" name="color_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Renkleri Listele</h1 class="box-title">
                    <div class="pull-right"><a href="?colorsInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h1>UYARI: Kullanılan renkleri silmek sisteme zarar verir, <br>başka bir yerde kullanılmadığından emin olunuz!</h1>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Renk Adı</th>
                            <th>Renk Class Adı</th>
                            <th>Hex Kodu</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sql = $db->read("colors");
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr id="item-<?=$row['colors_id']?>">
                                <td><?= $i++ ?></td>
                                <td><?= $row['colors_name'] ?></td>
                                <td><?= $row['colors_class_name'] ?></td>
                                <td style="background: <?=$row['colors_hex']?>; "><?= $row['colors_hex'] ?></td>
                                <td><a href="?colorsDelete=true&colors_id=<?=$row['colors_id']?>&file_delete=<?=$row['colors_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Renk Adı</th>
                            <th>Renk Class Adı</th>
                            <th>Hex Kodu</th>
                            <th>Düzenle</th>
                        </tr>
                        </tfoot>
                    </table>
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
                    url:"netting/order-ajax.php?colors_must=true",
                    success:function(msg) {
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });
</script>
