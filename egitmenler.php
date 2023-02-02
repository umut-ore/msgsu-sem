<?php require_once "header.php"; ?>
    <section class="teachers archive section">
        <div class="container">
            <div class="row">
                <?php
                $instructors=$db->read("instructors");
                $instructors=$instructors->fetchAll(PDO::FETCH_ASSOC);
                foreach ($instructors as $instructor){
                ?>
                <div class="col-lg-4 col-md-6 col-6">
                    <!-- Single Teacher -->
                    <div class="single-teacher">
                        <div class="teacher-head">
                            <img src="<?php if (!empty($instructor['instructors_file'])){echo'img/instructors/'.$instructor['instructors_file'];} else {echo 'img/images/user.png';}?>" alt="<?=$instructor['instructors_namesurname']?>" />
                        </div>
                        <a class="teacher-content" href="egitmen/<?=$instructor['instructors_url']?>">
                            <h4><span><?=$instructor['instructors_title']?></span> <?=$instructor['instructors_namesurname']?></h4>
                        </a>
                    </div>
                    <!--/ End Single Teacher -->
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php require_once "footer.php"; ?>

