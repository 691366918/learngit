<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
session_start();
$F=$_SESSION['F'];//接受F变量 确定是哪个主题
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybbs";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8'); //设定字符集
$author=$_POST['author'];
//print_r($author);
//die;
$title=$_POST['title'];
$content=$_POST['content'];
$last_post_time=date("Y-m-d H:i:s");
$sql="insert into topic(author,title,content,last_post_time,F) values('$author','$title','$content','$last_post_time','$F')";
$que=mysqli_query($conn,$sql);
if($que){
    echo "<script>alert('发布成功');location.href='forums.php?F=$F';</script>";
}else{
    echo "<script>alert('好像有点小问题......');location.href='addnew.php';</script>";
}
?>