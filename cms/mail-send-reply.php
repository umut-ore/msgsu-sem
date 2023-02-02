<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
header('Content-Type: text/html; charset=utf-8');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$catch = [];
require_once "header.php";
?>

<div class="content-wrapper">


    <section class="content">


        <div class="box box-primary">
            <div class="content-header"> <?php
if (isset($_POST['email']) && isset($_POST['msg']) && isset($_POST['title'])){

//Load Composer's autoloader
    require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = EMAIL_SMTPAuth;                                   //Enable SMTP authentication
        $mail->Username   = EMAIL_USERNAME;                     //SMTP username
        $mail->Password   = EMAIL_PASS;                               //SMTP password
        $mail->SMTPSecure = EMAIL_SMTPSecure;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = EMAIL_SMTP_PORT;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = EMAIL_CHARSET;

        //Recipients
        $mail->setFrom('info@sem.msgsu.edu.tr', 'Bilgi - Mimar Sinan Güzel Sanatlar Üniversitesi - Sürekli Eğitim Merkezi');
        $mail->addAddress($_POST['email']);
        $mail->addReplyTo('sem@msgsu.edu.tr', 'Mimar Sinan Güzel Sanatlar Üniversitesi - Sürekli Eğitim Merkezi');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_POST['title'];
        $mail->Body    = $_POST['msg'];
        $mail->AltBody = $_POST['msg'];

        $mail->send();
        $catch['status']=true;
    } catch (Exception $e) {
        $catch['status']=false;
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
if ($catch['status']==true){
    $x=$_POST['registers_id'];
    $db->qSql("UPDATE registers SET registers_is_replied=1 WHERE registers_id={$x}");
    echo "Mesajınız Başarıyla Gönderilmiştir.";
}
?>
</div>
                <div class="box-body">
                    <?=($catch['status']?"5 Saniye içerisinde anasayfa yönlendirileceksiniz.
                    <script>
                        setTimeout(function(){ window.location.replace('https://sem.msgsu.edu.tr/cms/'); }, 5000);
                    </script>
                    ":"")?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php require_once "footer.php"; ?>

