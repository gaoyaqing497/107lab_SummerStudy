<?php
$link = new mysqli('localhost','root','','test');
if($link->connect_errno)
{
	die('连接失败'.$link->connect_error);
}
$link->set_charset('utf8');

$id=$_GET['id'];
$newusername = $_POST['username'];
$newpassword = $_POST['password'];

$sql="update user set username='$newusername',password='$newpassword' where id='$id'";
$res = $link->query($sql);
if($res)
{
	echo "<script>
		alert('编辑用户成功');
		location='user_list.php?username=admin';
	</script>";
}
else
{
	echo '失败';
}
?>