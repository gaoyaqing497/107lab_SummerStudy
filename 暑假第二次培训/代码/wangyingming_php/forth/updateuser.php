<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
	die('连接失败'.$link->connect_error);
}
$link->set_charset('utf8');
$id=$_GET['id'];
$sql="select * from user where id=".$id;
$res=$link->query($sql);
if($res){
	$row=$res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理网站用户</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif,'Courier New', Courier, monospace;
            font-size: 18px;
            background: url(img/universe.jpg) no-repeat no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        form {
            width: 30%;
            height: 300px;
            background-color: lightskyblue;
            margin: auto;
            opacity: 0.9;
            box-shadow: 5px 5px 5px 5px grey;
        }
       input{
            width: 40%;
            height: 25px;
            margin: 20px;
            border: 3px solid black;
            border-radius: 10px;
            outline: none;
            display:block;
        }
    </style>
</head>
<body>
    <div style="width: 100%;height:150px;"></div>
     <form action="updateuser_action.php?id=<?php echo $row['id'];?>" method="post">
         <center>
             <span style="display: block;">修改用户信息</span>
             <input type="text" name="username" placeholder="新的用户姓名" required>
             <input type="text" name="password" placeholder="新的用户密码" required>
             <input type="submit" value="提交编辑">
         </center>
     </form>
</body>
</html>