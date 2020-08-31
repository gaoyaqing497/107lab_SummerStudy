<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');

$title = $_POST['title'];
$content = $_POST['content'];
$time = time();
$sql ="insert into news (title,content,time,flag) values ('$title','$content','$time','0')";
$res=$link->query($sql);
if($res)
{
    echo "<script>
        alert('发布成功');
        location='addnews.php';
    </script>";
}
else
{
    echo "<script>
        alert('发布新闻失败，哈哈哈');
    </script>";
}
?>