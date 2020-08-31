<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="../images/校徽.jpg" type="image/gif" >
		<title>发布理论学习</title>
		<link rel="stylesheet" href="../css/login.css">
		<script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/index.js"></script>
	</head>
	<body style="width: 100%;min-width: 1200px;background:url(../images/back.jpg)  no-repeat center center;
    background-size:cover;background-attachment:fixed;background-color:green;">
		<div class="addnews">
		 	<h1 style="margin-left: 39%;">发布理论学习</h1>
		 	<br>
		 	<p style="margin: 0 auto;width: 10%;"><a href="<?php echo "../HTML/theory.php?p=1" ?>">查看理论学习列表</a></p><br>
		 	<form action="add_theorycheck.php" method="post" enctype="multipart/form-data">
			 	<table border="1" width="400">
			 		<tr>
			 			<td align="right">标题:</td>
			 			<td><input type="text" name="title"></td>
			 		</tr>
			 		<tr>
			 			<td align="right">作者:</td>
			 			<td><input type="text" name="writer"></td>
			 		</tr>
			 		<tr>
			 			<td align="right">图片:</td>
			 			<td>
			 				<input type="file" name="pic" onchange="show(this)">
			 				<img id="img" src="" style="margin-left: 70px;">
			 			</td>
			 		</tr>
			 		<tr class="text">
			 			<td align="right" valign="top">内容:</td>
			 			<td><textarea rows="15" cols="40" name="text"></textarea>></td>
			 		</tr>
			 		<tr class="sub">
			 			<td colspan="2" align="center">
			 				<input type="submit" name="submit" value="发布">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 				<input type="reset" value="重置">
			 			</td>
			 		</tr>
			 	</table>
			 	<script>		
			    function show(file){	//显示图片
				    var reader = new FileReader();	// 实例化一个FileReader对象，用于读取文件
				    var img = document.getElementById('img'); 	// 获取要显示图片的标签
				
				    //读取File对象的数据
				    reader.onload = function(evt){
					    img.width  =  "200";
			            img.height =  "150";
				        img.src = evt.target.result;
				    }
			        reader.readAsDataURL(file.files[0]);
			    }	
		        </script>
			</form>
		</div>
		<div class="footer">
			<br><br><br>
			<p>Copyright © 2019 河南大学党委统战部 技术支持<span>河南大学 </span><span>107网站工作室</span><span> 管理后台</span></p>
			<p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
		</div>
	</body>
</html>