<?php
$link=new mysqli('localhost','root','','test');
$link->set_charset('utf8');
if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$id=$_GET['id'];
$sql="select * from news where id='$id'";
$res = $link->query($sql);
if($res)
{
    $row = $res->fetch_assoc();
}
else
{
    echo "?????";
}
$link->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑新闻</title>
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
            width: 40%;
            margin: 100px auto;
            background-color: rebeccapurple;
            border: 2px;
            text-align:justify;
        }
        .left{
            color: wheat;
        }
        a{
            text-decoration:none;
            color: wheat;
        }
    </style>
</head>
<body>
    <form action="edit_news_action.php?id=<?php echo $row['id'];?>" method="POST">
        <table border="1">
            <tr>
                <td class="left">编辑新闻标题</td>
                <td class="right"><input type="text" name="title" value="<?php echo $row['title'];?>"></td>
            </tr>
            <tr>
                <td class="left">编辑新闻内容</td>
                <td class="right"><textarea rows="15" cols="40" name="content"><?php echo $row['content'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="提交修改">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>