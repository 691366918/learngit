<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybbs";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8'); //设定字符集
$username=$_POST['username'];
$password=$_POST['password'];
$email=trim($_POST['email']);
$log_time=date("Y-m-d H:i:s");
$sql1="SELECT * from member where username='$username'";
$que=mysqli_query($conn,$sql1);
$sum=mysqli_num_rows($que);
if($sum){
    echo"<script>alert('用户名已经被注册');location.href='reg.html';</script>";
}else{
    $sql="INSERT into member(username,password,email,log_time)VALUES
    ('$username','$password','$email','$log_time')";
    $que=mysqli_query($conn,$sql);
    $_SESSION['username']=$username;
    echo "<script>console.log('注册成功');location.href='index.php';</script>";
}
?>