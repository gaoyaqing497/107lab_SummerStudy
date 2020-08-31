<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		 <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/public.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/index.js"></script>
<style>
  h4{
	text-align: center;
}         
.user{
	width: 240px;
	height: 230px;
	background-color:white;
	padding-top:20px;
	margin: auto;
	font-family: "宋体";
	font-size: 15px;
	border:solid 1px gainsboro;
}
.u1{
	width:90% ;
	height:20px ;
	margin: 5px 5%;
	border:solid 1px gainsboro;
	background-color: whitesmoke;
}
.u2{
	width:40% ;
	height:20px ;
	margin: 5px 5%;
	border:solid 1px gainsboro;
	background-color: whitesmoke;
}
h2{
	text-align: center;
}
.button1{
	width: 50%;
	height: 25px;
	margin-top:10px ;
	margin-bottom:10px ;
	margin-left: 25%;
	background-color:#AEDD81;
	color: white;
	border: none;
	border-radius:7px 7px 7px 7px ;
}

</style>
	</head>
	<body>
		<form class="user" action="loginaction.php" method="post">
			<h2>管理员登录</h2>
			<br />
			<input class="u1" placeholder="请输入用户名" type="text" name="username">
			
			<br />
			<input class="u1" placeholder="请输入密码" type="password" name="password">
				
			<br />
			<input class="u2" placeholder="请输入验证码" type="text" name="authcode">
		    <img  src="Verification.php" onclick="this.src=this.src+'?'+Math.random()" width="100" height="30">
				
			<br />
			 <?php
			 	               $exit=isset($_GET["exit"])?$_GET["exit"]:"";
			 	               if($exit==1){
			 	               	   session_start();
			 	               	   unset($_SESSION['myname']);
			 	               }
                               $err=isset($_GET["err"])?$_GET["err"]:"";
                                switch($err) {
                                    case 1:
                                    echo "用户名或密码错误！";
                                    break;
                                    case 2:
                                    echo "用户名或密码不能为空！";
                                    break;
                                    case 3:
                                    echo "验证码输入有误";
                                    break;
                                }
                            ?>
			<input class="button1" type="submit" value="管理员登录" name="user">
		<br />
			<a href='register.php' style='float: right;color: #acd372;font-size: 12px;font-weight:800;'>管理员注册</a>
			<a href='register2.php' style='float: left;color: #acd372;font-size: 12px;font-weight:800;'>超级管理员注册</a>
		</form>
		<h4><a href="../index.php">返回首页</a></h4>
		
	</body>
</html>
