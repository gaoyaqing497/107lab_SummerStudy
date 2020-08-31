<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');
$grade=$_POST['grade'];
if('user' == $grade)
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=$link->escape_string($username);
    $password=$link->escape_string($password);
    $repassword=$_POST['repassword'];
    if($password == $repassword)
    {
        $sql="insert into user (username,password) values ('$username','$password')";
        $res=$link->query($sql);
        if($res)
		{
            $mes="注册成功,去登陆吧";
            $url='login.php';
            $id=$link->insert_id;
            // echo "$id";
            $link->close();
		    echo "<script type='text/javascript'>
				alert('{$mes}');
				location.href='{$url}';
            </script>";
        }
    }
    else
    {
        $url='register.php';
        echo "<script>
            alert('两次密码不一致，请重新设置');
            location.href='${url}';
        </script>" ;
    }
}
else
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $username=$link->escape_string($username);
    $password=$link->escape_string($password);
    if($password == $repassword)
    {
        $sql="insert admin(username,password) values ('$username','$password')";
        $res=$link->query($sql);
		$mes="管理员注册成功,去登陆吧";
        $url='login.php';
		echo "<script type='text/javascript'>
				alert('{$mes}');
				location.href='{$url}';
            </script>";
    }
    else
    {
        $url='register.php';
        echo "<script>
            alert('两次密码不一致，请重新设置');
            location.href='${url}';
        </script>" ;
    }
}
?>