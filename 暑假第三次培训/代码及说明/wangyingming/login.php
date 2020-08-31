<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            min-width: 1200px;
            /* background-color: lightgreen; */
            font-size: 15px;
            font-family: 'Courier New', Courier, monospace;
            background: url(img/earth.jpg) no-repeat no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        a{
            text-decoration: none;
            color: green;
            font-size: 18px;
        }
        form {
            width: 30%;
            height: 410px;
            background-color: lightskyblue;
            margin: auto;
            opacity: 0.9;
            box-shadow: 5px 5px 5px 5px grey;
        }

         #login{
            padding-top: 10px;
            background-color: maroon;
            display: block;
            font-size: 30px;
        }

        input{
            width: 80%;
            height: 25px;
            margin: 20px;
            border: 3px solid black;
            border-radius: 10px;
            outline: none;
        }
        span{
            display:inline-block;
        }
    </style>
</head>

<body>
    <div style="width: 100%;height:150px;"></div>
    <form action="user_login_check.php" method="POST">
        <center>
            <span id="login">登陆你的账号</span>
            <input type="text" name="username"  placeholder="请输入你的用户名" autocomplete="off" >
            <input type="password" name="password"  placeholder="请输入你的登陆密码" autocomplete="off">
            <input type="text" name="verification_code" placeholder="输入下方的验证码"  autocomplete="off">
            <img id="verification_img" border='1' src="./verification_code.php" width="100px" alt="">
            <span style="cursor: pointer;" onclick="document.getElementById('verification_img').src='./verification_code.php?r='+Math.random()">更换</span>
            <input type="submit" value="登录" style="background-color: green;color: white;" autocomplete="off" >
            <span>
                <span>管理员请点击<a href="admin_login.php">这里</a>登录</span>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <span>如果没有账号，点击<a href="register.php">这里</a>注册</span>
            </span>
        </center>
    </form>
    <div style="width: 100%;height:150px;"></div>
</body>

</html>