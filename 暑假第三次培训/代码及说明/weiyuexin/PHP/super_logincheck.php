<?php

header("Content-Type: text/html;charset=utf-8");
include('conn.php');

if(!isset($_POST['submit'])){
	exit('非法访问');
}

$username = $_POST['username'];
$password = $_POST['password'];
//检查用户名以及密码是否正确
$che = "select username,password from super_register where username = '$username' and password = '$password'";
$chee = mysqli_query($conn,$che);

if (!$che) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$result = mysqli_fetch_array($chee);
/*print_r($result);*/

if(isset($_REQUEST['authcode'])){
	session_start();

	if(strtolower($_REQUEST['authcode']) == $_SESSION['authcode']){
        if($result){
	         //登录成功跳转
	        //header("Location:indexadmin.php?username=$username");
	 
            echo "<script>alert('登录成功！！！');location= 'index_super_admin.php?username=$username'</script>";
        }else{
	        //header("Location:login.php");
	        echo "<script>alert('密码错误登录失败！！！');location= 'super_login.php'</script>";
        }
	}else{
        echo "<script>alert('验证码错误，请重新输入！！！');location= 'super_login.php'</script>";
	}
}
if($result){
	//登录成功跳转
	echo "<script>alert('登录成功！！！');location= 'index_super_admin.php?username=$username'</script>";
	//header("Location:index_super_admin.php?username=$username");
}else{
	//header("Location:super_login.php");
	echo "<script>alert('密码错误登录失败！！！');location= 'super_login.php'</script>";
}
//关闭数据库
mysqli_close($conn);


?>