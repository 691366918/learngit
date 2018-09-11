<?php
session_start();
header("Content-type:text/html;charset=utf-8");    //设置编码
$page=isset($_GET['page']) ?$_GET['page'] :1 ;//接收页码
$page=!empty($page) ? $page :1;
$F=$_GET['F'];
$_SESSION['F']=$F;

// 创建连接
$conn = mysqli_connect("localhost", "root", "root", "mybbs");
mysqli_set_charset($conn,'utf8'); //设定字符集
$table_name="topic";//查取表名设置
$perpage=3;//每页显示的数据个数
//最大页数和总记录数
$total_sql="select count(*) from $table_name where id='$F'";
$total_result =mysqli_query($conn,$total_sql);
$total_row=mysqli_fetch_row($total_result);
$total = $total_row[0];//获取最大页码数
$total_page = ceil($total/$perpage);//向上整数
//临界点
$page=$page>$total_page ? $total_page:$page;//当下一页数大于最大页数时的情况
//分页设置初始化
$start=($page-1)*$perpage;
$sql="select * from topic where F=$F order by id desc limit $start ,$perpage";
$que=mysqli_query($conn,$sql);
$sum=mysqli_num_rows($que);
?>
<?php
$sql1="select forum_name from forums where id='$F'";
$squ1=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($squ1);
$forum_name=$row['forum_name'];//获取主题

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forum</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<style >
    a{
        color:black;
        }
</style>

<body>
   
    <div style="background-color:#ffffff;height:58px;">
        <nav class="navbar navbar-light navbar-expand-md bg-light navigation-clean-button" style="height:69px;">
            <div class="container-fluid"><a class="navbar-brand" href="index.php">Online Forums</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height:44px;">
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" placeholder="I am looking for..">
                            <div class="input-group-append"><button class="btn btn-light" type="button">Search </button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="highlight-clean" style="height:172px;">
        <div class="container" style="height:99px;">
            <div class="intro">
                <h2 class="text-center" style="height:8px;"><?php echo $row['forum_name']?></h2>
                <p class="text-center"><br>You cannot improve your past, but you can improve your future. Once time is wasted, life is wasted.<br><br></p>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="background-color:#eef4f7;">
                    <ul class="thread-list">
                    

                    <?php
                        if($sum>0){
                            while($row=mysqli_fetch_array($que)){
                                echo '<li class="thread"><span style="padding:6px;"><img src="http://www.xiaoqi7.com/static/image/common/folder_new.gif" style="width:25px;height:25px;" /></span><span class="title"><a href="post.php?id='.$row['id'].'">'.$row['title'].'</a> </span></li>';
                            }
                        }
                        else{

                        }
                    
                    ?>

    <tr>
        <td colspan="5">
            <div id="baner" style="margin-top: 20px">
                &nbsp;&nbsp;
                <a href="<?php echo "$_SERVER[PHP_SELF]?page=1"."&F=".$F?>">第一页</a>
                &nbsp;&nbsp;
                <a href="<?php echo "$_SERVER[PHP_SELF]?page=".($page-1)."&F=".$F?>">上一页</a>
                <!--        显示123456等页码按钮-->
    <?php
                for($i=1;$i<=$total_page;$i++){
                    if($i==$page){//当前页为显示页时加背景颜色
                        echo "<a  style='padding: 5px 5px; color:black' href='$_SERVER[PHP_SELF]?page=$i&F=$F'>$i</a>";
                    }else{
                        echo "<a  style='padding: 5px 5px' href='$_SERVER[PHP_SELF]?page=$i&F=$F'>$i</a>";
                    }
                }
    ?>
                &nbsp;&nbsp;<a href="<?php echo "$_SERVER[PHP_SELF]?page=".($page+1)."&F=".$F?>">下一页</a>
                &nbsp;&nbsp;<a href="<?php echo "$_SERVER[PHP_SELF]?page={$total_page}"."&F=".$F?>">末页</a>
                &nbsp;&nbsp;<span>共<?php echo $total?>页</span>
            </div>
        </td>
    </tr>
                    </ul>
                </div>
                <div class="col-md-4"><a class="btn btn-light btn-block action-button" role="button" href="#" style="background-color:#66d7d7;"><font color="white">发帖</font></a>
                    <div style="height:26px;"></div>
                    <div><img class="img-thumbnail float-right" src="http://s9.sinaimg.cn/mw690/001ltMpWzy74pA9vav608&amp;690" style="width:350px;height:236px;"></div>
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
            <p class="copyright">Company Name © 2017</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>