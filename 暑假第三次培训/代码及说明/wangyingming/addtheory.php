<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加新闻</title>
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
    <form action="addtheory_action.php" method="POST" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td align="center">
                    <a href="theorytitlelook.php" target="_blank">查看已经发布的理论列表</a>
                </td>
                <td align="center">
                    <a href="more/morelist2.php" target="_blank">页面查看理论列表</a>
                </td>
            </tr>
            <tr>
                <td class="left">作者姓名：</td>
                <td class="right"><input type="text" name="author" autocomplete="off" ></td>
            </tr>
            <tr>
                <td class="left">理论新闻标题</td>
                <td class="right"><input type="text" name="title" autocomplete="off" ></td>
            </tr>
            <tr>
                <td class="left">理论新闻内容</td>
                <td class="right"><textarea rows="15" cols="40" name="content" autocomplete="off" ></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="file" name="myfile">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="发布">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>