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
            <?php if (isset($_GET['coursesDelete'])) {
                $sonuc = $db->delete("courses", "courses_id", $_GET['courses_id'], $_GET['file_delete']);
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
            <?php if (isset($_GET['coursesInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Eğitim Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['course_insert'])) {
                            $sonuc = $db->insert("courses", $_POST, ['form_name' => "course_insert", "dir" => "courses", "file_name" => "courses_file"]);
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
                                        <label for="courses_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="courses_file" id="courses_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_title">Eğitim Başlığı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_title" id="courses_title" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_price">Eğitim Ücreti</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_price" id="courses_price" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_ident">Eğitim Kimliği</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_ident" id="courses_ident" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">Eğitim Hakkında</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="courses_about" id="editor1" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor2">Eğitim İçeriği</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="courses_text" id="editor2" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="file" id="file">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="course_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } elseif (isset($_GET['coursesUpdate'])) {
                ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Eğitim Düzenle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['course_update'])) {
                            $sonuc = $db->update("courses", $_POST, ['form_name' => "course_update", "dir" => "courses", "file_name" => "courses_file", "columns" => 'courses_id', "file_delete" => "delete_file"]);
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
                        $sql = $db->wread("courses", "courses_id", $_GET['courses_id']);
                        $row = $sql->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <label>Yüklü Resim</label>
                                    <img src="../img/courses/<?= $row['courses_file'] ?>" id="cropper">
                                </div>
                                <div class="row col-xs-12 col-md-9">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_file">Resim Seç</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="file" name="courses_file" id="courses_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_title">Eğitim Başlığı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_title" id="courses_title" required class="form-control" value="<?= $row['courses_title'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_price">Eğitim Ücreti</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_price" id="courses_price" required class="form-control" value="<?= $row['courses_price'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_ident">Eğitim Kimliği</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_ident" id="courses_ident" required class="form-control" value="<?= $row['courses_ident'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">Eğitim Hakkında</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="courses_about" id="editor1" required class="form-control"><?= $row['courses_about'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor2">Eğitim İçeriği</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="courses_text" id="editor2" required class="form-control"><?= $row['courses_text'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="file" id="file">
                            <input type="hidden" name="courses_id" value="<?= $row['courses_id'] ?>">
                            <input type="hidden" name="delete_file" value="<?= $row['courses_file'] ?>">
                            <div class="box-footer">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                <button class="btn pull-right btn-success" type="submit" name="course_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">Eğitimler</h1 class="box-title">
                    <div class="pull-right"><a href="?coursesInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Eğitim Resmi</th>
                            <th>Eğitim Başlığı</th>
                            <th>Eğitim Kimliği</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sql = $db->read("courses");
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <?php if (!empty($row['courses_file'])) { ?>
                                    <td><img src="../img/courses/<?= $row['courses_file'] ?>" alt="" class="thumbnail" style="max-height: 150px;"></td>
                                <?php } else { ?>
                                    <td>Resim Yok</td>
                                <?php } ?>
                                <td><?= $row['courses_title'] ?></td>
                                <td><?= $row['courses_ident'] ?></td>
                                <td><a href="?coursesUpdate=true&courses_id=<?= $row['courses_id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a
                                            href="?coursesDelete=true&courses_id=<?= $row['courses_id'] ?>&file_delete=<?= $row['courses_file'] ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Eğitim Resmi</th>
                            <th>Eğitim Başlığı</th>
                            <th>Eğitim Kimliği</th>
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

