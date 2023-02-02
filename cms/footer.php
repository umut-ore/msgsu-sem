<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <a href="tel:05423476567">0542 347 65 67</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y')?> <a href="https://umutore.com" target="_blank">Umut ÖRE</a>.</strong> Tüm Hakları Saklıdır.
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="node_modules/cropperjs/dist/cropper.min.js"></script>
<script src="node_modules/jquery-cropper/dist/jquery-cropper.min.js"></script>

<script type="text/javascript">

    $(function() {

        if ($('#editor1').length == 1){
            CKEDITOR.replace( 'editor1',{format_tags : 'p;h1;h2;h3'});
        }
        if ($('#editor2').length == 1){
            CKEDITOR.replace( 'editor2',{format_tags : 'p;h1;h2;h3'});
        }
        $("#canvas").hide();
        let $image = $("#cropper");
        $("input:file").change(function(e) {
            $("#canvas").show();
            $("#send").hide();
            $("#canvas").on("click",function () {
                let imageData = $('#cropper').cropper('getCroppedCanvas').toDataURL(e.target.files[0].type);
                $("input:file").val("");
                $('#file').attr('value', imageData);
                //$("#canvas").hide();
                $("#send").click();
                //$("#send").show();
            });
            let oFReader = new FileReader();


            oFReader.readAsDataURL(this.files[0]);

            oFReader.onload = function (oFREvent) {

                // Destroy the old cropper instance
                $image.cropper('destroy');

                // Replace url
                $image.attr('src', this.result);

                // Start cropper
                $image.cropper({
                    <?php if(!empty($aspectRatio)){
                    echo "aspectRatio: ".$aspectRatio.",";}?>
                    viewMode: 2,
                    autoCropArea: 1,
                    background: false
                });
            };
        });
    });
</script>
<?php if (isset($getIdent)){?>
    <script type="text/javascript">
        function users(id,method,maxReg){
            let sign;
            let ids = id;
            let registeredCount = parseInt($("#reg-"+id).text());
            if (method == "add"){
                if (registeredCount < maxReg) {
                    registeredCount++;
                } else {
                    alert("Kursiyer Üst Limitine Ulaştınız");
                }
            }else if(method == "remove"){
                if (registeredCount > 0){
                registeredCount--;
                } else {
                    alert("Kursiyer Sayısı 0 dan Küçük Olamaz");
                }
            }
            $.ajax({
                method: "POST",
                cache: false,
                url: "./registered-post.php",
                data: { courses_detail_id: id,courses_detail_registered: registeredCount},
                success: function (data) {
                    $("#reg-"+ids).html(registeredCount);
                }
            });
        }
        $(function () {
            let ident = $("#courses_detail_title").children("option:selected").val();
            $.ajax({
                method: "POST",
                cache: false,
                url: "./get-idents.php",
                data: { ident: ident, data2: "value2", data3: "value3" },
                dataType: "json",
                success: function (data) {
                    $('input[name="courses_detail_ident"]').val(data['courses_ident']);
                    console.log($('input[name="courses_detail_ident"]').val());
                }
            });
            $("#courses_detail_title").change(function(){
                let ident = $(this).children("option:selected").val();
                $.ajax({
                    method: "POST",
                    cache: false,
                    url: "./get-idents.php",
                    data: { ident: ident, data2: "value2", data3: "value3" },
                    dataType: "json",
                    success: function (data) {
                        $('input[name="courses_detail_ident"]').val(data['courses_ident']);
                        console.log($('input[name="courses_detail_ident"]').val());
                    }
                });
            });
        });
    </script>
<?php } ?>
<?php if (isset($getRegs)){?>
    <script type="text/javascript">
        function isFinalReg(id){
            let checkeds = $("#final-"+id).prop('checked');
            let isCheckedItem;
            if (checkeds === true){
                isCheckedItem = 1;
            }
            if(checkeds === false){
                isCheckedItem = 0;
            }
            $.ajax({
                method: "POST",
                cache: false,
                url: "./registers-post.php",
                data: { registers_id: id, registers_is_final: isCheckedItem},
                success: function (data) {
                    if (isCheckedItem == 1){
                        alert("Başarıyla Onaylandı");
                    } else {
                        alert("Başarıyla Onayı Silindi");
                    }
                }
            });
        }
    </script>
<?php } ?>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
