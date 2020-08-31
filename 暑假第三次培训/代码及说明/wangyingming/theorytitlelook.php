<?php
$link=new mysqli('localhost','root','','test');

if($link->connect_error)
{
    echo "<script>alert('数据连接失误');";
}
$link->set_charset('utf8');
$sql = "select * from theory order by flag desc, time desc";
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
    <title>管理已经发布的新闻</title>
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
            font-size:16px;
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
             <td>新闻编号</td>
             <td>新闻标题</td>
             <td>添加时间</td>
             <td>管理员操作</td>
         </tr>
         <?php $i=1;foreach($rows as $value):?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $value['title'];?></td>
				<td><?php echo date("Y-m-d H:i:s",$value['time']);?></td>
                <td>
                    <?php if($value['flag']==1)
                    {
                        $id=$value['id'];
                        echo "<a href='cancletotop_theory.php?id=$id'>取消置顶</a>";
                    }
                    else{
                        $id=$value['id'];
                        echo "<a href='totop_theory.php?id=$id'>置顶</a>";
                    }
                    ?>
                    &nbsp;
                 </a>
                |<a href="delete_theory.php?id=<?php echo $value['id'];?>">
                &nbsp;删除新闻
                </a>
                |<a href="edit_theory.php?id=<?php echo $value['id'];?>">修改新闻</a>
            </td>
			</tr>
		<?php $i++;endforeach;?>
     </table>
</body>
</html>