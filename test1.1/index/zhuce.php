


<?php
header("Content-Type: text/html; charset=utf-8");

 $access=0;//验证码不正确
 
                                                // isset()检测变量是否设置
if (isset($_POST['authcode'])) {
    session_start();//缓存使用之前必须调用该函数
    // strtolower()小写函数
    
    if (strtolower($_POST['authcode']) == $_SESSION['authcode']) {
      
        $access=1;//验证码正确
    } else {
     
        ;
    }
 
}


if($access==1){


$a=$_POST["Username2"];
$w=$_POST["Password2"];
$b=$_POST["name"];
$code=0;
$con=mysqli_connect("127.0.0.1","root","root","test");  
$program_char = "utf8" ;
mysqli_set_charset( $con , $program_char );

if (mysqli_connect_errno($con))  
{  
    echo "连接 MySQL 失败: " . mysqli_connect_error();  
}  

$words = "select * from login where user='$a'";
$result=mysqli_query($con,$words);


$row = mysqli_fetch_array($result);

 if($row['user']==$a)
$code=0;//用户已注册

else{

 $sql="insert into login values('$a','$w','$b','')";
 $result=mysqli_query($con,$sql); 

 $words = "select * from login where user='$a'";
 $result=mysqli_query($con,$words);
 $row = mysqli_fetch_array($result);
if($row['password']==$w)
 
$code=1;//注册成功
 
 }
//echo $row['user'];
/*$content = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($content);
*/


 $arr = array();
 $arr['code'] = $code;
 $arr['access']= $access;
 

 echo json_encode($arr);






}
else{
    
     $arr['access']= $access;
 

 echo json_encode($arr);
}



?>