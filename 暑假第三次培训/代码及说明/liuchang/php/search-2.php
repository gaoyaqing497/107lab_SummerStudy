<!DOCTYPE html>
<html>
<head>
	<title>搜索页面</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<script type="text/javascript" src="https://www.imooc.com/static/lib/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript" src="../js/download-contact.js"></script>
</head>
<body>
<!--头部-->
<div class="header">
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
<div class="main" style="height: 20000px;">
	<div class="main-left">
		<h2>通知公告</h2>
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
	<div class="main-right" style="height: 20000px;">
		<div class="main-right-top">
			<div class="main-right-top-1"><a href="loginsucc.php"><img src="../images/icon-index.png"></a></div>
			<div class="main-right-top-2">当前位置：<a href="loginsucc.php">首页</a></div>
		</div>
		<div class="main-right-bottom">
		 <?php
$conn = mysqli_connect("localhost", "root");
    mysqli_select_db($conn, "news");
    mysqli_set_charset($conn, "utf8");
$keywords=$_POST['keywords'];
$sql1="select * from news1 where writer like '%$keywords%'";
$sql2="select * from news2 where writer like '%$keywords%'";
$sql3="select * from news1 where title like '%$keywords%'";
$sql4="select * from news2 where title like '%$keywords%'";
$sql5="select * from news1 where content like '%$keywords%'";
$sql6="select * from news2 where content like '%$keywords%'";
$sql7="select * from news1 where releasetime like '%$keywords%'";
$sql8="select * from news2 where releasetime like '%$keywords%'";
$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);
$result4=mysqli_query($conn,$sql4);
$result5=mysqli_query($conn,$sql5);
$result6=mysqli_query($conn,$sql6);
$result7=mysqli_query($conn,$sql7);
$result8=mysqli_query($conn,$sql8);

if(!$result1){
	die('无法读取数据:'.mysqli_error());
}
if(!$result2){
	die('无法读取数据:'.mysqli_error());
}
if(!$result3){
	die('无法读取数据:'.mysqli_error());
}
if(!$result4){
	die('无法读取数据:'.mysqli_error());
}
if(!$result5){
	die('无法读取数据:'.mysqli_error());
}
if(!$result6){
	die('无法读取数据:'.mysqli_error());
}
if(!$result7){
	die('无法读取数据:'.mysqli_error());
}
if(!$result8){
	die('无法读取数据:'.mysqli_error());
}
echo "<table>";
while($row=mysqli_fetch_assoc($result1)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result2)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result3)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result4)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result5)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result6)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result7)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
while($row=mysqli_fetch_assoc($result8)){
	$row['writer'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['writer']);
	$row['title'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['title']);
	$row['content'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['content']);
	$row['releasetime'] = str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['releasetime']);
	echo "<tr><td>{$row['writer']}</td></tr>";
	echo "<tr><td>{$row['title']}</td></tr>";
	echo "<tr><td>{$row['content']}</td></tr>";
	echo "<tr><td>{$row['releasetime']}<hr></td></tr>";
}
echo "</table>";
?>
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