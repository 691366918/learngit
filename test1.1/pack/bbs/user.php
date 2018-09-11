<?php

header("Content-type:text/html;charset=utf-8");    //设置编码
session_start();
$S=$_SESSION['username'];

// 创建连接
$conn = mysqli_connect("localhost", "root", "root", "mybbs");
mysqli_set_charset($conn,'utf8'); //设定字符集


$sql="select * from topic where author='$S'";
$que=mysqli_query($conn,$sql);
$sum=mysqli_num_rows($que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帖子</title>
    <style>
        .cen{
            border: none;
            width: 600px;
            margin: 0 auto;
            height: 40px;
            background-color: rgba(34, 35, 62, 0.08);
        }
        .left{
            width: 535px;
            float: left;
        }
        .right{
            width: 65px;
            height: 30px;
            background-color:#FFB90F ;
            float: left;
            margin-top: 8px;
        }
        .title{
            background-color: #FFB90F;
            color: white;
        }
        .list{
            margin-left: 12px;
        }
    </style>
</head>
<body>

<table width="800px" border="1" cellpadding="8" cellspacing="0" align="center">
    <tr class="title">
        <td colspan="3">你好会员，<?php echo $_SESSION['username']?><span class="list">[<a style="color: white" href="index.php">返回</a> ]</span></td>
    </tr>
    <tr>
        <td width="280px">这是你发布过的帖子</td>

        <td width="160px">最后更新</td>
    </tr>
    <?php
    if($sum>0) {
 while($row=mysqli_fetch_array($que)) {
 ?>
 <tr>
        <td width="280px"><div><a href="post.php?id=<?php echo $row['id']?>"</a><?php echo $row['title']?></div> </td>

        <td width="160px"><?php echo $row['last_post_time']?></td>
    </tr>
            
                    <?php }
                   }
 else{
 echo "<tr><td colspan='5'>没有帖子.....</td></tr>";
                    } ?>

    <tr>

    </tr>
</table>
</body>
</html>