<?php
    header("Content-type:text/html;charset=UTF-8");
    session_start();
    $link = mysqli_connect('localhost','root','123456');
    $select = mysqli_select_db($link,'text');
    mysqli_set_charset($link,'utf8');
    if($link){
        $sql = "select * from main;";
        $top_url = "select title from main where id = '1';";
        $top_result =mysqli_query($link,$top_url);
        $top=mysqli_fetch_row($top_result);
        $result = mysqli_query($link,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        $rows=array_reverse($rows);
        $_SESSION['top']=$top[0];
        
        
        function news($pageNum = 1, $pageSize = 4)
        {
            $array = array();
            $link = mysqli_connect('localhost','root','123456');
            mysqli_set_charset($link,'utf8');
            mysqli_select_db($link,"text");
            $rs = "select * from main limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
            $r = mysqli_query($link, $rs);
            while ($obj = mysqli_fetch_object($r)) {
                $array[] = $obj;
            }
            mysqli_close($link,"text");
            /* $array = array_reverse($array); */
            return $array;
        }

        function allNews()
        {
            $link = mysqli_connect('localhost','root','123456');
            mysqli_set_charset($link,'utf8');
            mysqli_select_db($link,"text");
            $rs = "select count(*) num from main";
            $r = mysqli_query($link, $rs);
            $obj = mysqli_fetch_object($r);
            mysqli_close($link,"text");
            return $obj->num;
        }
        @$allNum = allNews();
 
        @$pageSize = 6;
 
        @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
 
        @$endPage = ceil($allNum/$pageSize);
 
        @$array = news($pageNum,$pageSize);

    }else{
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>理论学习-统战部</title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/more.css">
    <link rel="stylesheet" href="../css/moreleft.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../js/header.js"></script>
    <script type="text/javascript" src="../js/moreleft.js"></script>
    <script>
        $(function () {  
            $('#b1').click(function(){
	        val = $('#p').val();
	        if(!val){
	        	alert('请输入页码！');
		    }else{
		        if(val.match(/^\d+$/g)){
		    	    location='llxx.php?pageNum='+val;
		    	}else{
		    	}
		    }
            })
        })
    
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <a name="top"><img src="../images/top-bj2.gif" alt="NO FOUND"></a>
            <div class="headerfunc">
                <p>设为首页</p>
                <p><span>|</span></p>
                <p>加入收藏</p>
            </div>
            <div class="search">
                <div class="searchip">
                    <input type="text" placeholder="请输入搜索关键字">
                </div>
                <div class="searchbt">
                    <button>搜索</button>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="menu">
            <ul class="menupart">
                <a href="../index.php"><li>首页</li></a>
                <li><a href="bmjs.html">部门介绍</a>
                    <ul class="selected">
                        <li><a href="gzzz.html">工作职责</a></li>
                        <li><a href="gzzz.html">机构及人员</a></li>
                        <li><a href="gzzz.html">领导小组</a></li>
                    </ul>
                </li>
                <li><a href="dptt.html">党派团体</a>
                    <ul class="selected">
                        <li>民革河南大学支部</li>
                        <li>民盟河南大学委员会</li>
                        <li>民进河南大学总支委员会</li>
                        <li>民建河南大学总支委员会</li>
                        <li>农工党河南大学委员会</li>
                        <li>九三学社河南大学委员会</li>
                        <li>河南大学侨联</li>
                        <li>河南大学知联会</li>
                        <li>河南大学留联会</li>
                    </ul>
                </li>
                <li><a href="rdzx.html">人大政协</a>
                    <ul class="selected">
                        <li>人大政协</li>
                    </ul>
                </li>
                <li><a href="jyxc.html">建言献策</a>
                    <ul class="selected">
                        <li><a href="jyxc.html">建言献策</a></li>
                    </ul>
                </li>
                <li><a href="zcfg.html">政策法规</a>
                    <ul class="selected">
                        <li>理论经纬</li>
                        <li>学习资料</li>
                        <li>会议纪要</li>
                        <li>工作记事</li>
                    </ul>
                </li>
                <li><a href="mzzj.html">民族宗教</a>
                    <ul class="selected">
                        <li>民族工作</li>
                        <li>宗教工作</li>
                    </ul>
                </li>
                <li><a href="xzzq.html">下载专区</a>
                    <ul class="selected">
                        <li><a href="zlxz.html">资料下载</a></li>
                    </ul>
                </li>
                <li><a href="lxwm.html">联系我们</a>
                    <ul class="selected">
                        <li><a href="lyb.html">留言板</a></li>
                        <li>微博</li>
                        <li>联系方式</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="left">
                <div class="left1">
                    <li class="title">理论学习
                        <li><a href="">理论学习</a></li>
                        <li><a href="">通知公告</a></li>
                        <li><a href="">新闻速递</a></li>
                        <li><a href="">统战忆往</a></li>
                        <li><a href="">人物风采</a></li>
                    </li>
                </div>
                <div class="left3">
                    <li class="title">校园风光</li>
                    <div class="leftpic">
                        <img src="../images/nature2.jpg" alt="NO FOUND">
                        <img src="../images/nature3.jpg" alt="NO FOUND">
                        <img src="../images/nature4.jpg" alt="NO FOUND">
                    </div> 
                </div>
                <div class="left2">
                    <li class="title">相关链接
                        <li><a href="">中共中央统一战线工作部</a></li>
                        <li><a href="">中共河南省委统战部</a></li>
                        <li><a href="">开封市委统战部</a></li>
                        <li><a href="">河南大学</a></li>
                        <li><a href="">"河大统战"杂志</a></li>
                    </li>
                </div>
            </div>
            <div class="right">
                <div class="righttitle">
                    <img src="../images/icon-index.png" alt="NO FOUND">
                    <p>当前位置：</p>
                    <a href="../index.php"><p>首页 </p></a>
                    <p>> 理论学习 </p>
                    <p> ></p>
                </div>
                <div class="rightmain">
                    <div class="rightpoint">
                    <?php foreach($array as $key => $v) {
                            echo '<img src="../images/dotted.gif" alt="NO FOUND">';
                        }
                        ?>
                    </div>
                    <div class="righttext">
                    <?php 
                    if($top){
                        echo "<font color='red'>{$top[0]}*</font>";
                        echo "<a href='textqxzd.php'><font size='2px' color='gray'>&nbsp;&nbsp;取消置顶</font></a>";
                    }
                    ?>    
                    <?php foreach($array as $key => $v) {
                            if($v->id==0){
                                echo "<li><a href='zw01.php' target='_blank' title='中国共产党统一战线工作条例(示例)'>{$v->title}</a></li>";
                            }       
                        }
                    ?>
                    </div>
                    <div class="rightdate">
                    <?php foreach($array as $key => $v) {
                            echo "<li>{$v->time}</li>";
                        }
                    ?>
                    </div>
                    <div class="rightfunc">
                        <p>共<?php
                            echo $allNum;
                        ?>条</p>
                        <p><?php
                            echo "{$pageNum}/{$endPage}";
                        ?></p>
                        <a style="color:black;" href="?pageNum=1" rel="external nofollow" rel="external nofollow" >首页</a>
                        <a style="color:black;" href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>" rel="external nofollow" rel="external nofollow" >上页</a>
                        <a style="color:black;" href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>" rel="external nofollow" rel="external nofollow" >下页</a>
                        <a style="color:black;" href="?pageNum=<?php echo $endPage?>" rel="external nofollow" rel="external nofollow" >尾页</a>   
                        <span>跳转至&nbsp<input type='text' id='p' class='p' style='width: 30px;height:15px'>页</span>
                        <button class='btn btn-success' id='b1' style="cursor:pointer;">GO</button>
                    </div>
                    <div class="savebtn">
                        <a href="../texttj.php"><input type="button" id="save" value="添加"></a>
                        <a href="textdelete.php"><input type="button" id="delete" value="删除"></a>
                        <a href="textzd.php"><input type="button" id="delete2" value="置顶"></a>
                        <a href="textfix.php"><input type="button" id="update" value="修改"></a>
                    </div>
                    <form class="searchText" method="post" action="searchDate.php">
                        查找: <input type="text" placeholder="文章日期(可为空)" name="date">
                        <input type="submit" name="submit">
                    </form>
                    <form class="searchText" method="post" action="searchTitle.php">
                        查找: <input type="text" placeholder="文章标题关键字(可为空)" name="title">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
            <div class="footertitle"></div>
            <div class="footerp">
                <p>Copyright © 2019 河南大学党委统战部 技术支持河南大学 107网站工作室 管理后台</p>
                <p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
            </div>
        </div>
    </footer>
    <div class="function">
        <a href="#top"><img src="../images/dian.png" alt="NO FOUND"></a>
    </div>
</body>
</html>
