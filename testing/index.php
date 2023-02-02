<?php require "conf.php";
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="sendmail.php" method="post">
    <label for="rec">Reciving</label>
    <input type="email" name="email">
    <br>
    <label for="title">Title</label>
    <input type="text" name="title">
    <br>
    <label for="msg">Msg</label>
    <textarea name="msg"></textarea>
    <br>
    <input type="submit" value="Send Mail">
    <br>
</form>
</body>
</html>
