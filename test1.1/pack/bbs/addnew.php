<?php
session_start();
header("content-type:text/html;charset=utf8");
if(empty($_SESSION['username']))
{
 echo "<script>alert('请先登录');location.href='login.html';</script>";
}

$F=$_SESSION['F'];//接受F变量 确定是哪个主题
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加新帖</title>
    <style>
        .title{
            background-color: #FFB90F;
            color: white;
        }
        .sub{
            text-align: center;
        }
        .but{
            background-color: #FFB90F;
            width: 90px;
            height: 40px;
            font-size: 15px;
            color: white;
            border: none;
        }
        input{
            width: 250px;
            height: 25px;
        }
        .right{
            margin-left: 10px;
        }
    </style>
</head>
<body>
<form method="post" action="addnew_post.php">
    <table width="500px" border="1" cellpadding="8" cellspacing="0" align="center">
        <tr class="title">
            <td colspan="2">
                编辑帖子<span class="right">[<a style="color: white" href="forums.php">返回</a> ]</span>
            </td>
        </tr>
        <tr>
            <td width="100px">作者</td>
            <td><input type="text" name="author"></td>
        </tr>
        <tr>
            <td width="100px">标题</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td width="100px">内容</td>
            <td><textarea cols="43" rows="15" name="content">
            </textarea></td>
        </tr>
        <tr class="sub">
            <td colspan="2">
                <input type="submit" value="发布" class="but">
                <input type="reset" value="重置" class="but">
            </td>
        </tr>
    </table>
</form>
</body>
</html>