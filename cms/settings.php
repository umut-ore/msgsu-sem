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
            <?php if(isset($_GET['settingsUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Ayar Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['setting_update'])) {
                                $sonuc = $db->update("settings",$_POST,['form_name'=>"setting_update","dir"=>"settings","file_name"=>"settings_value","columns"=>'settings_id',"file_delete"=>"delete_file"]);
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
                            $sql=$db->wread("settings","settings_id",$_GET['settings_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="settings_description">Açıklama</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="settings_description" id="settings_description" required class="form-control" value="<?=$row['settings_description']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="settings_value">Ayar İçeriği <?php if ($row['settings_delete'] == 1){echo "(Devre dışı bırakmak için boş bırakın)";}?></label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php if ($row['settings_type'] == "text"){?>
                                                <input type="text" name="settings_value" id="settings_value" class="form-control" value="<?=$row['settings_value']?>" <?php if ($row['settings_delete'] != 1){echo "required";}?>>
                                                <?php }elseif ($row['settings_type'] == "textarea") { ?>
                                                    <textarea name="settings_value" id="editor1" class="form-control"><?=$row['settings_value']?></textarea>

                                                <?php }elseif ($row['settings_type'] == "status") {
                                                    $a = $row['settings_value'];?>
                                                    <select name="settings_value" class="form-control">
                                                        <option value="1" <?=($a==1)?"selected":""?>>Aktif</option>
                                                        <option value="0" <?=($a==0)?"selected":""?>>Pasif</option>
                                                    </select>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($row['settings_type'] == "file"){?>
                                    <div class="form-group col-xs-12 col-md-3">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <img src="../img/settings/<?=$row['settings_value']?>" id="cropper">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-offset-6 col-md-6">
                                        <label for="settings_value">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="settings_value" id="settings_value" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                        <input type="hidden" name="file" id="file">
                                        <input type="hidden" name="delete_file" value="<?=$row['settings_value']?>">
                                    <?php }?>
                                </div>

                                <input type="hidden" name="settings_id" value="<?=$row['settings_id']?>">
                                <div class="box-footer">
                                    <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                    <button class="btn pull-right btn-success" type="submit" name="setting_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Ayarlar</h1 class="box-title">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Ayar Adı</th>
                            <th>İçerik</th>
                            <th>Key</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sql = $db->read("settings");
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row['settings_description'] ?></td>
                                <td><?= $row['settings_value'] ?></td>
                                <td><?=$row['settings_key']?></td>
                                <td><a href="?settingsUpdate=true&settings_id=<?=$row['settings_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="5">#</th>
                            <th>Ayar Adı</th>
                            <th>İçerik</th>
                            <th>Key</th>
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

