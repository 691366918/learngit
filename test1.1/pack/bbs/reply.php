<?php
session_start();
header("content-type:text/html;charset=utf8");
if(empty($_SESSION['username']))
{
 echo "<script>alert('请先登录');location.href='login.html';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>回复</title>
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
            <script type="text/javascript">
                
                    if (myform.reply.value=="")
                    {
                        alert("请输入你想回复的内容");
                        myform.reply.focus();
                        return false;
                    }
                }
            </script>
</head>
<body>
<form method="post" action="reply_post.php?id=<?php echo $_GET['id']; ?>" onsubmit=" return checkinput();" name="myform">
        <table width="500px" border="1" cellpadding="8" cellspacing="0" align="center">
        <tr class="title">
        <td colspan="2">
        回复帖子<span class="right">[<a style="color: white" href="forums.php">返回</a> ]</span>
</td>
</tr>

        <tr>
        <tr>
        <td width="100px">回复内容</td>
        <td><textarea cols="43" rows="10" name="reply">
        </textarea></td>
        </tr>
        <tr class="sub">
        <td colspan="2">
        <input type="submit" value="快速回复" class="but">
        <input type="reset" value="重置" class="but">
        </td>
        </tr>
        </table>
        </form>
        </body>
        </html>