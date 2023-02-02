<?php require_once "header.php";
/*$sql2=$db->read("announcement_categories");
$row2=$sql2->fetchAll(PDO::FETCH_ASSOC);*/
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
            <?php if (isset($_GET['announcementsDelete'])) {
                $sonuc = $db->delete("announcements","announcements_id",$_GET['announcements_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['announcementsInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Duyuru Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['announcement_insert'])) {
                            $sonuc = $db->insert("announcements",$_POST,['form_name'=>"announcement_insert","dir"=>"announcements","file_name"=>"announcements_file"]);
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
                                        <label for="announcements_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="announcements_file" id="announcements_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="announcements_title">Duyuru Başlığı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="announcements_title" id="announcements_title" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="announcements_date">Duyuru Tarihi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="date" name="announcements_date" min="<?=date("Y-m-d",time())?>" id="announcements_date" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="form-group col-xs-12 col-md-6">
                                        <label for="announcements_category">Duyuru Kategorisi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="announcements_category" id="announcements_category">
                                                    <?php
/*                                                    foreach ($row2 as $item){
                                                        echo "<option value='" . strtolower($item['announcement_categories_title']) . "'>" . $item['announcement_categories_title'] . "</option>";
                                                    }
                                                    */?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">Duyuru Yazısı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="announcements_text" id="editor1" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="file" id="file">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="announcement_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['announcementsUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Duyuru Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['announcement_update'])) {
                                $sonuc = $db->update("announcements",$_POST,['form_name'=>"announcement_update","dir"=>"announcements","file_name"=>"announcements_file","columns"=>'announcements_id',"file_delete"=>"delete_file"]);
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
                            $sql=$db->wread("announcements","announcements_id",$_GET['announcements_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <img src="../img/announcements/<?=$row['announcements_file']?>" alt="" class="img-thumbnail" id="cropper">
                                    </div>
                                    <div class="row col-xs-12 col-md-9">
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="announcements_file">Resim Seç</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="file" name="announcements_file" id="announcements_file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="announcements_title">Duyuru Başlığı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="announcements_title" id="announcements_title" required class="form-control" value="<?=$row['announcements_title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="announcements_date">Duyuru Tarihi</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="date" name="announcements_date" id="announcements_date" min="<?=date("Y-m-d",time())?>" required class="form-control" value="<?=$row['announcements_date']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="form-group col-xs-12 col-md-6">
                                            <label for="announcements_category">Duyuru Kategorisi</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <select name="announcements_category" id="announcements_category">
                                                        <?php
/*                                                        foreach ($row2 as $item){
                                                            if ($row['announcements_category'] == strtolower($item['announcement_categories_title'])){
                                                                echo "<option value='" . strtolower($item['announcement_categories_title']) . "' selected>" . $item['announcement_categories_title'] . "</option>";
                                                            } else {
                                                                echo "<option value='" . strtolower($item['announcement_categories_title']) . "'>" . $item['announcement_categories_title'] . "</option>";
                                                            }
                                                        }
                                                        */?>
                                                    </select>
                                                    <input type="text" name="announcements_category" id="announcements_category" required class="form-control" value="<?/*=$row['announcements_category']*/?>">
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="editor1">Duyuru Yazısı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <textarea name="announcements_text" id="editor1" class="form-control"><?=$row['announcements_text']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="file" id="file">
                                <input type="hidden" name="announcements_id" value="<?=$row['announcements_id']?>">
                                <input type="hidden" name="delete_file" value="<?=$row['announcements_file']?>">
                                <div class="box-footer">
                                    <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                    <button class="btn pull-right btn-success" type="submit" name="announcement_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Duyuru Listele</h1 class="box-title">
                    <div class="pull-right"><a href="?announcementsInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Duyuru Resmi</th>
                            <th>Duyuru Başlığı</th>
                            <th>Duyuru Tarihi</th>
                            <th>Duyuru Yazısı</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sql = $db->read("announcements",[
                                "columns_name"=>"announcements_date",
                                "columns_sort"=>"Desc"
                        ]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr id="item-<?=$row['announcements_id']?>">
                                <td><?= $i++ ?></td>,
                                <?php if (!empty($row['pages_file'])){?>
                                    <td><img src="../img/announcements/<?= $row['announcements_file'] ?>" alt="" class="thumbnail" style="max-height: 150px;"></td>
                                <?php } else {?>
                                    <td>Resim Yok</td>
                                <?php }?>
                                <td><?= $row['announcements_title'] ?></td>
                                <td><?=date("d.m.Y", strtotime($row['announcements_date']))?></td>
                                <td><?= $row['announcements_text'] ?></td>
                                <td><a href="?announcementsUpdate=true&announcements_id=<?=$row['announcements_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a href="?announcementsDelete=true&announcements_id=<?=$row['announcements_id']?>&file_delete=<?=$row['announcements_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Duyuru Resmi</th>
                            <th>Duyuru Başlığı</th>
                            <th>Duyuru Tarihi</th>
                            <th>Duyuru Yazısı</th>
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

