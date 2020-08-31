<?php
$link=new mysqli('localhost','root','','test');
$link->set_charset('utf8');
if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$id=$_GET['id'];

$title=$_POST['title'];
$content=$_POST['content'];

$sql = "update news set title='$title',content='$content',flag='0' where id='$id'";
$res = $link->query($sql);
if($res)
{
    echo "<script>
        alert('新闻修改成功');
        location='newstitlelook.php';
    </script>";
}
$link->close();
?>