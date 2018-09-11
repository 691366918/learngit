<!DOCTYPE html>
<html lang="en">
<head>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">

    <link rel="stylesheet" href="./css/search.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/jquery.cookie.js"></script>
</head>
</head>
<body>
    


</body>
</html>






<?php

header("Content-Type: text/html; charset=utf-8");

$a=$_COOKIE['search_input'];
//$w=$_POST["liuyan"];
$class= $_COOKIE['class'];

// $class=1;
//  $content=$a;
//  $ccc= str_split($content,3);
// //  echo $ccc[5];
//  $sum="";
//  $len= strlen($content)/3;
//  for($i=0;$i<$len;$i++)
//  {
//     $sum=$sum."%".$ccc[$i];

//  }
// $sum=$sum."%";
// echo $sum;










// $array = explode("",$a);
// echo $array[0];

$con=mysqli_connect("127.0.0.1","root","root","test");  
$program_char = "utf8" ;
mysqli_set_charset( $con , $program_char );

if (mysqli_connect_errno($con))  
{  
    echo "连接 MySQL 失败: " . mysqli_connect_error();  
}  
$sql="select distinct number,nd,images,coursename,person_count from all_course where class='$class' and coursename like '%$a%'";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_all($result,MYSQL_ASSOC);//参数MYSQL_ASSOC、MYSQLI_NUM、MYSQLI_BOTH规定产生数组类型
$len=count($row);
$i=0;

while($i<$len){

    $str1 ="<div class='col-xs-12 col-sm-6 col-md-6 col-lg-3 course'><a href='./menu.html?number=". $row[$i]["number"]. "   '> <img src='". $row[$i]["images"]. "'></a><h6>".$row[$i]["coursename"]."</h6><div class='bottom'><span class='course-logo'>LeRobot</span><span class='course-right'>人参加</span><span class='person-count'>". $row[$i]["person_count"] . "</span></div>  </div>";
    echo "$str1";

$i=$i+1;

}














?>