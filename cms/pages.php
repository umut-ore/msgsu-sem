<?php require_once "header.php"; ?>

    <style>
        .sortable {
            cursor:move;
        }
    </style>
    <!-- Content Wrapper. Contains Sayfa content -->
    <div class="content-wrapper">
        <!-- Content Header (Sayfa header) -->
        <!--    <section class="content-header">-->
        <!--        <h1>-->
        <!--            Sayfa Header-->
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
            <?php if (isset($_GET['pagesDelete'])) {
                $sonuc = $db->delete("pages","pages_id",$_GET['pages_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['pagesInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Sayfa Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['page_insert'])) {
                            $url=$db->seoUrl($_POST['pages_title']);
                            $sonuc = $db->insert("pages",$_POST,['form_name'=>"page_insert","dir"=>"pages","file_name"=>"pages_file","url"=>$url]);
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
                                <div class="form-group col-xs-12 col-md-6">
                                    <label for="pages_file">Resim Seç</label>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="file" name="pages_file" id="pages_file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-md-6">
                                    <label for="pages_title">Sayfa Başlığı</label>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" name="pages_title" id="pages_title" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <textarea name="pages_text" id="editor1" class="form-control"></textarea>
                            </div>
                            <div class="box-footer">
                                <button class="btn pull-right btn-success" type="submit" name="page_insert">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['pagesUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Sayfa Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['page_update'])) {
                                $sonuc = $db->update("pages",$_POST,['form_name'=>"page_update","dir"=>"pages","file_name"=>"pages_file","columns"=>'pages_id',"file_delete"=>"delete_file","url"=>$db->seoUrl($_POST['pages_title'])]);
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
                            $sql=$db->wread("pages","pages_id",$_GET['pages_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-xs-12 col-md-3">
                                        <label>Yüklü Resim</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <img src="../img/pages/<?=$row['pages_file']?>" alt="" class="img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="pages_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="pages_file" id="pages_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="pages_title">Sayfa Başlığı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="pages_title" id="pages_title" required class="form-control" value="<?=$row['pages_title']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="editor1">Sayfa İçeriği</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="pages_text" id="editor1" class="form-control"><?=$row['pages_text']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="pages_id" value="<?=$row['pages_id']?>">
                                <input type="hidden" name="delete_file" value="<?=$row['pages_file']?>">
                                <div class="box-footer">
                                    <button class="btn pull-right btn-success" type="submit" name="page_update">Düzenle</button>
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
                    <h1 class="box-title">Sayfa Listele</h1 class="box-title">
                    <div class="pull-right"><a href="?pagesInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sayfa Title</th>
                            <th>Sayfa Resmi</th>
                            <th>Sayfa İçeriği</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php $sql = $db->read("pages",[
                            "columns_name"=>"pages_must",
                            "columns_sort"=>"ASC"
                        ]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr id="item-<?=$row['pages_id']?>">
                                <td class="sortable"><?= $i++ ?></td>
                                <td class="sortable"><?= $row['pages_title'] ?></td>
                                <?php if (!empty($row['pages_file'])){?>
                                <td><img src="../img/pages/<?= $row['pages_file'] ?>" alt="" class="thumbnail" style="max-height: 150px;"></td>
                                <?php } else {?>
                                <td>Resim Yok</td>
                                <?php }?>
                                <td><?=htmlspecialchars(implode(' ', array_slice(explode(' ', $row['pages_text']), 0, 50)))?></td>
                                <td><a href="?pagesUpdate=true&pages_id=<?=$row['pages_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a href="?pagesDelete=true&pages_id=<?=$row['pages_id']?>&file_delete=<?=$row['pages_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Sayfa Title</th>
                            <th>Sayfa Resmi</th>
                            <th>Sayfa İçeriği</th>
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
                    url:"netting/order-ajax.php?pages_must=true",
                    success:function(msg) {
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });
</script>
