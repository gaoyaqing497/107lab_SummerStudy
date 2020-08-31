<?php
$link=new mysqli('localhost','root','','test');
$link->set_charset('utf8');
if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$id=$_GET['id'];

$sql="update theory set flag=0 where id='$id' ";

$res = $link->query($sql);

if($res)
{
    echo "<script>
        alert('取消成功');
        location='theorytitlelook.php';
    </script>";
}
$link->close();
?>