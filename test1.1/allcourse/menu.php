<?php
//需要接收到传过来的值code 


//header("Content-Type:text/html;charset=utf-8");
header("Content-Type: text/html; charset=utf-8");

// $a=6;
// $w=1;
 $a=$_POST["number"];
 $w=$_POST["class"];

$con=mysqli_connect("127.0.0.1","root","root","test");  
$program_char = "utf8" ;
mysqli_set_charset( $con , $program_char );

if (mysqli_connect_errno($con))  
{  
    echo "连接 MySQL 失败: " . mysqli_connect_error();  
}  
/*$program_char = "utf8" ;
mysqli_set_charset( $con , $program_char );
*/
//$ab=iconv("GB2312","UTF-8",'黄鹏_12111222');
//$c=iconv("GB2312","UTF-8",'流弊_11');


// $sql="insert into sc values($b,$a,)"; 
// $result=mysqli_query($con,$sql);






// $words = "select * from course where number='1'";
// $result=mysqli_query($con,$words);


// $row = mysqli_fetch_array($result);

//echo $row['user'];
/*$content = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($content);
*/

$sql="select * from course,all_course where course.number=all_course.number and course.number=$a and all_course.class='$w'";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_all($result,MYSQL_ASSOC);//参数MYSQL_ASSOC、MYSQLI_NUM、MYSQLI_BOTH规定产生数组类型
//$n=0;
// while($n<mysqli_num_rows($result)){
//  echo "ID:".$row[$n]["images"]."用户名：".$row[$n]["coursename"]."密码：".$row[$n]["person_count"]."<br />";
//  $n++;
// }



// $arr = array();
// $arr['images'] = $row['images'];
// $arr['coursename']=$row['coursename'];
// $arr['person_count']=$row['person_count'];
  echo json_encode($row);










?>