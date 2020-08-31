<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');
$username=$_GET['username'];
$sql = "select * from user where username='$username' ";
$res = $link->query($sql);
if($res)
{
    $ans=$res->fetch_assoc();
}
?>
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
            height: 300px;
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
    <form action="user_edit_action.php?id=<?php echo $ans['id'];?>" method="POST">
        <center>
            <span id="login?id=<?php $row['id'];?>">修改你的账号信息</span>
            <input type="text" name="username" required placeholder="请输入你的新名称">
            <input type="password" name="password" required placeholder="请输入你的新密码">
            <input type="password" name="repassword" required placeholder="确认你的新密码">
            <input type="submit" value="确认修改" style="background-color:#bfa;">
        </center>
    </form>
    <div style="width: 100%;height:150px;"></div>
</body>
<script>
</script>
</html>