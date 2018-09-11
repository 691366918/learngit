<?php
//需要接收到传过来的值code 


//header("Content-Type:text/html;charset=utf-8");
header("Content-Type: text/html; charset=utf-8");

  $a=$_POST['user'];
  $b=$_POST['number'];
  $c=$_POST['chapter'];
  $d=$_POST['time1'];
  $e=$_POST['learn'];
//  $a='123';
//  $b=6;
//  $c='1.112 C语123言简介111111';
//  $d='2080';
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


$sql="select * from sc where number=$b and user='$a'  and flag='all'";
 $result=mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);


// $result=mysqli_query($con,$sql);
// $row= mysqli_fetch_all($result,MYSQL_ASSOC);
// echo json_encode($row);
if($e==1){


if( $row['user'])//如果选了该课程
{
// echo "000";

// echo "选了该课程";
    $sql="select * from sc where user='$a' and number=$b and chapter='$c' and flag='part'";
    $result=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $value=$row['chapter'];

        if($value)//如果选了该章节
        {
            $sqlnow="update sc set date1='$d'
            where user='$a' and number=$b and chapter='$c' and flag='part'";
            $result=mysqli_query($con,$sqlnow);
            $sqlnow="update sc set date1='$d'
            where user='$a' and number=$b  and flag='all'";
            $result=mysqli_query($con,$sqlnow);
            $sqlnow="update sc set chapter='$c'
            where user='$a' and number=$b  and flag='all'";
            $result=mysqli_query($con,$sqlnow);

       

// echo "选了该课程的对应章节，正在进行更新";

        }
        //$sql="insert into sc values('$a','$b','$c','$d',0,'all')";
        else{//没有选该章节
            $sql="insert into sc values('$a','$b','$c','$d','1','part','')";
            $result=mysqli_query($con,$sql);

// echo "没有选择该章节，正在插入";
            

         
            $sqlnow="update sc set chapter='$c'
            where user='$a' and number=$b  and flag='all'";
            $result=mysqli_query($con,$sqlnow);
            
            // echo "更新完成";
        }
}
else{//没选该课程
//    echo "没有选择该课程";


$sql3="update all_course
set person_count=person_count+1
where number=$b";
$result=mysqli_query($con,$sql3);



    $sql1="insert into sc values('$a','$b','$c','$d','1','all','0')";
    $result=mysqli_query($con,$sql1);
    $sql2="insert into sc values('$a','$b','$c','$d','1','part','')";
    $result=mysqli_query($con,$sql2);
}


}
if($e==2){

    $sql="select sc.number,sc.learn,sc.chapter,study_chapter
    from sc,all_course
    where user='$a' and sc.number=all_course.number and flag='all' and sc.number=$b";
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_array($result);
    // echo $row["learn"];
    // echo $row["study_chapter"];
     $percent=$row["learn"]/$row["study_chapter"]*100;
     $sql="update sc set percent='$percent' where user='$a' and number='$b' and flag='all'";
     $result=mysqli_query($con,$sql);


     


    $sqlnow="update sc set learn=$e
    where user='$a' and number=$b and chapter='$c' and flag='part'";
    $result=mysqli_query($con,$sqlnow);


    $sqlnow="update sc set learn=learn+1
            where user='$a' and number=$b  and flag='all'";
            $result=mysqli_query($con,$sqlnow);

}
//参数MYSQL_ASSOC、MYSQLI_NUM、MYSQLI_BOTH规定产生数组类型
//$n=0;
// while($n<mysqli_num_rows($result)){
//  echo "ID:".$row[$n]["images"]."用户名：".$row[$n]["coursename"]."密码：".$row[$n]["person_count"]."<br />";
//  $n++;
// }



// $arr = array();
// $arr['images'] = $row['images'];
// $arr['coursename']=$row['coursename'];
// $arr['person_count']=$row['person_count'];











?>