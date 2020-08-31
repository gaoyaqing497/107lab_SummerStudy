<?php
$link = @new mysqli('localhost','root','','test');

if(isset($_REQUEST['verification_code']))
{
  session_start();
  if(strtolower($_REQUEST['verification_code']) != $_SESSION['verification_code'])
  {
    echo "<script>
        alert('验证码输入错误');
        location.href='login.php';
    </script>";
  }
}

if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');
$username = $_POST['username'] ;
$password = $_POST['password'];

if(empty($username))
{
    $mes='用户名不能为空';
    echo "<script type='text/javascript'>
    alert('{$mes}');
    location= 'login.php';
    </script>";
}
if (empty($password)) {
    $mes='密码不能为空';
    echo "<script type='text/javascript'>
    alert('{$mes}');
    location= 'login.php';
    </script>";
}

$sql="select * from user where username ='$username' and password ='$password' ";
$res=$link->query($sql);
$number = mysqli_num_rows($res);
if($number)
{
	echo "<script type='text/javascript'>
	location.href='start.php?username=$username';
	 </script>";
}
else
{
	echo "<script type='text/javascript'>
	alert('用户名或密码错误');
	location.href='login.php';
	 </script>" ;
}
$res->free();
$link->close();
?>