<?php
//需要接收到传过来的值code 


//header("Content-Type:text/html;charset=utf-8");
header("Content-Type: text/html; charset=utf-8");

   $a=$_POST["user"];
   $b=$_POST["number"];
   $c=$_POST["flag"];
//   $a='123';
//   $b=6;
//   $c=1;
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
if($c==1){
   // where user='$a'and sc.number=course.number and sc.chapter=course.chapter and flag='all'and sc.number=$b";

//$sql="select chapter from sc where number=$b and user='$a' ";
// $sql="select sc.number,sc.learn,sc.chapter,study_chapter
// from sc,all_course
// where user='$a' and sc.number=all_course.number and flag='all' and sc.number=$b";
// $result=mysqli_query($con,$sql);
// $row= mysqli_fetch_array($result);

//  $percent=$row["learn"]/$row["study_chapter"]*100;
//  $sql="update sc set percent='$percent' where user='$a' and number='$b' and flag='all'";
//  $result=mysqli_query($con,$sql);




//  $arr3 = array();
//  $arr3['percent'] = $percent;

$sql="select sc.number,sc.chapter,percent 
from sc
where user='$a' and flag='all' and sc.number=$b";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_all($result,MYSQL_ASSOC);
 echo json_encode($row);



 }
 if($c==2){
     $sql="select chapter,learn
 from sc
 where user='$a' and flag='part'and number=$b";
 
 $result=mysqli_query($con,$sql);
 $row= mysqli_fetch_all($result,MYSQL_ASSOC);
 echo json_encode($row);

}









?>