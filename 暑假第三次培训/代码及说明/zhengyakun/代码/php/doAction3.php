<?php
require_once("./link1.php");
header('content-type:text/html;charset=utf-8');
include_once 'upload.func.php';
$fileInfo=$_FILES['myFile'];
// $newName=uploadFile($fileInfo);
// echo $newName;
// $newName=uploadFile($fileInfo,'imooc');
// echo $newName;
//$allowExt='txt';
$allowExt=array('jpeg','jpg','png','gif','html','txt');
$newName=uploadFile($fileInfo,'imooc',false,$allowExt);


$imgsrc=$newName;
$title=$_POST['title'];
$sql="insert into pho values(null,'$title','$imgsrc',null,null)";
if(mysqli_query($mysqli,$sql))
{
    echo"<h2>图片上传成功</h2>";
    header("refresh:3;url=./index.php");
}



echo $newName;

header("refresh:1;url=./phoindex.php");
