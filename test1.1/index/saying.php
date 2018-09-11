<?php
header("Content-Type: text/html; charset=utf-8");
$code=0;
$a=$_POST["Email"];
$b=$_POST["Subject"];
$c=$_POST["Grade"];
$d=$_POST["Tel"];
$e=$_POST["Date1"];
$f=$_POST["Message"];

$con=mysqli_connect("127.0.0.1","root","root","test");  
$program_char = "utf8" ;
mysqli_set_charset( $con , $program_char );

if (mysqli_connect_errno($con))  
{  
    echo "连接 MySQL 失败: " . mysqli_connect_error();  
}  

 $sql="insert into saying values('$a','$b','$c','$d','$e','$f')";
 $result=mysqli_query($con,$sql); 

 $words = "select * from saying where Email='$a' and Date1='$e'";
 $result=mysqli_query($con,$words);
 $row = mysqli_fetch_array($result);
if($row['Date1']==$e)
 
$code=1;
 

//echo $row['user'];
/*$content = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($content);
*/


 $arr = array();
 $arr['code'] = $code;
 

 echo json_encode($arr);










?>