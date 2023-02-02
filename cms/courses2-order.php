<?php require_once "./header.php";
$instructors = $db->read("instructors");
$instructors = $instructors->fetchAll(PDO::FETCH_ASSOC);
$categories = $db->read("categories");
$categories = $categories->fetchAll(PDO::FETCH_ASSOC);
$locations = $db->read("locations");
$locations = $locations->fetchAll(PDO::FETCH_ASSOC);
$idents = $db->read("courses");
$idents = $idents->fetchAll(PDO::FETCH_ASSOC);

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
            <?php if (isset($_GET['courses_detailDelete'])) {
                $sonuc = $db->delete("courses_detail", "courses_detail_id", $_GET['courses_detail_id'], $_GET['file_delete']);
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
            <?php if (isset($_GET['courses_detailInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Eğitim Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['course_detailinsert'])) {
                            $sonuc = $db->insert("courses_detail", $_POST, ['form_name' => "course_detailinsert", "dir" => "courses_detail", "file_name" => "courses_detail_file"]);
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
                                <div class="row col-xs-12">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_min_quota">Eğitim Minimum Katılım</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_detail_min_quota" id="courses_detail_min_quota" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_max_quota">Eğitim Maksimum Katılım</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_detail_max_quota" id="courses_detail_max_quota" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_length">Eğitim Süresi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_detail_length" id="courses_detail_length" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_starting_date">Eğitim Başlangıç Tarihi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="date" name="courses_detail_starting_date" id="courses_detail_starting_date" min="<?= date("Y-m-d", time()) ?>" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_ending_date">Eğitim Bitiş Tarihi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="date" name="courses_detail_ending_date" id="courses_detail_ending_date" min="<?= date("Y-m-d", time()) ?>" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_title">Eğitim Adı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_title" id="courses_detail_title" class="form-control">
                                                    <?php foreach ($idents as $ident) { ?>
                                                        <option value="<?=$ident['courses_id']?>"><?= $ident['courses_title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-4">
                                        <label for="courses_detail_instructor_id">Eğitmen</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_instructor_id" id="courses_detail_instructor_id" class="form-control">
                                                    <option value="">-</option>
                                                    <?php foreach ($instructors as $instructor) { ?>
                                                        <option value="<?=$instructor['instructors_id']?>"><?= $instructor['instructors_namesurname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-4">
                                        <label for="courses_detail_location">Eğitim Konumu</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_location" id="courses_detail_location" class="form-control">
                                                    <?php foreach ($locations as $location) { ?>
                                                        <option value="<?= $location['locations_id'] ?>"><?= $location['locations_title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-4">
                                        <label for="courses_detail_category">Eğitim Kategorisi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_category" id="courses_detail_category" class="form-control">
                                                    <?php foreach ($categories as $category) { ?>
                                                        <option value="<?= $db->seoUrl($category['categories_title']) ?>"><?= $category['categories_title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" value="0" name="courses_detail_registered">
                                <input type="hidden" name="courses_detail_ident" id="courses_detail_ident">
                                <input type="hidden" name="file" id="file">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Ekle</a>
                                <button class="btn pull-right btn-success" type="submit" name="course_detailinsert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } elseif (isset($_GET['courses_detailUpdate'])) {
                ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">Eğitim Düzenle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['course_detailupdate'])) {
                            $sonuc = $db->update("courses_detail", $_POST, ['form_name' => "course_detailupdate", "dir" => "courses_detail", "file_name" => "courses_detail_file", "columns" => 'courses_detail_id', "file_delete" => "delete_file"]);
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
                        $sql = $db->wread("courses_detail", "courses_detail_id", $_GET['courses_detail_id']);
                        $row = $sql->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="row col-xs-12">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_min_quota">Eğitim Minimum Katılım</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_detail_min_quota" id="courses_detail_min_quota" required class="form-control" value="<?= $row['courses_detail_min_quota'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_max_quota">Eğitim Maksimum Katılım</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_detail_max_quota" id="courses_detail_max_quota" required class="form-control" value="<?= $row['courses_detail_max_quota'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_length">Eğitim Süresi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="courses_detail_length" id="courses_detail_length" required class="form-control" value="<?= $row['courses_detail_length'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_starting_date">Eğitim Başlangıç Tarihi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="date" name="courses_detail_starting_date" id="courses_detail_starting_date" min="<?= date("Y-m-d", time()) ?>" required class="form-control"
                                                       value="<?= $row['courses_detail_starting_date'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_ending_date">Eğitim Bitiş Tarihi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="date" name="courses_detail_ending_date" id="courses_detail_ending_date" min="<?= date("Y-m-d", time()) ?>" required class="form-control"
                                                       value="<?= $row['courses_detail_ending_date'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_title">Eğitim Adı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_title" id="courses_detail_title" class="form-control">
                                                    <?php foreach ($idents as $ident) { ?>
                                                        <option value="<?=$ident['courses_id']?>" <?php if ($row['courses_detail_title']==$ident['courses_id']){echo "selected";}?>><?= $ident['courses_title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_instructor_id">Eğitmen</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_instructor_id" id="courses_detail_instructor_id" class="form-control">
                                                    <option value="">-</option>                                                    
                                                    <?php foreach ($instructors as $instructor) { ?>
                                                        <option value="<?=$instructor['instructors_id']?>" <?php if ($row['courses_detail_instructor_id_id']==$instructor['instructors_id']){echo "selected";}?>><?= $instructor['instructors_namesurname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_location">Eğitim Konumu</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_location" id="courses_detail_location" class="form-control">
                                                    <?php foreach ($locations as $location) { ?>
                                                        <option value="<?= $location['locations_id']?>" <?php if ($row['courses_detail_location']==$location['locations_id']){echo "selected";}?>><?= $location['locations_title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="courses_detail_category">Eğitim Kategorisi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="courses_detail_category" id="courses_detail_category" class="form-control">
                                                    <?php foreach ($categories as $category) { ?>
                                                        <option value="<?= $db->seoUrl($category['categories_title']) ?>" <?php if ($row['courses_detail_category']==$category['categories_title']){echo "selected";}?> ><?= $category['categories_title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="courses_detail_ident" id="courses_detail_ident">
                            <input type="hidden" name="file" id="file">
                            <input type="hidden" name="courses_detail_id" value="<?= $row['courses_detail_id'] ?>">
                            <input type="hidden" name="delete_file" value="<?= $row['courses_detail_file'] ?>">
                            <div class="box-footer">
                                <a class="btn pull-right btn-success" href="javascript:void(0)" id="canvas">Düzenle</a>
                                <button class="btn pull-right btn-success" type="submit" name="course_detailupdate" id="send">Düzenle</button>
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
                    <div class="pull-right"><a href="?courses_detailInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Eğitim Title</th>
                            <th>Eğitim Kimliği</th>
                            <th>Eğitmen</th>
                            <th>Sıra No</th>                                  
                        </tr>
                        </thead>
                        <tbody id="sortable">   
                        <?php $sql = $db->read("courses_detail",[
                                "columns_name"=>"courses_detail_order_num",
                                "columns_sort"=>"ASC"
                        ]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            $instructor=$db->wread("instructors","instructors_id",$row['courses_detail_instructor_id']);
                            $instructor=$instructor->fetch(PDO::FETCH_ASSOC);
                            $item=$db->wread("courses","courses_id",$row['courses_detail_title']);
                            $item=$item->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <tr id="item-<?=$row['courses_detail_id']?>">
                                <td class="sortable"><?= $i++ ?></td>
                                <td class="sortable"><?= $item['courses_title'] ?></td>
                                <td class="sortable"><?= $row['courses_detail_ident'] ?></td>
                                <td class="sortable"><?= $instructor['instructors_namesurname'] ?></td>
                                <td class="sortable"><?= $row['courses_detail_order_num'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
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
                    url:"netting/order-ajax2.php?course_must=true",
                    success:function(msg) {
                        console.log(msg);
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });
</script>