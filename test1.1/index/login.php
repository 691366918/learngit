


<?php
header("Content-Type: text/html; charset=utf-8");
//   $a='123';
//   $w='123';
   $a=$_POST["Username1"];
   $w=$_POST["Password1"];
$code=1;
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
if(!$row['user'])
$code=1;
 if($row['user']==$a && $row['password']!=$w)
$code=2;

 if($row['user']==$a && $row['password']==$w && $row['user']!='' && $row['password']!='')
 {$code=0;

 }
//echo $row['user'];
/*$content = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($content);
*/


 $arr = array();
 $arr['code'] = $code;
 $arr['name'] = $row['name'];
 $arr['images']= $row['images'];

 echo json_encode($arr);










?>