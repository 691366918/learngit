<?php
//需要接收到传过来的值code 



header("Content-Type: text/html; charset=utf-8");

$a=$_POST["user"];

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


//参数MYSQL_ASSOC、MYSQLI_NUM、MYSQLI_BOTH规定产生数组类型
//$n=0;
// while($n<mysqli_num_rows($result)){
//  echo "ID:".$row[$n]["images"]."用户名：".$row[$n]["coursename"]."密码：".$row[$n]["person_count"]."<br />";
//  $n++;
// }



$sql="select percent,all_course.class,sc.number,all_course.images,all_course.coursename,course.chapter,video,sc.date1 from sc,all_course,course where sc.number=course.number and course.number=all_course.number and sc.chapter=course.chapter and user='$a' and flag='all' order by sc.date1 desc";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_all($result,MYSQL_ASSOC);
echo json_encode($row);











?>