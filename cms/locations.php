<?php require_once "header.php";
$instructors = $db->read("instructors");
$instructors = $instructors->fetchAll(PDO::FETCH_ASSOC);
$categories = $db->read("categories");
$categories = $categories->fetchAll(PDO::FETCH_ASSOC);
$locations = $db->read("locations");
$locations = $locations->fetchAll(PDO::FETCH_ASSOC);

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
            <?php if (isset($_GET['locationsDelete'])) {
                $sonuc = $db->delete("locations", "locations_id", $_GET['locations_id'], $_GET['file_delete']);
                if ($sonuc['status']) {
                    ?>
                    <div class="alert alert-success">
                        Silme Başarılı
                    </div>
                <?php } else {
                    ?>
                    <div class="alert alert-danger">
                        Silme Başarısız: <?= $sonuc['error'] ?>
                    </div>
                <?php }
            } ?>
            <?php if (isset($_GET['locationsInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Konum Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['location_insert'])) {
                            $sonuc = $db->insert("locations", $_POST, ['form_name' => "location_insert", "dir" => "locations", "file_name" => "locations_file","url"=>$db->seoUrl($_POST['locations_title'])]);
                            if ($sonuc['status']) {
                                ?>
                                <div class="alert alert-success">
                                    Kayıt Başarılı
                                </div>
                            <?php } else {
                                ?>
                                <div class="alert alert-danger">
                                    Kayıt Başarısız: <?= $sonuc['error'] ?>
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
                                        <label for="locations_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="locations_file" id="locations_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_title">Konum Adı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="locations_title" id="locations_title" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_phone">Konum Telefonu (Devre dışı bırakmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="tel" name="locations_phone" id="locations_phone" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_mail">Konum E-Postası (Devre dışı bırakmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="email" name="locations_mail" id="locations_mail" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="locations_maps_url">Konum Harita URL</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="locations_maps_url" id="locations_maps_url" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="locations_maps">Konum Harita Embed URL (Devre dışı bırakmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="locations_maps" id="locations_maps" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">Konum Hakkında</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="locations_text" id="editor1" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor2">Konum Adresi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="locations_address" id="editor2" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="file" id="file">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="location_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } elseif (isset($_GET['locationsUpdate'])) {
                ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Konum Düzenle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['location_update'])) {
                            $sonuc = $db->update("locations", $_POST, ['form_name' => "location_update", "dir" => "locations", "file_name" => "locations_file", "columns" => 'locations_id', "file_delete" => "delete_file","url"=>$db->seoUrl($_POST['locations_title'])]);
                            if ($sonuc['status']) {
                                ?>
                                <div class="alert alert-success">
                                    Kayıt Başarılı
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-danger">
                                    Kayıt Başarısız: <?= $sonuc['error'] ?>
                                </div>

                            <?php }
                        }
                        $sql = $db->wread("locations", "locations_id", $_GET['locations_id']);
                        $row = $sql->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <label>Yüklü Resim</label>
                                    <img src="../img/locations/<?= $row['locations_file'] ?>" id="cropper">
                                </div>
                                <div class="row col-xs-12 col-md-9">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="locations_file" id="locations_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_title">Konum Adı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="locations_title" id="locations_title" required class="form-control" value="<?= $row['locations_title'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_phone">Konum Telefonu (Devre dışı bırakmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="tel" name="locations_phone" id="locations_phone" class="form-control" value="<?= $row['locations_phone'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="locations_mail">Konum E-Postası (Devre dışı bırakmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="email" name="locations_mail" id="locations_mail" class="form-control" value="<?= $row['locations_mail'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="locations_maps_url">Konum Harita URL</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="locations_maps_url" id="locations_maps_url" required class="form-control" value="<?= $row['locations_maps_url'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="locations_maps">Konum Harita Embed URL (Devre dışı bırakmak için boş bırakın)</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="locations_maps" id="locations_maps" class="form-control" value="<?= $row['locations_maps'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">Konum Hakkında</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="locations_text" id="editor1" required class="form-control"><?= $row['locations_text'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor2">Konum Adresi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="locations_address" id="editor2" required class="form-control"><?= $row['locations_address'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="file" id="file">
                            <input type="hidden" name="locations_id" value="<?= $row['locations_id'] ?>">
                            <input type="hidden" name="delete_file" value="<?= $row['locations_file'] ?>">
                            <div class="box-footer">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                <button class="btn pull-right btn-success" type="submit" name="location_update" id="send">Düzenle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

            <?php } ?>
            <!-- /.box -->
            <!-- Default box -->
            <div class="box box-primary">
                <div class="content-header">
                    <h1 class="box-title">Konumlar</h1 class="box-title">
                    <div class="pull-right"><a href="?locationsInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Konum Resmi</th>
                            <th>Konum Adı</th>
                            <th>Konum Hakkında</th>
                            <th>Konum Adresi</th>
                            <th>Konum Telefonu</th>
                            <th>Konum E-Postası</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sql = $db->read("locations");
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['locations_title'] !== "Online"){
                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <?php if (!empty($row['locations_file'])) { ?>
                                    <td><img src="../img/locations/<?= $row['locations_file'] ?>" alt="" class="thumbnail" style="max-height: 150px;"></td>
                                <?php } else { ?>
                                    <td>Resim Yok</td>
                                <?php } ?>
                                <td><?= $row['locations_title'] ?></td>
                                <td><?= $row['locations_about'] ?></td>
                                <td><?= $row['locations_address'] ?></td>
                                <td><?= $row['locations_phone'] ?></td>
                                <td><?= $row['locations_mail'] ?></td>
                                <td><a href="?locationsUpdate=true&locations_id=<?= $row['locations_id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a
                                            href="?locationsDelete=true&locations_id=<?= $row['locations_id'] ?>&file_delete=<?= $row['locations_file'] ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="5">#</th>
                            <th>Konum Resmi</th>
                            <th>Konum Adı</th>
                            <th>Konum Hakkında</th>
                            <th>Konum Adresi</th>
                            <th>Konum Telefonu</th>
                            <th>Konum E-Postası</th>
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

