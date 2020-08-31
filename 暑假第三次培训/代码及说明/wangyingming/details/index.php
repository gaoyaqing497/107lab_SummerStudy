<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" href="css/new_file.css"/>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/new_file.js"></script>
	</head>
	<body>
		<!-- 图片头部 -->
		<div class="head">
			<div class="backgroundimg">
				<img src="img/top-bj2.gif" alt="">
			</div>
			<div class="headconcent">
				<div class="settings">
					<span>设为首页</span>
					<span>|</span>
					<span>加入收藏</span>
				</div>
				<div class="searchbox covercss">
					<input class="search" placeholder="请输入搜索关键字" type="text">
					<input class="button" type="button" value="搜索">
				</div>
			</div>
		</div>
		<!-- 下拉菜单 -->
		<div class="navbardiv">
			<div class="navbar">
				<ul class="navfir">
					<li><a href="../start/start.html">首页</a>
					</li>
					<li><a href="">部门介绍</a>
						<ul class="navsec">
							<li><a href="">工作职责</a></li>
							<li><a href="">机构和人员</a></li>
							<li><a href="">领导小组</a></li>
						</ul>
					</li>
					<li><a href="">党派团体</a>
						<ul class="navsec">
							<li><a href="">民革河南大学支部</a></li>
							<li><a href="">民盟河南大学委员会</a></li>
							<li><a href="">民进河南大学总支委员会</a></li>
							<li><a href="">民建河南大学总支委员会</a></li>
							<li><a href="">农工党河南大学委员会</a></li>
							<li><a href="">九三学舍河南大学委员会</a></li>
							<li><a href="">河南大学台联</a></li>
							<li><a href="">河南大学侨联</a></li>
							<li><a href="">河南大学知联会</a></li>
							<li><a href="">河南大学留联会</a></li>
						</ul>
					</li>
					<li><a href="">人大政协</a>
						<ul class="navsec">
							<li><a href="">人大政协</a></li>
						</ul>
					</li>
					<li><a href="">建言献策</a>
						<ul class="navsec">
							<li><a href="">建言献策</a></li>
						</ul>
					</li>
					<li><a href="">政策法规</a>
						<ul class="navsec">
							<li><a href="">理论经纬</a></li>
							<li><a href="">学习资料</a></li>
							<li><a href="">会议纪要</a></li>
							<li><a href="">工作记事</a></li>
						</ul>
					</li>
					<li><a href="">民族宗教</a>
						<ul class="navsec">
							<li><a href="">民族工作</a></li>
							<li><a href="">宗教工作</a></li>
						</ul>
					</li>
					<li><a href="../download/download.html">下载专区</a>
						<ul class="navsec">
							<li><a href="../download/download.html" target="_self">资料下载</a></li>
						</ul>
					</li>
					<li><a href="../messageboard/messageboard.html">联系我们</a>
						<ul class="navsec">
							<li><a href="../messageboard/messageboard.html">留言板</a></li>
							<li><a href="">微博</a></li>
							<li><a href="">联系方式</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!--  -->
		<div class="operationdiv">
			<div class="operation">
				<div class="leftbar">
					<div class="downtip">
						<span>理论学习</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<a href="../more/morelist.html"><span>理论学习</span></a>
						<a href="index.html"><span>通知公告</span></a>
						<a href="index.html"><span>新闻速递</span></a>
						<a href="index.html"><span>统战记忆</span></a>
						<a href="index.html"><span>人物风采</span></a>
					</div>
					<div class="img">
						<span>校园风光</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<ul>
							<li><img src="img/nature2.jpg" alt=""></li>
							<li><img src="img/nature3.jpg" alt=""></li>
							<li><img src="img/nature4.jpg" alt=""></li>
						</ul>
					</div>
					<div class="morelinks">
						<span>相关连接</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<a href="http://www.zytzb.gov.cn/html/index.html"><span>中共中央统一战线工作部</span></a>
						<a href="http://www.rootinhenan.gov.cn/sitesources/rootinhenan/page_pc/index.html"><span>中共河南省委统战部</span></a>
						<a href="http://kf.rootinhenan.gov.cn/sitesources/kf/page_pc/index.html"><span>开封市统战部</span></a>
						<a href="http://www.henu.edu.cn/"><span>河南大学</span></a>
						<a href="http://tzb.henu.edu.cn/index/hdtzzz.htm"><span>“河大统战”杂志</span></a>
					</div>
				</div>
				<div class="text">
					<div class="title">
						<div class="room">
							<img src="img/icon-index.png" alt="">
						</div>
						<span>当前位置 : </span>
						<a href="../start/start.html" class="start"><span>首页&nbsp;&nbsp;></span></a>
						<a href=""><span class="fordown">&nbsp;&nbsp;理论学习&nbsp;&nbsp; ></span></a>
						<span class="down">&nbsp;&nbsp;正文</span>
					</div>
					<div style="border-bottom:2px dashed rgb(153, 153, 153) ;"></div>
					<div class="textmain">
						<?php
							$link=new mysqli('localhost','root','','test');

							if($link->connect_error)
							{
							    echo "<script>alert('数据连接失误');";
							}
							$link->set_charset('utf8');
							$id=$_GET['id'];
							$sql = "select * from news where id='$id'";
							$res = $link->query($sql);
							if($res)
							{
							    $row=$res->fetch_assoc();
							}
						?>
						 <center>
							<h3><?php echo $row['title'];?></h3>
							<h5>发布时间：<?php echo date("Y-m-d H:i:s",$row['time']);?> </h5>
							<h4>作者：<?php echo $row['author']?></h4>
						</center>
						<div class="picturecontain" style="width:150px;height:150px;background-color:#bfa;float:left;">
						<?php 
									$defualt = "<img src='../uploads/default.jpg' alt='默认图片' style='float:left;width:100%;height:100%'>";
									$picture = "../uploads/"."{$row['id']}".".jpg";
									$outputimg = "<img src='".$picture."' alt='图片' style='float:left;width:100%;height:100%;'>";
									if(!file_exists($picture))
									{
										$picture = "../uploads/"."{$row['id']}".".png";
										if(!file_exists($picture))
										{
											$picture = "../uploads/"."{$row['id']}".".wbmp";
											if(!file_exists($picture))
											{
												$picture = "../uploads/"."{$row['id']}".".gif";
												if(!file_exists($picture))
												{
													echo $defualt;
												}
												else
												{
													echo $outputimg;
												}
											}
											else{
												echo $outputimg;
											}
										}
										else
										{
											echo $outputimg;
										}
									}
									else{
										 echo $outputimg;
									}
								 ?>
						</div>
						<p>
							<?php echo $row['content']?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="foot">
		
		</div>
		<div class="information">
			<p>Copyright &copy; 2019 河南大学党委统战部 技术支持河南大学 <a href="#">107网站工作室</a> <a href="#">管理后台</a></p>
			<p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
		</div>
	</body>
</html>
