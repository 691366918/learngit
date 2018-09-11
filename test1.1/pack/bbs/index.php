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
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>论坛</title>

<style>
        #a{
            text-align:center;
        }
        table{
            width: 400;
            margin-top: 10px;
        }
        .title{
            background-color: #FFB90F;
            font-size: 17px;
            color: white;
        }
        .right{
            margin-left: 120px;
        }
    </style>

</head>
<body>
        <div id="a">
            <h1>创新小组在线论坛</h1>
            
            <p>这是一个简单的网站，一个简单的论坛。</p>
            
            <form method="post" action="sousuo.php">
            <div class="input-group input-group-lg"> <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>
            <input type="text" name="sousuo" class="form-control" placeholder="输入关键词" aria-describedby="sizing-addon1">
            <span class="input-group-btn">
            <button class="btn btn-default" type="submit">搜 索</button>
            </span> </div>
            </form>
        </div>
        
		
		<div>
			  <table  border="1px" cellspacing="0" cellpadding="8"align="center">
    <tr class="title">
        <td COLSPAN="3">
		<?php
			if(empty($_SESSION['username'])){
				echo '论坛列表<span class="right">[<a style="color: white" href="login.html">登录</a> ]</span>';
			    echo '<span class="right">[<a style="color: white" href="reg.html">注册</a> ]</span>';
			}
			else{
				echo '<span class="right">[<a style="color: white" href="user.php">用户</a> ]：'.$_SESSION['username'].'</span>';
			}
		?>
            
        </td>
    </tr>
    <tr>
        <td width="10%"><strong>主题</strong></td>
        <td width="40"><strong>论坛</strong></td>
        <td width="15"><strong>最后更新</strong></td>
    </tr>
    <?php
 $sql="select * from forums";
 $que=mysqli_query($conn,$sql);
 $sum=mysqli_num_rows($que);
 if($sum>0) {
 while ($row = mysqli_fetch_array($que)) {
 ?>
 <tr>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo "<div class=\"bold\"><a class=\"forum\" href=\"forums.php?F=" . $row['id'] . "\">" . $row["forum_name"] . "</a></div>"
 . $row["forum_description"] ?></td>
                <td>
                    <div><?php echo $row["last_post_time"]?></div>
                </td>
            </tr>
            <?php
 }
    }else{
 echo "<tr><td colspan='3'>对不起，论坛正在建设中，感谢你的关注......</td></tr>";
    }
 ?>
</table>
		</div>
</body>
</html>
