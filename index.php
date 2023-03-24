<?php
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['err'] = "bạn cần đăng nhập để truy cập trang web này";
        header("location: login.php");
        exit();
    }
    if (isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
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
    <h1>Đăng nhập thành công</h1>
    <h5><?= "Chào bạn ". $_SESSION['username']?></h5>
</body>
</html>
