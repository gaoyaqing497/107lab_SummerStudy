<?php
$link=new mysqli('localhost','root','','test');

if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$link->set_charset('utf8');
$id=$_GET['id'];

$sql="delete from user where id=".$id;
$res = $link->query($sql);
if($res)
{
    echo "<script>
        alert('删除成功');
        location='user_list.php?username=admin';
    </script>";
}
?>