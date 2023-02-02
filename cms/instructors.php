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
            <?php if (isset($_GET['instructorsDelete'])) {
                $sonuc = $db->delete("instructors","instructors_id",$_GET['instructors_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['instructorsInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Eğitmen Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['instructor_insert'])) {
                            $sonuc = $db->insert("instructors",$_POST,['form_name'=>"instructor_insert","dir"=>"instructors","file_name"=>"instructors_file","url" =>$db->seoUrl($_POST['instructors_namesurname'])]);
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
                                        <label for="instructors_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="instructors_file" id="instructors_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="instructors_namesurname">Eğitmen Adı Soyadı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="instructors_namesurname" id="instructors_namesurname" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="instructors_title">Eğitmen Ünvanı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="instructors_title" id="instructors_title" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="instructors_mail">Eğitmen E-Posta (Kaldırmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="email" name="instructors_mail" id="instructors_mail" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="editor1">Eğitmen Özgeçmişi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="instructors_resume" id="editor1" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="file" id="file">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="instructor_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['instructorsUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Eğitmen Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['instructor_update'])) {
                                $sonuc = $db->update("instructors",$_POST,['form_name'=>"instructor_update","dir"=>"instructors","file_name"=>"instructors_file","columns"=>'instructors_id',"file_delete"=>"delete_file","url" =>$db->seoUrl($_POST['instructors_namesurname'])]);
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
                            $sql=$db->wread("instructors","instructors_id",$_GET['instructors_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Yüklü Resim</label>
                                        <img src="../img/instructors/<?=$row['instructors_file']?>" id="cropper">
                                    </div>
                                    <div class="row col-xs-12 col-md-9">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="instructors_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="instructors_file" id="instructors_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="instructors_namesurname">Eğitmen Adı Soyadı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="instructors_namesurname" id="instructors_namesurname" required class="form-control" value="<?=$row['instructors_namesurname']?>">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="instructors_title">Eğitmen Ünvanı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="instructors_title" id="instructors_title" required class="form-control" value="<?=$row['instructors_title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="instructors_mail">Eğitmen E-Posta (Kaldırmak için boş bırakın)</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="email" name="instructors_mail" id="instructors_mail" class="form-control" value="<?=$row['instructors_mail']?>">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group col-xs-12">
                                        <label for="editor1">Eğitmen Özgeçmişi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="instructors_resume" id="editor1" required class="form-control"><?=$row['instructors_resume']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <input type="hidden" name="file" id="file">
                                <input type="hidden" name="instructors_id" value="<?=$row['instructors_id']?>">
                                <input type="hidden" name="delete_file" value="<?=$row['instructors_file']?>">
                                <div class="box-footer">
                                    <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                    <button class="btn pull-right btn-success" type="submit" name="instructor_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Eğitmenler</h1 class="box-title">
                    <div class="pull-right"><a href="?instructorsInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Eğitmen Ünvanı</th>
                            <th>Eğitmen Adı Soyadı</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sql = $db->read("instructors");
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <?php if (!empty($row['instructors_file'])){?>
                                    <td><img src="../img/instructors/<?= $row['instructors_file'] ?>" alt="" class="thumbnail" style="max-height: 150px;"></td>
                                <?php } else {?>
                                    <td>Resim Yok</td>
                                <?php }?>
                                <td><?= $row['instructors_title'] ?></td>
                                <td><?= $row['instructors_namesurname'] ?></td>
                                <td><a href="?instructorsUpdate=true&instructors_id=<?=$row['instructors_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a href="?instructorsDelete=true&instructors_id=<?=$row['instructors_id']?>&file_delete=<?=$row['instructors_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Eğitmen Ünvanı</th>
                            <th>Eğitmen Adı Soyadı</th>
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

