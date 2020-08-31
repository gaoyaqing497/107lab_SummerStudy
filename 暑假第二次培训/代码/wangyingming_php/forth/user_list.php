<?php
$link=new mysqli('localhost','root','','test');

if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
// $username=$_GET['username'];
$link->set_charset('utf8');
// if(empty($username))
// {
// 	echo "<script>alert('你应该网站管理员登陆后访问');
// 		location = 'admin_login.php';
// 	</script>";
// 	exit(0);
// }
$sql = "select * from user";
$res = $link->query($sql);
if($res)
{
    while($row=$res->fetch_assoc())
    {
        $rows[]=$row;
    }
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
        table{
            width: 60%;
            margin: 100px auto;
            background-color: rebeccapurple;
            border: 2px;
            text-align: center;
        }
        td{
            color: wheat;
        }
        a{
            text-decoration:none;
            color: wheat;
        }
    </style>
</head>
<body>
     <table border="1" bgcolor="#abcdef" cellpadding="0">
        <tr>
             <td colspan='4'><a href="adduser.php">添加新的成员</a></td>
        </tr>
         <tr>
             <td>编号</td>
             <td>用户昵称</td>
             <td>用户密码</td>
             <td>管理员操作</td>
         </tr>
         <?php $i=1;foreach($rows as $value):?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $value['username'];?></td>
				<td><?php echo $value['password'];?></td>
				<td><a href="updateuser.php?id=<?php echo $value['id'];?>">更新用户&nbsp;</a>|<a href="deluser.php?id=<?php echo $value['id'];?>">&nbsp;删除用户</a></td>
			</tr>
		<?php $i++;endforeach;?>
     </table>
</body>
</html>