<?php require_once "header.php";
?>

<div class="content-wrapper">
    

        <section class="content">
            <!-- /.box -->
            <!-- Default box -->    

<?php 

if (isset($_GET["action"]) && $_GET["action"] == "switch"){
    if($_GET['active']==1){
        if ($db->qSql("update registers set registers_is_done=1 where registers_id=".$_GET["register_id"]))
            echo "<script type='text/javascript'>alert('Kayıt Devre Dışı Bırakıldı!')</script>";
    } else {
        if ($db->qSql("update registers set registers_is_done=0 where registers_id=".$_GET["register_id"]))
            echo "<script type='text/javascript'>alert('Kayıt aktifleştirildi!')</script>";
    }
}

if (isset($_GET["action"]) && $_GET["action"] == "delete"){
    if ($db->qSql("update registers set registers_is_deleted=1 where registers_id=".$_GET["register_id"]))
        echo "<script type='text/javascript'>alert('Kayıt Silindi!')</script>";
}


if (isset($_GET["action"]) && $_GET["action"] == "update"){
    if (isset($_GET["created_date"]) && $_GET["created_date"] != ""){
        if ($db->qSql("update registers set registers_created_date='".$_GET["created_date"]."' where registers_id=".$_GET["register_id"]))
            echo "<script type='text/javascript'>alert('Güncellendi!')</script>";
    }else{
        
        echo '<div class="box box-primary" style="padding:30px;"><form method="GET" enctype="multipart/form-data">';
        echo '<input type="hidden" name="register_id" value="'.$_GET["register_id"].'" />';
        echo '<input type="hidden" name="course_id" value="'.$_GET["course_id"].'" />';        
        echo '<input type="hidden" name="courses_detail_id" value="'.$_GET["courses_detail_id"].'" />';                
        echo '<input type="hidden" name="action" value="update" />';                
        echo '<div class="row">
                                <div class="row col-xs-12">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <h2>'.$_GET["nameSurname"].'</h2>
                                        <label for="created_date">Kayıt Tarihi</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p><input type="date" name="created_date" id="created_date" required class="form-control"></p>
                                                <p><button class="btn pull-right btn-success" type="submit">Güncelle</button></p>
                                            </div>
                                        </div>
                                    </div>
                </div>
                                    ';
        echo '</form></div>';
    }    
}


$instructors = $db->read("instructors");
$instructors = $instructors->fetchAll(PDO::FETCH_ASSOC);
$categories = $db->read("categories");
$categories = $categories->fetchAll(PDO::FETCH_ASSOC);
$locations = $db->read("locations");
$locations = $locations->fetchAll(PDO::FETCH_ASSOC);
$idents = $db->read("courses");
$idents = $idents->fetchAll(PDO::FETCH_ASSOC);

?>
<?php 
        $course=$db->wread("courses","courses_id",$_GET['course_id']);
        $course=$course->fetch(PDO::FETCH_ASSOC);                    
?>
            
            <div class="box box-primary">
                <div class="content-header">            
                    <h1 class="box-title">Ön Kayıtlar - <?php echo $course["courses_title"]; ?></h1>
                </div>
                <!-- /.box-header -->
<div class="pull-left"><a href="courses2.php" class="btn btn-success">Tüm Eğitimleri Göster</a></div>                
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Kayıt Tarihi</th>                            
                            <th>Kursiyer</th>
                            <th>Kursiyer Telefon</th>
                            <th>Kursiyer E-Posta</th>
                            <th>Kursiyer Yazı</th>
                            <th>E-Mail</th>
                            <th>İşlem</th>                            
                        </tr>
                        </thead>
                        <tbody>
                        <style>
                        .isDoneTrue{
                            background-color:red!important;
                            color:white!important;
                        }
                        .isDoneTrue a{
                            color:lightgray;
                        }
                        </style>
                        <?php $sql = $db->wread("registers","registers_courses_detail_id",$_GET["courses_detail_id"]);
                        $i = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['registers_is_deleted'] != 1){
                            ?>
                            <tr  <?=$row['registers_is_done']?'class="isDoneTrue"':''?>  >
                                <td><?= $i++ ?></td>
                                <td><?= $row['registers_created_date'] ?></td>                                
                                <td><?= $row['registers_namesurname'] ?></td>
                                <td><?= $row['registers_phone'] ?></td>
                                <td><a href="reply-email.php?id=<?=$row['registers_id'];?>"><?= $row['registers_email'] ?>  <?=$row['registers_is_replied']?'<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>':'<i class="fa fa-clock-o" aria-hidden="true" style="color:darkgray"></i>'?></a></td>
                                <td><?= $row['registers_text'] ?></td>
                                <td></td>
                                <td>
                                    <a href="registers.php?action=delete&register_id=<?php echo $row["registers_id"]; ?>&course_id=<?php echo $_GET["course_id"]; ?>&courses_detail_id=<?php echo $_GET["courses_detail_id"]; ?>">Sil</a>
                                    |
                                    <a href="registers.php?action=switch&register_id=<?php echo $row["registers_id"]; ?>&course_id=<?php echo $_GET["course_id"]; ?>&courses_detail_id=<?php echo $_GET["courses_detail_id"]; ?>&active=<?=$row['registers_is_done']?'0':'1'?>"><?=$row['registers_is_done']?'Aktifleştir':'Devre Dışı Bırak'?></a>
                                    |
                                    <a href="registers.php?action=update&register_id=<?php echo $row["registers_id"]; ?>&nameSurname=<?php echo $row["registers_namesurname"]; ?>&course_id=<?php echo $_GET["course_id"]; ?>&courses_detail_id=<?php echo $_GET["courses_detail_id"]; ?>">Güncelle</a>
                                
                                </td>                                
                            </tr>
                        <?php } } ?>
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

