<?php
require_once("./link1.php");
$keyword=$_POST['search'];
$keysql="select * from newslist where newstitle like '%$keyword%' or  newscontent like '%$keyword' or newstype like '%$keyword%';";
$keyresult=mysqli_query($mysqli,$keysql);

$keyarrs=mysqli_fetch_all($keyresult,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
            background: url(../image/wall1.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .left {
            float: left;
            width: 10%;
            height: auto;
            background: url(../image/leftwall.jpg);
            background-size: 100% 100%;
            border-radius: 10px;


        }
        .search{
            display:none;
        }

        .right {
            float: left;
            width: 90%;
            text-align: center;
            padding-bottom: 10px;
        }

        #exit {
            position: fixed;
            top: 10px;

            right: 50px;
        }



        .top {
            text-align: center;
            border-bottom: 1px solid black;




        }

        .upload {
            display: none;
        }

        .left>li {
            height: 100px;
            font-size: 20px;
            margin: 20px 0;
        }


        .newsstyle {
            display: block;
            margin: 0 auto;
        }

        .addnews {
            display: none;
        }

        #controll {
            display: none;
        }

        .addnews_1 {
            border: 1px solid #000;
            width: 500px;
            height: auto;
            margin: 0 auto;

        }

        .addnews td {
            border: none;
        }



        .left #con {
            margin-top: 50px;
        }

        .newfixed {
            position: fixed;
            top: 20%;
            right: 100px;
            border: 3px solid greenyellow;
        }

        .choice li {
            height: 40px;



        }


        .testno {
            table-layout: fixed;
            width: 1000px;
            margin: 0 auto;
            display: none;


        }
        .exit{
            position:fixed;
            right:20px;

            top:100px;
            font-size:20px;
            color:black;
        }

        .testno td {
            height: 50px;



            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .thtable {
            margin: 0 auto;
            width: 1000px;
            table-layout: fixed;
            display: table !important;
        }

        .testfirst {
            display: table;
        }
    </style>
</head>

<body>
<table width="800" class="thtable">
                <tr>
                    <th>id</th>
                    <th>新闻类型</th>
                    <th>新闻标题</th>
                    <th>新闻内容</th>
                    <th>内容链接</th>
                    <th>日期</th>
                    <th>操作</th>
                    <th>是否置顶</th>
                </tr>
                <table class="testno testfirst">
                    <?php
                    if(isset($keyarrs)){
                    foreach ($keyarrs as $keyarr) {

                       
                    ?>




                            <tr>
                                <td width="100px"><?php echo $keyarr['id'] ?></td>
                                <td><a href=""><?php echo $keyarr['newstype'] ?></a></td>
                                <td><a href="http://www.107test01.com:5556/index/list.php"><?php echo $keyarr['newstitle'] ?></a></td>
                                <td><a href="http://www.107test01.com:5556/index/content.html"><?php echo $keyarr['newscontent'] ?></a></td>
                                <td><a href=""><?php echo $keyarr['content_url'] ?></a></td>
                                <td><a href=""><?php echo $keyarr['date'] ?></a></td>
                                <td>
                                    <a href="#" onclick="newsconfirmch(<?php echo $keyarr['id'] ?>)">修改</a>|
                                    <a href="#" onclick="newsconfirmdel(<?php echo $keyarr['id'] ?>)">删除</a>
                                </td>
                                <td class="center" id="toptd"> <a href="JavaScript:void(0);" onclick="istop(<?php echo $keyarr['id'] ?>)"><?php
                                                                                                                                            $dd = $keyarr['id'];
                                                                                                                                            $sqltop = "select flag from newslist where id=$dd;";
                                                                                                                                            $resulttop = mysqli_query($mysqli, $sqltop);

                                                                                                                                            $idtop = mysqli_fetch_assoc($resulttop);

                                                                                                                                            if ($idtop['flag'] == 1) {
                                                                                                                                                echo "<font color='blue'>是</font>";
                                                                                                                                            } else {
                                                                                                                                                echo "是";
                                                                                                                                            }

                                                                                                                                            ?>
                                    </a>
                                    | <a href="javascript:void(0);" onclick="nistop(<?php echo $keyarr['id'] ?>)">否</a></td>
                            </tr>

                    <?php 
                    } 
                }?>


                </table>
                <div class="exit"><a href="./index.php">退出</a></div>
</body>
</html>