<?php
header('content-type:text/html;charset=utf-8');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>统战部</title>
		<link rel="stylesheet" href="css/start.css">
		<script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/start.js"></script>
        <style>
            .welcome{
               position:absolute;
               left:35%;
                font-size:25px;
                color:blue;
                display:block;
            }
            .tomanage{
               position:absolute;
               left:25%;
                font-size:20px;
                color:blue;
                display:block;
            }
        </style>
	</head>
	<body>
		<!-- 图片头部 -->
		<div class="head">
			<div class="backgroundimg">
				<img src="img/top-bj2.gif" alt="">
			</div>
            <span class="welcome">
                <?php
                    echo 'welcome administrator';
                ?>
                <span class="tomanage"><a target="_blank" href="user_list.php?username=<?php $username=$_GET['username'];echo $username;?>" style="color:blue;">点击这里管理成员</a></span>
            </span>
			<div class="headconcent">
				<div class="settings">
					<span>设为首页</span>
					<span>|</span>
					<span>加入收藏</span>
					<span><a href="addnews.php" style="color:white" target="_blank">发布新闻</a></span>
					<span><a href="addtheory.php" style="color:white" target="_blank">发布理论</a></span>
					<span>
					<a href="admin_edit.php?username=<?php $username=$_GET['username'];echo $username;?>"  style="color:white">用户姓名:
                     <?php 
							$username=$_GET['username'];
							if(empty($username))
							{
								echo "<script>alert('你还没有登陆，无法查看这个网站');
									// location = 'login.php';
								</script>";
								// exit(0);
							}
							echo $username;
                        ?>
					</a>
					<a href="admin_edit.php?username=<?php $username=$_GET['username'];echo $username;?>" style="color:white">修改信息

					</a>
                    </span>
					<span><a href="login.php" style="color:white">退出</a></span> 
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
					<li><a href="start.html">首页</a>
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
					<li><a href="">下载专区</a>
						<ul class="navsec">
							<li><a href="../download/download.html" target="_self">资料下载</a></li>
						</ul>
					</li>
					<li><a href="">联系我们</a>
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
		<div class="redimg">
			<div class="imgtext">
				<a href=""><span>培养当代大学生的家国情怀和国际视野</span></a>
			</div>
		</div>
		<!--  -->
		<div class="textbox">
			<div class="textconcent">
				<div class="top">
					<div class="top_left">
						<ul class="banner">
							<li><img src="img/nature2.jpg" alt=""></li>
							<li><img src="img/nature3.jpg" alt=""></li>
							<li><img src="img/nature4.jpg" alt=""></li>
						</ul>
						<ul class="dot">
							<li class="dotcolornew">1</li>
							<li class="dotcolorother">2</li>
							<li class="dotcolorother">3</li>
						</ul>
					</div>
					<div class="top_center">
						<div class="top_center_top">
							<div class="title">
								<a href="#"><span>—理论学习—</span></a>
							</div>
							<div class="more">
								<a href="more/morelist.php"><span>more<div style="display: inline;background-color:rgb(245, 170, 2);border-radius: 50% 50%;">>></div></span></a>
							</div>
						</div>

						<div class="top_center_center">
						<?php
								$link= new mysqli('localhost','root','','test');
								$link->set_charset('utf8');

								$sql = "select * from news order by flag desc,time desc";
								$res = $link->query($sql);

								if($res)
								{
									while($row = $res->fetch_assoc())
									{
										$rows[]=$row;
									}
								}
							
							?>
							<ul class="capital">
								<?php
									$judge = 1;
									foreach($rows as $value)
									{
										$title = $value['title'];
										$id = $value['id'];
											echo "<li>
											<a href='details/index.php?id=$id'>$title</a>
										</li>";
										$judge++;
										if($judge>=8)
										{
											break;
										}
									}
								?>
							</ul>
							<ul class="data">
							<?php
									$judge = 1;
									foreach($rows as $value)
									{
										$time= $value['time'];
											echo "<li>".date("m",$value['time'])."月".date("d",$value['time'])."日"."</li>";
										$judge++;
										if($judge>=8)
										{
											break;
										}
									}
									
								?>
							</ul>
						</div>
					</div>
					<div class="top_right">
						<div class="top_right_top">
							<div class="title">
								<a href="#"><span>—通知公告—</span></a>
							</div>
							<div class="more">
								<a href="more/morelist2.php"><span>more<div style="display: inline;background-color:rgb(245, 170, 2);border-radius: 50% 50%;">>></div></span></a>
							</div>
						</div>
						<div class="top_right_center">
						<?php
								
								$sql_the = "select * from theory order by flag desc,time desc";
								$res_the = $link->query($sql_the);

								if($res_the)
								{
									while($row_the = $res_the->fetch_assoc())
									{
										$rows_the[]=$row_the;
									}
								}
							
							?>
							<ul class="capital">
							<?php
									$judge_the = 1;
									foreach($rows_the as $value_the)
									{
										$title_the = $value_the['title'];
										$id_the = $value_the['id'];
											echo "<li>
											<a href='details/index2.php?id=$id_the'>$title</a>
										</li>";
										$judge_the++;
										if($judge_the>=8)
										{
											break;
										}
									}
								?>
							</ul>
							<ul class="data">
									<?php
										$judge_the = 1;
										foreach($rows_the as $value_the)
										{
											$time_the= $value_the['time'];
												echo "<li>".date("m",$value_the['time'])."月".date("d",$value_the['time'])."日"."</li>";
											$judge_the++;
											if($judge_the>=8)
											{
												break;
											}
										}
										$link->close();
									?>
							</ul>
						</div>
					</div>
				</div>
				<!-- 中部 -->
				<div class="middle">
					<div class="middle_left">
						<div class="middle_left_top">
							<div class="title">
								<div class="img"><img src="img/tzb_sign1.gif" alt=""></div>
								<a href="#"><span>新闻速递</span></a>
							</div>
							<div class="more">
								<a href="more/morelist.php"><span>more<div style="display: inline;background-color:rgb(245, 170, 2);border-radius: 50% 50%;">>></div></span></a>
							</div>
						</div>
						<img src="img/tzb_sign2.gif" alt="" style="display: block;">
						<div class="middle_left_center">
							<ul class="capital">
								<li><a href="#" style="color: darkgoldenrod;"><span>></span>在灾难大考中坚定报国力行的使命担当</a></li>
								<li><a href="#"><span>></span>我校两名党外知识分子获殊荣</a></li>
								<li><a href="#"><span>></span>我校两名党外知识分子获殊荣</a></li>
								<li><a href="#"><span>></span>辛永芬、段亚广获得“中国语言资源……</a></li>
								<li><a href="#"><span>></span>河南大学统一战线抗击疫情系列报道：……</a></li>
								<li><a href="#"><span>></span>河南大学统一战线抗击疫情系列报道：……</a></li>
							</ul>
							<ul class="data">
								<li>04月08日</li>
								<li>04月03日</li>
								<li>04月02日</li>
								<li>04月02日</li>
								<li>04月02日</li>
								<li>04月02日</li>
							</ul>
						</div>
					</div>
					<div class="middle_center">
						<div class="middle_center_top">
							<div class="title">
								<div class="img"><img src="img/tzb_sign1.gif" alt=""></div>
								<a href="#"><span>统战记忆</span></a>
							</div>
							<div class="more">
								<a href="../more/morelist.html"><span>more<div style="display: inline;background-color:rgb(245, 170, 2);border-radius: 50% 50%;">>></div></span></a>
							</div>
						</div>
						<img src="img/tzb_sign2.gif" alt="" style="display: block;">
						<div class="middle_center_center">
							<ul class="capital">
								<li><a href="../details/index.html" style="color: darkgoldenrod;"><span>></span>心系祖国和平统一大业的将军</a></li>
								<li><a href="../details/index.html"><span>></span>我与河大台联</a></li>
								<li><a href="../details/index.html"><span>></span>河南大学统战工作和海外学子</a></li>
								<li><a href="../details/index.html"><span>></span>难忘的记忆</a></li>
								<li><a href="../details/index.html"><span>></span>我的回忆</a></li>
								<li><a href="../details/index.html"><span>></span>风雨同舟 无怨无悔</a></li>
							</ul>
							<ul class="data">
								<li>04月08日</li>
								<li>04月03日</li>
								<li>04月02日</li>
								<li>04月02日</li>
								<li>04月02日</li>
								<li>04月02日</li>
							</ul>
						</div>
					</div>
					<div class="middle_right">
						<div class="middle_right_top">
							<div class="title">
								<div class="img"><img src="img/tzb_sign1.gif" alt=""></div>
								<a href="#"><span>人物风采</span></a>
							</div>
							<div class="more">
								<a href="../more/morelist.html"><span>more<div style="display: inline;background-color:rgb(245, 170, 2);border-radius: 50% 50%;">>></div></span></a>
							</div>
						</div>
						<img src="img/tzb_sign2.gif" alt="" style="display: block;">
						<div class="middle_right_center">
							<ul class="capital">
								<li><a href="../details/index.htm" style="color: darkgoldenrod;"><span>></span>丁中一：心中所爱，始终如一</a></li>
								<li><a href="../details/index.htm"><span>></span>张绮捷：医者仁心 止于至善</a></li>
								<li><a href="../details/index.htm"><span>></span>杜祖亮：仰望星空 脚踏实地</a></li>
								<li><a href="../details/index.htm"><span>></span>专属秦奋的勤奋之道</a></li>
								<li><a href="../details/index.htm"><span>></span>师冰洋：那些年在铁塔下</a></li>
								<li><a href="../details/index.htm"><span>></span>师之楷模，德之典范——怀念黄魁吾教授</a></li>
							</ul>
							<ul class="data">
								<li>04月09日</li>
								<li>03月10日</li>
								<li>12月12日</li>
								<li>11月25日</li>
								<li>11月15日</li>
								<li>10月08日</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="bottom">
					<div class="QRcode1">
						<div>
							<div class="img">
								<img src="img/ecode_left.jpg" alt="">
							</div>
							<div class="word">
								<span>"河大统战"公众号</span>
							</div>
						</div>
					</div>
					<div class="logo">
						<div class="logotop">
							<a href="#"><span>—相关连接—</span></a>
						</div>
						<div class="logolink">
							<ul>
								<li><a href="http://www.zytzb.gov.cn/html/index.html"><img src="img/pc1.gif" alt=""></a></li>
								<li><a href="http://www.rootinhenan.gov.cn/sitesources/rootinhenan/page_pc/index.html"><img src="img/pc2.jpg" alt=""></a></li>
								<li><a href="http://kf.rootinhenan.gov.cn/sitesources/kf/page_pc/index.html"><img src="img/pc8.gif" alt=""></a></li>
								<li><a href="http://www.henu.edu.cn/"><img src="img/pc33.gif" alt=""></a></li>
								<li><a href="http://tzb.henu.edu.cn/index/hdtzzz.htm"><img src="img/pc9.gif" alt=""></a></li>
							</ul>
						</div>
					</div>
					<div class="QRcode2">
						<div>
							<div class="img">
								<img src="img/ecode_right.jpg" alt="">
							</div>
							<div class="word">
								<span>"统战新语"公众号</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="foot">

		</div>
		<div class="information">
			<p>Copyright &copy; 2019 河南大学党委统战部 技术支持河南大学 <a href="#">107网站工作室</a> <a href="#">管理后台</a></p>
			<p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
		</div>
		<div class="up">
			<img src="img/up.png" alt="">
			<div class="coverup">
				<span>返回顶部</span>
			</div>
		</div>
		<!-- 网页窗口移动的图片 -->
		<div class="movediv">
			<img src="img/15196.jpg" alt="">
		</div>
	</body>
</html>
