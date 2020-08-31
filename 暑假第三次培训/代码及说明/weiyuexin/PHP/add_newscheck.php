<?php
error_reporting(E_ERROR); 
ini_set("display_errors", "Off");
header("Content-Type: text/html;charset=utf-8");
require("functions.php");
include('conn.php');

$title   = $_POST['title'];
$writer  = $_POST['writer'];
$text    = $_POST['text'];
$addtime = time();
//执行图片上传
$upinfo = uploadFile("pic","../uploads/");
if($upinfo["error"]===false){
	echo "<script>window.alert('图片上传失败');location= 'add_news.php'</script>";
}else{
	$pic = $upinfo[info];
}


$sql = "INSERT INTO news(title,main,writer,pic,addtime,flag) VALUES('$title','$text','$writer','$pic','$addtime','0')";
$result=mysqli_query($conn,$sql);

	if($result){
		echo "<script>alert('发布成功！');location= 'add_news.php'</script>";
	}else{
		/*echo("错误描述: " . mysqli_error($conn));*/
		echo "<script>alert('对不起，发布失败！');location= 'add_news.php'</script>";
	}
mysqli_close($conn);

?>