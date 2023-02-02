<?php require "conf.php";
if (isset($_POST['pass'])){
    $_SESSION['checkKey'] = $privkey;
}
if (isset($_SESSION['checkKey']) && $_SESSION['checkKey'] == $privkey){
    header("Location: /testing/");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <label for="pass">
        Please input your tester pass:
    </label>
    <input type="password" id="pass" name="pass">
    <input type="submit" value="Log In" name="login">
</form>
</body>
</html>
