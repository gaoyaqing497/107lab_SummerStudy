<?php
require_once("./link1.php");
session_start();
if(empty($_SESSION['username']))
{
    header("location:./login01.php");

    die();

}
if(isset($_POST['token'])&&$_POST['token']==$_SESSION['token'])
 {
     print("nihao");
    $title=$_POST['title'];
    $intro=$_POST['intro'];
    $beizhu=$_POST['beizhu'];
    if($_FILES['uploadFile']['error']!=0)
    {
        echo "<h2>上传图片有错误</h2>";
        header("refresh:3;url=./uploadpho.php");
        die();
    }


    $arr1=array("image/jpeg","image/png","image/gif");
    $finfo=finfo_open(FILEINFO_MIME_TYPE);
    $mine=finfo_file($finfo,$_FILES['uploadFile']['tmp_name']);
    if(!in_array($mine,$arr1))
    {
        echo "<h2>上传的必须是图像！</h2>";
        header("refresh:3;url=./uploadpho.php");
        die();
    }



    $arr2=array("jpg","gif","png");
    $ext=pathinfo($_FILES['uploadFile']['name'].PATHINFO_EXTENSION);
    if(!in_array($ext,$arr2))
    {
        echo "<h2>上传的图片必须是图像！</h2>";
        header("refresh:3;url=./uploadpho.php");
        die();

    }
    echo  "nihao";
    $tmp_name=$_FILES['uploadFile']['tmp_name'];
    $dst_name="../image/".uniqid().".".$ext;
    move_uploaded_file($tmp_name,$dst_name);
    print_r($dst_name);
 }
else{

    header("refresh:3;url:./index.php");
}