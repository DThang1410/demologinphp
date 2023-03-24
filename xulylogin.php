<?php
    session_start();
    $err = "";
    $result = "";
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username || $password)){
            $err = " Không được để trống";
        }
        else{
            if ($username == "admin" && $password == "admin"){
                header("location: profile.php");
            }
            else{
                $err = "Thông tin đăng nhập không chính xác";
            }
        }
    }
?>

