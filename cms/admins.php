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
            <?php if (isset($_GET['adminsDelete'])) {
                $sonuc = $db->delete("admins","admins_id",$_GET['admins_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['adminsInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Yönetici Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['admin_insert'])) {
                            $sonuc = $db->insert("admins",$_POST,['form_name'=>"admin_insert","pass"=>"admins_pass","dir"=>"admins","file_name"=>"admins_file"]);
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
                                        <label for="admins_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="admins_file" id="admins_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_namesurname">Ad Soyad</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="admins_namesurname" id="admins_namesurname" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_username">Kullanıcı Adı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="admins_username" id="admins_username" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_pass">Kullanıcı Şifre</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="password" name="admins_pass" id="admins_pass" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_status">Kullanıcı Durum</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="admins_status" id="admins_status" class="form-control">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Pasif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="file" id="file">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="admin_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['adminsUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">Yönetici Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['admin_update'])) {
                                $sonuc = $db->update("admins",$_POST,['form_name'=>"admin_update","pass"=>"admins_pass","dir"=>"admins","file_name"=>"admins_file","columns"=>'admins_id',"file_delete"=>"delete_file"]);
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
                            $sql=$db->wread("admins","admins_id",$_GET['admins_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Yüklü Resim</label>
                                        <img src="../img/admins/<?=$row['admins_file']?>" id="cropper">
                                    </div>
                                    <div class="row col-xs-12 col-md-9">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="admins_file" id="admins_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_namesurname">Ad Soyad</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="admins_namesurname" id="admins_namesurname" required class="form-control" value="<?=$row['admins_namesurname']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_username">Kullanıcı Adı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="admins_username" id="admins_username" required class="form-control" value="<?=$row['admins_username']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_pass">Kullanıcı Şifre</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="admins_pass" id="admins_pass" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="admins_status">Kullanıcı Durum</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="admins_status" id="admins_status" class="form-control">
                                                    <option value="1" <?php if ($row['admins_status'] == 1){echo "selected";}?>>Aktif</option>
                                                    <option value="0" <?php if ($row['admins_status'] == 0){echo "selected";}?>>Pasif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <input type="hidden" name="file" id="file">
                                <input type="hidden" name="admins_id" value="<?=$row['admins_id']?>">
                                <input type="hidden" name="delete_file" value="<?=$row['admins_file']?>">
                                <div class="box-footer">
                                    <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                    <button class="btn pull-right btn-success" type="submit" name="admin_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Yöneticiler</h1 class="box-title">
                    <div class="pull-right"><a href="?adminsInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Kullanıcı Adı</th>
                            <th>Ad Soyad</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php $sql = $db->read("admins");
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr id="item-<?=$row['admins_id']?>">
                                <td><?= $i++ ?></td>
                                <td><?= $row['admins_username'] ?></td>
                                <td><?= $row['admins_namesurname'] ?></td>
                                <td><?php if ($row['admins_status']) {
                                        echo "Aktif";
                                    } else {
                                        echo "Pasif";
                                    } ?></td>
                                <td><a href="?adminsUpdate=true&admins_id=<?=$row['admins_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a href="?adminsDelete=true&admins_id=<?=$row['admins_id']?>&file_delete=<?=$row['admins_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Kullanıcı Adı</th>
                            <th>Ad Soyad</th>
                            <th>Durum</th>
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