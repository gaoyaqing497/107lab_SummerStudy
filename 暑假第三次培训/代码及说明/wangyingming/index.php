<?php
header('content-type:text/html;charset=utf-8');
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');

$title=$_POST['title'];
$content=$_POST['content'];
$time=$_POST['time'];
$flag=$_POST['flag'];

$sql="insert into news (title,content,time,flag) values ('$title','$content','$time','$flag')";
$res=$link->query($sql);
if($res)
{
    echo 'yes';
}
else
{
    echo 'no';
}
?>