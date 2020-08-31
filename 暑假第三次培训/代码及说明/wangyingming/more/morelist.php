<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>more-统战部</title>
		<link rel="stylesheet" href="css/new_file.css">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/new_file.js"></script>
	</head>
	<body>
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
					<li><a href="../start.php">首页</a>
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
					<li><a href="../download/download.php">下载专区</a>
						<ul class="navsec">
							<li><a href="download.php">资料下载</a></li>
						</ul>
					</li>
					<li><a href="">联系我们</a>
						<ul class="navsec">
							<li><a href="../messageboard/messageboard.php">留言板</a></li>
							<li><a href="">微博</a></li>
							<li><a href="">联系方式</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- 中间部分 -->
		<div class="operationdiv">
			<div class="operation">
				<div class="leftbar">
					<div class="contacttips">
						<span>理论学习</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<a href=""><span>理论学习</span></a>
						<a href=""><span>通知公告</span></a>
						<a href=""><span>新闻速递</span></a>
						<a href=""><span>统战忆往</span></a>
						<a href=""><span>人物采风</span></a>
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
				<div class="filedownload">
					<div class="title">
						<div class="room">
							<img src="img/icon-index.png" alt="">
						</div>
						<span>当前位置 : </span>
						<a href="../start/start.html" class="start"><span>首页&nbsp;&nbsp;></span></a>
						<a href=""><span>&nbsp;&nbsp;理论学习&nbsp;&nbsp; ></span></a>
					</div>
					<div style="border-bottom:2px dashed rgb(153, 153, 153) ;"></div>
					<div class="downlist">
						<div class="downlist_content_box">
							<ul class="filename">
								<?php
									$link=new mysqli('localhost','root','','test');
									$link->set_charset('utf8');
									if($link->connect_error)
									{
										echo "<script>alert('数据连接失误');";
									}
									//获取多少条内容
									$sql = "select count(*) from news";
									$res = $link->query($sql);
									$row = $res->fetch_array();
									$total_records = $row[0];
									//分页设置
									$page_banner="";
 									$onepage_records = 6;
 									$total_pages = ceil($total_records / $onepage_records);
 									$onepage_btn = 5 ;
 									$offset = floor(($onepage_btn - 1) / 2) ;
 									$start = 1 ;
 									$end = $total_pages;
									if(empty($_GET['p']) || $_GET['p'] > $total_pages || $_GET['p']<=0)
									{
									  $page = 1;
									}
									else
									{
									  $page = $_GET['p'];
									}
									//
									// $sql="select * from news order by flag desc,time desc";
									$sql="select * from news order by flag desc,time desc limit "
									.($page - 1)*$onepage_records .",$onepage_records";

									$res=$link->query($sql);
									while($row=$res->fetch_assoc())
									{
										$id=$row['id'];
										$title=$row['title'];
										if(1 == $row['flag'])
										{
											echo "
											<li background-color='green'>
											<a href='../details/index.php?id=$id'>$title(置顶内容)</a>
											</li>
											";
										}
										else{
											echo "
											<li>
											<a href='../details/index.php?id=$id'>$title</a>
											</li>
											";
										}
									}
									// $link->close();
								?>
							</ul>
							<ul class="fliedata">
								<?php
								$sql="select * from news order by flag desc,time desc limit "
								.($page - 1)*$onepage_records .",$onepage_records";
								$res = $link->query($sql);
									while($row=$res->fetch_assoc())
										{
											echo "<li>".date("Y-m-d H:i:s",$row['time'])."</li>";
										}
									$res->free();
									$link->close();
								?>
							</ul>
						</div>

						<div class="page_banner_box">
										<?php
											//首页和下一页设置
											if($page > 1)
											{
												$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
												$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page - 1)."'>< 上一页</a>";
											}else
											{
												$page_banner.="<span class='start'>首页</a></span>";
												$page_banner.="<span class='prev'>< 上一页</a></span>";
											}
											//开始进行对分页条的数字设置
											if($total_pages > $onepage_btn)
											{//判断是否拥有省略号
												if($page > $offset + 1 )
												{
													$page_banner.="···";
												}
											//设置下方数字从哪个数字开始
												if($page > $offset)
												{
													$start = $page - $offset ;
													$end = $total_pages > $page + $offset ? $page + $offset : $total_pages;
												}else
												{
													$start = 1 ;
													$end = $total_pages > $onepage_btn ? $onepage_btn : $total_pages ; 
												}
											//判断偏移是否超出做大的页面范围
												if( $page + $offset > $total_pages)
												{
													$start = $start - ($page + $offset - $end) ;
												}
											}
											for($i = $start ; $i <= $end ; $i++)
											{
												if($i == $page)
													{
														$page_banner.= "<span id='current_p'>{$i}</span>";
													}
													else{
														$page_banner.= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
													}
											}

											if($total_pages > $onepage_btn && $total_pages > $page + $offset)
											{
												$page_banner.="···";
											}

											if($page < $total_pages)
											{
												$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页 ></a>";
												$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>" ;
											}
											else
											{
												$page_banner.="<span class='next'>下一页 ></span>";
												$page_banner.="<span class='end'>尾页</span>" ;
											}

											$page_banner.="<strong> 第{$page}/{$total_pages}页</strong>";
											echo $page_banner ;
										?>
										<form action="morelist.php?p=" method="GET" class="toconveryp">
												<strong> 跳转到第</strong>
												<input type="text" name="p" autocomplete="off" >
												<strong>页</strong>
												<input type="submit" value="跳转">
										</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 底部 -->
		<div class="foot">
			
		</div>
		<div class="information">
			<p>Copyright &copy; 2019 河南大学党委统战部 技术支持河南大学 <a href="#">107网站工作室</a> <a href="#">管理后台</a></p>
			<p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
		</div>
	</body>
</html>
