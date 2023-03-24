<?php
    session_start();
    $err = "";
    $result = "";
//    Nếu tồn tại cookie username , thì chuyển hướng sang trang profile
    if (isset($_SESSION['username'])){
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['success'] = "Đã ghi nhớ đăng nhập";
        header("location: index.php");
    }
//  Nếu đã đăng nhập chuyển đến trang profile
if(isset($_SESSION['username'])){
       $_SESSION['success'] = "Bạn đã đăng nhập rồi không thể trở lại";
    header("location: index.php");
    exit();
}
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)){
        $_SESSION['err'] = " Không được để trống" ;
        header("location: login.php");
        exit();
    }
    else{
        if ($username == "admin" && $password == "dthang") {
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 3600);

                }
                // tạo 1 session để lưu lại phiên đăng nhập
                $_SESSION['username'] = $username;
                // tạo 1 cái message để thông báo đăng nhập thành công
                $_SESSION['success'] = 'Đăng nhập thành công';
                // chuyển hướng
                header('location: index.php');
                exit();
            }
                else{
                 $_SESSION['err'] = "Thông tin đăng nhập không chính xác";
                header("location: login.php");
                exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Đăng nhập</title>

    </style>
</head>
<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="#"><img src="./img/svg/left.png.svg" alt="">Return home</a></div>
				<div class="contact">
					<form action="login.php" method="post">
						<h3>SIGN IN</h3>
						<input type="text" placeholder="USERNAME" name="username" id="username">
						<input type="password" placeholder="PASSWORD" name="password" id="password">
                        <input type="checkbox" name="remember">
						<span><?= isset($_SESSION['err']) ? $_SESSION['err'] : '' ?></span>
                            <?php unset($_SESSION['err']);?>

						<button class="submit" name="login">LET'S GO</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>DThang</h2>
					<h5>PHP and MYSQL</h5>
				</div>
				<div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
			</div>
		</div>
	</section>
</body>
</html>