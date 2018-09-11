<?php
session_start();
//PHP session 变量用于存储有关用户会话的信息，或更改用户会话的设置。
//Session 变量保存的信息是单一用户的，并且可供应用程序中的所有页面使用。
header("Content-type:text/html;charset=utf-8");


$link = mysqli_connect('localhost','root','root','mybbs');//链接数据库
mysqli_set_charset($link,'utf8'); //设定字符集


$username=$_POST['username'];//接收数据
$password=$_POST['password'];

    if($username==''){
        echo "<script>alert('请输入用户名');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";//不允许空输入
        exit;
    }
    if($password==''){
        echo "<script>alert('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;
    }
$sql="select id,username,password from member where username= $username";      //从数据库查询信息
$que=mysqli_query($link,$sql);
$row=mysqli_fetch_array($que);
if($row){
    if($password !=($row['password']) || $username !=$row['username']){
        echo "<script>alert('密码错误，请重新输入');location='login.html'</script>";
        exit;
    }
    else{
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
        echo "<script>alert('登录成功');location='index.php'</script>";
    }
}else{
    echo "<script>alert('您输入的用户名不存在');location='login.html'</script>";
    exit;
};
?>
