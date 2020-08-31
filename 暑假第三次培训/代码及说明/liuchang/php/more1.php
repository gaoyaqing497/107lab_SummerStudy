<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','','news');
if($mysqli->connect_errno){
	die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
$sql = "select * from news2 order by releasetime desc";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result&&$mysqli_result->num_rows>0){
	while($row=$mysqli_result->fetch_assoc()){
		$rows[]=$row;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>理论学习-统战部</title>
	<?php 
function news($pageNum = 1, $pageSize = 6)
{
    $array = array();
    $conn = mysqli_connect("localhost", "root");
    mysqli_select_db($conn, "news");
    mysqli_set_charset($conn, "utf8");
    $rs = "select * from news2 limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($conn, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($conn,"news");
    return $array;
}
function allNews()
{
    $conn = mysqli_connect("localhost", "root");
    mysqli_select_db($conn, "news");
    mysqli_set_charset($conn, "utf8");
    $rs = "select count(*) num from news2"; //可以显示出总页数
    $r = mysqli_query($conn, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($conn,"news");
    return $obj->num;
}
    @$allNum = allNews();
    @$pageSize = 6; //约定没页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = news($pageNum,$pageSize);
    ?>
	<meta charset="utf-8" content="text/html">
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<script type="text/javascript" src="https://www.imooc.com/static/lib/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript" src="../js/download-contact.js"></script>
</head>
<body>
<!--头部-->	<div class="header">
	<img src="../images/top-bj2.gif">
	<div class="set">
		<span class="homepage">设为首页</span>
		<span>|</span>
		<span class="collect">加入收藏</span>
		<form action="search.php" method="post">
		<input type="text" name="keywords" placeholder="请输入搜索关键字" class="input-1">
		<input type="submit" name="搜索" value="搜索" class="input-2">
	    </form>
	</div>
</div>
<!--导航栏-->
<div class="nav">
	<ul>
		<li class="nav-show"><a href="loginsucc.php" class="dropbtn">首页</a></li>
		<li class="nav-show"><a href="department.php" class="dropbtn">部门介绍</a>
			<ol>
				<li><a href="department.php">工作职责</a></li>
				<li><a href="department.php">机构及人员</a></li>
				<li><a href="department.php">领导小组</a></li>
			</ol>
		</li>
		<li class="nav-show"><a href="dangpai.php" class="dropbtn">党派团体</a>
			<ol>
				<li><a href="dangpai.php">民革河南大学支部</a></li>
				<li><a href="dangpai.php">民盟河南大学委员会</a></li>
				<li><a href="dangpai.php">民进河南大学总支委员会</a></li>
				<li><a href="dangpai.php">民建河南大学总支委员会</a></li>
				<li><a href="dangpai.php">农工党河南大学委员会</a></li>
				<li><a href="dangpai.php">九三学社河南大学委员会</a></li>
				<li><a href="dangpai.php">河南大学台联</a></li>
				<li><a href="dangpai.php">河南大学侨联</a></li>
				<li><a href="dangpai.php">河南大学知联会</a></li>
				<li><a href="dangpai.php">河南大学留联会</a></li>
			</ol>
		</li>
		<li class="nav-show"><a href="zhengxie.php" class="dropbtn">人大政协</a>
			<ol>
				<li><a href="zhengxie.php">人大政协</a></li>
			</ol>
		</li>
		<li class="nav-show"><a href="advice.php" class="dropbtn">建言献策</a>
			<ol>
			    <li><a href="advice.php">建言献策</a></li>			
		    </ol>
	    </li>
		<li class="nav-show"><a href="fagui.php" class="dropbtn">政策法规</a>
			<ol>
				<li><a href="fagui.php">理论经纬</a></li>
				<li><a href="fagui.php">学习资料</a></li>
				<li><a href="fagui.php">会议纪要</a></li>
				<li><a href="fagui.php">工作记事</a></li>
			</ol>
		</li>
		<li class="nav-show"><a href="religion.php" class="dropbtn">民族宗教</a>
			<ol>
				<li><a href="religion.php">民族工作</a></li>
				<li><a href="religion.php">宗教工作</a></li>
			</ol>
		</li>
		<li class="nav-show"><a href="download.php" class="dropbtn">下载专区</a>
			<ol>
				<li><a href="download.php">资料下载</a></li>
			</ol>
		</li>
		<li class="nav-show"><a href="contact.php" class="dropbtn">联系我们</a>
			<ol>
				<li><a href="contact.php">留言板</a></li>
				<li><a href="contact.php">微博</a></li>
				<li><a href="contact.php">联系方式</a></li>
			</ol>
		</li>
	</ul>
</div>
<!--主体-->
<div class="main">
	<div class="main-left">
		<h2>理论学习</h2>
		<p>理论学习</p>
		<p>通知公告</p>
		<p>新闻速递</p>
		<p>统战忆往</p>
		<p>人物采风</p>
		<h2>校园风光</h2>
		<div class="main-left-pc">
			<ul>
				<li><img src="../images/nature2.jpg"></li>
				<li><img src="../images/nature3.jpg"></li>
				<li><img src="../images/nature4.jpg"></li>
			</ul>
			<ol>
				<li class="current"></li>
				<li></li>
				<li></li>
			</ol>
		</div>
		<h2>相关链接</h2>
		<p>中共中央统一战线工作部</p>
        <p>中共河南省委统战部</p>
        <p>开封市委统战部</p>
        <p>河南大学</p>
        <p>"河大统战"杂志</p>
	</div>
	<div class="main-right">
		<div class="main-right-top">
			<div class="main-right-top-1"><a href="loginsucc.php"><img src="../images/icon-index.png"></a></div>
			<div class="main-right-top-2">当前位置：<a href="loginsucc.php">首页</a>>理论学习></div>
		</div>
		<div class="main-right-bottom">
		 
<table>
<?php
    foreach($array as $key=>$values){
        echo '<tr style="padding-top: 20px; height:20px;line-height:20px;display:inline-block; width:100%;">';
        echo '<td><img src="../images/jiantou2.png"></td>';
        echo "<td style='width:900px;'>{$values->title}<span style='float:right;'>{$values->releasetime}</span></td>";
        echo "</tr>";
    }
?>
 </table>
			<div class="yema" style="margin-top: 30px;">
				<div><span>共<?php echo $allNum;?>条</span></div>
				<div><span><?php echo $pageNum?>/<?php echo $endPage;?></span></div>
				<div><a href="?pageNum=1">首页</a></div>
				<div><a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上页</a></div>
				<div><a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下页</a></div>
				<div><a href="?pageNum=<?php echo $endPage?>">尾页</a></div>
				<div style="border: 0;width: 80px;">
					<form action="more3.php" method="get">
						<input type="submit" value="转到" style="width: 30px; height: 20px; font-size: 10px;background: #a7ccea;">
				        <input type="text" name="pageNum" style="width: 20px; height: 12px; color: black;">页
			        </form>
		       </div>
			</div>
		</div>
	</div>
</div>
<!--页脚-->
<div class="footer">
	<div class="footer-top"></div>
	<div class="footer-bottom">
		<p>Copyright © 2019 河南大学党委统战部 技术支持河南大学 107网站工作室 管理后台</p>
        <p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
	</div>
</div>
</body>
</html>