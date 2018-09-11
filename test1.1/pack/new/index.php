<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybbs";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8'); //设定字符集
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mybbs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/index-Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/index-retty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div style="padding:3px;">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="height:63px;">
            <div class="container"><a class="navbar-brand" href="#">Online Forums</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">First Item</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Second Item</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Dropdown </a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </li>
                    </ul>
                    
        <?php
			if(empty($_SESSION['username'])){            
                echo '<span class="navbar-text actions"> <a href="reg.html" class="login"><strong>注册</strong></a>
                <a class="btn btn-light action-button" role="button" href="login.html">登录</a></span>';
			}
			else{
                echo '<span class="navbar-text actions"> <a href="user.php" class="btn btn-light action-button" role="button"><strong>'.$_SESSION['username'].'</strong></a></span>';
            }
		?>
            </div>
        </nav>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div style="height:47px;"></div>
            <div class="intro" style="width:500px;height:85px;">
                <h1 class="text-center"><strong>创新小组在线论坛</strong></h1>
                <p class="text-center">Don't aim for success if you want it; just do what you love and believe in, and it will come naturally.</p>
            </div>
            <form class="search-form">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" placeholder="I am looking for..">
                    <div class="input-group-append"><button class="btn btn-light" type="button">Search </button></div>
                </div>
            </form>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                <a href="forums.php?F=1" class="learn-more">       <div class="box"><img class="img-thumbnail" src="https://img.mukewang.com/5b025dbd00015d1a06000338-240-135.jpg">
                        <h3 class="name">C</h3>Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                <a href="#" class="learn-more">     <div class="box"><img class="img-thumbnail" src="https://img2.mukewang.com/5af553c300015fb806000338-240-135.jpg">
                        <h3 class="name">PHP</h3>Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                <a href="#" class="learn-more">         <div class="box"><img class="img-thumbnail" src="https://img1.mukewang.com/5acd8d3e0001881a06000338-240-135.jpg">
                        <h3 class="name">JAVA</h3>Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                <a href="#" class="learn-more">         <div class="box"><img class="img-thumbnail" src="https://img2.mukewang.com/5a9f83e90001f06306000338-240-135.jpg">
                        <h3 class="name">C++</h3>Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                <a href="#" class="learn-more">      <div class="box"><img class="img-thumbnail" src="https://img4.mukewang.com/5a5824c100019a8506000338-240-135.jpg">
                        <h3 class="name">GO</h3>Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                <a href="#" class="learn-more">           <div class="box"><img class="img-thumbnail" src="https://img2.mukewang.com/5a52ee3500016ec706000338-240-135.jpg">
                        <h3 class="name">Python</h3>Learn more »</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">Company Name © 2018</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>