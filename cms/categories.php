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
            <?php if (isset($_GET['product_categoriesDelete'])) {
                $sonuc = $db->delete("product_categories","product_categories_id",$_GET['product_categories_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['product_categoriesInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Kategori Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['product_category_insert'])) {
                            $sonuc = $db->insert("product_categories",$_POST,['form_name'=>"product_category_insert","dir"=>"product_categories","file_name"=>"product_categories_file"]);
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
                                        <label for="product_categories_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="product_categories_file" id="product_categories_file" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="product_categories_title">Kategori Başlığı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="product_categories_title" id="product_categories_title" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">Kategori Yazısı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="product_categories_text" id="editor1" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="product_category_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['product_categoriesUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Kategori Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['product_category_update'])) {
                                $sonuc = $db->update("product_categories",$_POST,['form_name'=>"product_category_update","dir"=>"product_categories","file_name"=>"product_categories_file","columns"=>'product_categories_id',"file_delete"=>"delete_file"]);
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
                            $sql=$db->wread("product_categories","product_categories_id",$_GET['product_categories_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <img src="../img/product_categories/<?=$row['product_categories_file']?>" alt="" class="img-thumbnail" id="cropper">
                                    </div>
                                    <div class="row col-xs-12 col-md-9">
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="product_categories_file">Resim Seç</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="file" name="product_categories_file" id="product_categories_file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="product_categories_title">Kategori Başlığı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="product_categories_title" id="product_categories_title" required class="form-control" value="<?=$row['product_categories_title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="editor1">Kategori Yazısı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <textarea name="product_categories_text" id="editor1" class="form-control"><?=$row['product_categories_text']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="product_categories_id" value="<?=$row['product_categories_id']?>">
                                <input type="hidden" name="delete_file" value="<?=$row['product_categories_file']?>">
                                <div class="box-footer">
                                    <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                    <button class="btn pull-right btn-success" type="submit" name="product_category_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Kategori Listele</h1 class="box-title">
                    <div class="pull-right"><a href="?product_categoriesInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori Başlığı</th>
                            <th>Kategori Yazısı</th>
                            <th>Kategori Resmi</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php $sql = $db->read("product_categories",[
                                "columns_name"=>"product_categories_must",
                                "columns_sort"=>"ASC"
                        ]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr id="item-<?=$row['product_categories_id']?>">
                                <td class="sortable"><?= $i++ ?></td>
                                <td class="sortable"><?= $row['product_categories_title'] ?></td>
                                <td class="sortable"><?= $row['product_categories_text'] ?></td>
                                <td class="sortable"><img src="../img/product_categories/<?= $row['product_categories_file'] ?>" alt="" class="thumbnail" style="max-height: 150px;"></td>
                                <td><a href="?product_categoriesUpdate=true&product_categories_id=<?=$row['product_categories_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a href="?product_categoriesDelete=true&product_categories_id=<?=$row['product_categories_id']?>&file_delete=<?=$row['product_categories_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Kategori Başlığı</th>
                            <th>Kategori Yazısı</th>
                            <th>Kategori Resmi</th>
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
                    url:"netting/order-ajax.php?product_categories_must=true",
                    success:function(msg) {
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });
</script>