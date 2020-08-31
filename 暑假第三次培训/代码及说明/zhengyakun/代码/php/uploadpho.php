
<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:./login01.php");

    die();

}
$_SESSION['token']=uniqid();


?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        /*渐变背景样式*/
        body {
            height: 100vh;
            width: 100%;
            overflow: hidden;
            background-image: linear-gradient(125deg, #F44336, #E91E63, #9C27B0, #3F51B5, #2196F3);
            background-size: 400%;
            font-family: "montserrat";
            animation: bganimation 15s infinite;
        }

        @keyframes bganimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /*表单样式*/
        .form {
            width: 85%;
            max-width: 600px;
            /* max-height: 700px; */
            background-color: rgba(255, 255, 255, .05);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 5px #000;
            text-align: center;
            font-family: "微软雅黑";
            color: #fff;
        }

        /*表单标题样式*/
        .form h1 {
            margin-top: 0;
            font-weight: 200;
        }

        .form .txtb {
            border: 1px solid #aaa;
            margin: 8px 0;
            padding: 12px 18px;
            border-radius: 10px;
        }

        .txtb label {
            display: block;
            text-align: left;
            color: #fff;
            font-size: 14px;
        }

        /*姓名 手机 邮箱 备注框样式*/
        .txtb input,
        .txtb textarea {
            width: 100%;
            background: none;
            border: none;
            outline: none;
            margin-top: 6px;
            font-size: 18px;
            color: #fff;
        }

        /*备注框样式*/
        .txtb textarea{
            max-height: 300px;
        }

        /*提交按钮样式*/
        .btn {
            display: block;
           background-color: rgba(156, 39, 176, .5);
            padding: 14px 0;
            color: #fff;
            cursor: pointer;
            margin-top: 8px;
            width: 100%;
            border: 1px solid #aaa;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="form">
    <form action="./uploadsave.php" method="post" enctype="multipart/form-data">
        <h1>图片上传</h1>
        <div class="txtb">
            <label for="">标题:</label>
            <input type="text" placeholder="请输入标题" name="title"></div>
        <div class="txtb">
            <label for="">上传的图片:</label>
            <input type="file" placeholder="" name="uploadfile"></div>
        <div class="txtb">
            <label for="">照片描述:</label>
            <input type="text" placeholder="请输入描述" name="intro">
        </div>
        <div class="txtb">
            <label for="">备注:</label>
            <textarea name="beizhu" id="" ></textarea>
        </div>
        <input type="submit" class="btn" value="提交">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
        <input type="reset" value="重置" class="btn">
    </form>
</div>
</body>
</html>