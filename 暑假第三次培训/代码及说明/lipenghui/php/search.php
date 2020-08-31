<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜索结果</title>
    <link rel="stylesheet" href="../css/head.css">
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/common.css">
	<script type="text/javascript" src="../jquery/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="../jquery/index.js"></script>
    <script type="text/javascript" src="../jquery/head.js"></script>
    <link rel="stylesheet" href="../css/search.css">
</head>
<body>
<div class="head">
		<div class="headcontent">
			<ul>
				<li>设为首页</li>
				<li>加入收藏</li>
				<form action="search.php" method="POST">
					<ul class="input">
						<li><input class="search1" type="text" name="searchtext" placeholder="请输入搜索关键字"></li>
						<li><input class="search2" type="submit" name="search" value="搜索"></li>
					</ul>
				</form>
			</ul>
		</div>
	</div>

	<!-- navigation -->
	<style type="text/css">
		.nav a{
			width:210px;
		}
	</style>
	<div class="navigation">
		<ul class="nav" id="nav">
			<li>
				<a href="../index.html">首页</a>
			</li>
			<li>
				<a href="">部门介绍</a>
				<ul>
					<li><a href="">工作职责</a></li>
					<li><a href="">机构及人员</a></li>
					<li><a href="">领导小组</a></li>
				</ul>
			</li>
			<li>
				<a href="">党派团体</a>
				<ul>
					<LI><A href="">民革河南大学支部</A> </LI>
					<LI><A href="">民盟河南大学委员会</A> </LI>
					<LI><A href="">民进河南大学总支委员会</A> </LI>
					<LI><A href="">民建河南大学总支委员会</A> </LI>
					<LI><A href="">农工党河南大学委员会</A> </LI>
					<LI><A href="">九三学社河南大学委员会</A> </LI>
					<LI><A href="">河南大学台联</A> </LI>
					<LI><A href="">河南大学侨联</A> </LI>
					<LI><A href="">河南大学知联会</A> </LI>
					<LI><A href="">河南大学留联会</A> </LI>
				</ul>
			</li>
			<li>
				<a href="http://tzb.henu.edu.cn/rdzx/rdzx.htm">人大政协</a>
				<ul>
					<LI><A href="http://tzb.henu.edu.cn/rdzx/rdzx.htm">人大政协</A> </LI>
				</ul>
			</li>
			<li>
				<a href="http://tzb.henu.edu.cn/jyxc/jyxc.htm">建言献策</a>
				<ul>
					<LI><A href="http://tzb.henu.edu.cn/jyxc/jyxc.htm">建言献策</A> </LI>
				</ul>
			</li>
			<li>
				<a href="http://tzb.henu.edu.cn/zcfg.htm">政策法规</a>
				<ul>
					<LI><A href="http://tzb.henu.edu.cn/zcfg/lljw.htm">理论经纬</A> </LI>
					<LI><A href="http://tzb.henu.edu.cn/zcfg/xxzl.htm">学习资料</A> </LI>
					<LI><A href="http://tzb.henu.edu.cn/zcfg/hyjy.htm">会议纪要</A> </LI>
					<LI><A href="http://tzb.henu.edu.cn/zcfg/gzjs.htm">工作记事</A> </LI>
				</ul>
			</li>
			<li>
				<a href="http://tzb.henu.edu.cn/mzzj.htm">民族宗教</a>
				<ul>
					<LI><A href="http://tzb.henu.edu.cn/mzzj/mzgz.htm">民族工作</A> </LI>
					<LI><A href="http://tzb.henu.edu.cn/mzzj/zjgz.htm">宗教工作</A> </LI>
				</ul>
			</li>
			<li>
				<a href="content/xzzq.html">下载专区</a>
				<ul>
					<LI><A href="content/xzzq.html">资料下载</A> </LI>
				</ul>
			</li>
			<li>
				<a href="content/lyb.html">联系我们</a>
				<ul>
					<LI><A href="content/lyb.html">留言板</A></LI>
					<LI><A href="content/wb.html">微博</A> </LI>
					<LI><A href="content/lxfs.html">联系方式</A> </LI>
				</ul>
			</li>
		</ul>
    </div>
    <div class="searchbox">
        <?php
            session_start();
            require_once "common.php";
            $searchtext=isset($_POST['searchtext'])?trim($_POST['searchtext']):'';
            $sql1="select * from news where title like '%{$searchtext}%';";
            $sql2="select * from xwsd where title like '%{$searchtext}%';";
            $sql3="select * from tzyw where title like '%{$searchtext}%';";
            $sql4="select * from rwcf where title like '%{$searchtext}%';";
            $sql5="select * from tzgg where title like '%{$searchtext}%';";
            $result1=$mysqli->query($sql1);
            $result2=$mysqli->query($sql2);
            $result3=$mysqli->query($sql3);
            $result4=$mysqli->query($sql4);
            $result5=$mysqli->query($sql5);
            $mes1=array();
            if(!empty($searchtext)){
                while($row=mysqli_fetch_assoc($result1)){
                    $mes1[]=$row;
                }
                while($row=mysqli_fetch_assoc($result2)){
                    $mes2[]=$row;
                }
                while($row=mysqli_fetch_assoc($result3)){
                    $mes3[]=$row;
                }
                while($row=mysqli_fetch_assoc($result4)){
                    $mes4[]=$row;
                }
                while($row=mysqli_fetch_assoc($result5)){
                    $mes5[]=$row;
                }
            }
            $count=count($mes1)+count($mes2)+count($mes3)+count($mes4)+count($mes5);
            echo "<p style='text-align: right; font-size:13px;color:grey;'>共为您找到结果".$count."个</p>";
            $i=0;
            while($i<count($mes1)){
                echo "<h3><a href='../zw/llxx.html?id={$mes1[$i]['id']} '  target='_blank'>'{$mes1[$i]["title"]}'</h3></a>";
                echo "<div class='mescontent'>'{$mes1[$i]['content']}'</div>";
                $i++;
            }
            $i=0;
            while($i<count($mes2)){
                echo "<h3><a href='../zw/llxx.html?id={$mes2[$i]['id']} '  target='_blank'>'{$mes2[$i]["title"]}'</h3></a>";
                echo "<div class='mescontent'>'{$mes2[$i]['content']}'</div>";
                $i++;
            }
            while($i<count($mes3)){
                echo "<h3><a href='../zw/llxx.html?id={$mes3[$i]['id']} '  target='_blank'>'{$mes3[$i]["title"]}'</h3></a>";
                echo "<div class='mescontent'>'{$mes3[$i]['content']}'</div>";
                $i++;
            }
            while($i<count($mes4)){
                echo "<h3><a href='../zw/llxx.html?id={$mes4[$i]['id']} '  target='_blank'>'{$mes4[$i]["title"]}'</h3></a>";
                echo "<div class='mescontent'>'{$mes4[$i]['content']}'</div>";
                $i++;
            }
            while($i<count($mes5)){
                echo "<h3><a href='../zw/llxx.html?id={$mes5[$i]['id']} '  target='_blank'>'{$mes5[$i]["title"]}'</h3></a>";
                echo "<div class='mescontent'>'{$mes5[$i]['content']}'</div>";
                $i++;
            }
        ?>
    </div>
    <style>
        p{
            text-align: right;
        }
    </style>
</body>
</html>