<?php

require_once("./link1.php");
session_start();
if(empty($_SESSION['username']))
{
    header("location:./login01.php");

    die();

}
$pagesize=9;
$page=isset($_GET['page']) ?$_GET['page'] : 1;
$startrow=($page-1)*$pagesize;
$sql="select * from  pho;";
$result=mysqli_query($mysqli,$sql);
$arrs=mysqli_fetch_all($result,MYSQLI_ASSOC);
$records=mysqli_num_rows($result);
$pages=ceil($records/$pagesize);
$sql="select * from  pho limit {$startrow},{$pagesize}";

$result=mysqli_query($mysqli,$sql);
$arrs=mysqli_fetch_all($result,MYSQLI_ASSOC);










?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body,ul,li,h2,a{
        margin:0px;
        padding:0px;
    }
    body{
        font-size:14px;
        color:#444;
        background-color:#00343f;
    }
    ul,li{
        list-style:none;
    }
    a{
        text-display: none;
        color:#444;
    }
    a:hover{
        color:red;
    }
    .box{
        width:1000px;
        margin:0px auto;
        background-color:white;
    }
    .title{
        text-align: center;
        padding:10px 0px;
        border-bottom:2px solid #444;
        background-color:#d0e9ff;

    }
    .title h2{
        font-size:36px;
        padding:10px;
    }
    .photos{
        padding:15px;
    }
    .photos li{
        float:left;
        width:290px;
        padding:8px 5px;
        margin:10px;
        text-align:center;
    }
    .photos img{
        width:280px;
        height:160px;

    }
    .pagelist{
        height:40px;
        line-height: 40px;
        text-align:center;
    }
    .pagelist a{
        padding:8px 15px;
        border:1px solid #ccc;
        margin: 0px 3px;
    }
    .pagelist a:hover{
        border:1px solid #0000ff;
    }
    .pagelist .current{
        padding:8px 15px;
    }
</style>
<body>
<div class="box">
<div class="title">
    <h2>我的相册</h2>
    <a href="./index.php">上传照片</a>
    共有个<font color="red"><?php echo $records?></font>照片
</div>
<div class="photos">
    <ul>
        <?php foreach($arrs as $arr){
        ?>
        <li>
            <a href="">
                <img src="./<?php echo $arr['imgsrc']?>" alt="">
            </a>
            <a href="">
                <?php echo $arr['title']?>
            </a>
        </li>
        <?php }?>
    </ul>
    <div style="clear:both"></div>
    <div class="pagelist">
        <?php
       for($i=1;$i<=$pages;$i++)
       {
           if($page==$i)
           {
               echo "<span>$i</span>";
           }else{
               echo "<a href='./phoindex.php?page=$i'>$i</a>";
           }
       }






        ?>










       </div>
</div>
</div>
</body>
</html>