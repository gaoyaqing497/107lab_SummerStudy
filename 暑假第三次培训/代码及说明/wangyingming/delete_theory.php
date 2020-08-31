<?php
$link=new mysqli('localhost','root','','test');
$link->set_charset('utf8');
if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$id=$_GET['id'];

$sql="delete from theory where id='$id'";
$res=$link->query($sql);
if($res)
{
    echo "<script>
        alert('删除成功');
        location='theorytitlelook.php';
    </script>";
}
?>