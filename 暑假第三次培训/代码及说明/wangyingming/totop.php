<?php
$link=new mysqli('localhost','root','','test');
$link->set_charset('utf8');
if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$id=$_GET['id'];

$sql="update news set flag=0";
$sql2="update news set flag=1 where id='$id' ";

$res = $link->query($sql);
$res2 = $link->query($sql2);
if($res && $res2)
{
    echo "<script>
        alert('置顶成功');
        location='newstitlelook.php';
    </script>";
}
$link->close();
?>