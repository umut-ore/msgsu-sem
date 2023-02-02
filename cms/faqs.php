<?php require_once "header.php";
$sql2=$db->read("faq_categories");
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
            <?php if (isset($_GET['faqsDelete'])) {
                $sonuc = $db->delete("faqs","faqs_id",$_GET['faqs_id'],$_GET['file_delete']);
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
            <?php if (isset($_GET['faqsInsert'])) { ?>
                <div class="box box-primary">
                    <div class="content-header">
                        <h1 class="box-title">SSS Ekle</h1 class="box-title">
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if (isset($_POST['faq_insert'])) {
                            $sonuc = $db->insert("faqs",$_POST,['form_name'=>"faq_insert"]);
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
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="faqs_title">SSS Başlığı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="faqs_title" id="faqs_title" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label for="editor1">SSS Yazısı</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea name="faqs_text" id="editor1" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn pull-right btn-success" type="submit" name="faq_insert" id="send">Ekle</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }
            elseif(isset($_GET['faqsUpdate'])){
                ?>
                    <div class="box box-primary">
                        <div class="content-header">
                            <h1 class="box-title">SSS Düzenle</h1 class="box-title">
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if (isset($_POST['faq_update'])) {
                                $sonuc = $db->update("faqs",$_POST,['form_name'=>"faq_update","columns"=>'faqs_id']);
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
                            $sql=$db->wread("faqs","faqs_id",$_GET['faqs_id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="row col-xs-12">
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="faqs_title">SSS Başlığı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="faqs_title" id="faqs_title" required class="form-control" value="<?=$row['faqs_title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12 col-md-6">
                                            <label for="editor1">SSS Yazısı</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <textarea name="faqs_text" id="editor1" class="form-control"><?=$row['faqs_text']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="faqs_id" value="<?=$row['faqs_id']?>">
                                <div class="box-footer">
                                    <button class="btn pull-right btn-success" type="submit" name="faq_update" id="send">Düzenle</button>
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
                    <h1 class="box-title">SSS Listele</h1 class="box-title">
                    <div class="pull-right"><a href="?faqsInsert=true" class="btn btn-success">Yeni Ekle</a></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>SSS Başlığı</th>
                            <th>SSS Yazısı</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php $sql = $db->read("faqs",[
                                "columns_name"=>"faqs_must",
                                "columns_sort"=>"ASC"
                        ]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr id="item-<?=$row['faqs_id']?>">
                                <td class="sortable"><?= $i++ ?></td>
                                <td class="sortable"><?= $row['faqs_title'] ?></td>
                                <td class="sortable"><?= $row['faqs_text'] ?></td>
                                <td><a href="?faqsUpdate=true&faqs_id=<?=$row['faqs_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><a href="?faqsDelete=true&faqs_id=<?=$row['faqs_id']?>&file_delete=<?=$row['faqs_file']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>SSS Başlığı</th>
                            <th>SSS Yazısı</th>
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
                    url:"netting/order-ajax.php?faqs_must=true",
                    success:function(msg) {
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });
</script>