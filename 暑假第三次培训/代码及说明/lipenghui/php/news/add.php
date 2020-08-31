<html>
	<head>
		<title>统战部后台</title>
	</head>
	<body>
		<div align="center">
			<?php include("menu.php"); 
			header('content-type:text/html;charset=utf-8'); 
			require("dbconfig.php");
			?>
			<h3>统战部后台</h3>
			<?php 
			session_start();
				if(isset($_GET['k'])){
					$k=$_GET['k'];
					$_SESSION['k']=$k;
				}else{
					$k=$_SESSION['k'];
				}
				if(!isset($_SESSION['filename'])){
					$_SESSION['filename']='';
				}
			?>
			<form action="action.php?action=add&k=<?php echo $k;?>" method="post" enctype="multipart/form-data">
				<table style="width:320px border:0">
					<tr>
						<td align="right">标题:</td>
						<td><input type="text" name="title" style="width:500"/></td>
					</tr>
					<tr>
						<td align="right">关键词</td>
						<td><input type="text" name="keywords" style="width:500"/></td>
					</tr>
					<tr>
						<td align="right">作者</td>
						<td><input type="text" name="author" style="width:500"/></td>
					</tr>
					<tr>
						<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						<td>文件上传:</td>
						<td><input type="file" name="myFile"><span style="font-size: 13px;">(最大2M)</span></td>
					</tr>
					<tr><td>    </td><td><input type="submit" value="上传文件"></td></tr>
					<tr>
						<td>图片</td>
						<td style="max-width:80%"><?php if(!empty($_SESSION['filename'])) echo "<div><img style='margin:0 auto;border:2px solid red;max-width:600px;max-height:600px' src='../../uploads/{$_SESSION['filename']}'></div>'" ?></td>
					</tr>
					<tr>
						<td>
						<td style="max-width:80%"><?php if(!empty($news['filename1'])) echo "<div><img style='margin:0 auto;border:2px solid red;max-width:600px;max-height:600px' src='../../uploads/{$news['filename1']}'></div>'" ?></td>
						</td>
					</tr>
					<tr>
						<td>
						<td style="max-width:80%"><?php if(!empty($news['filename2'])) echo "<div><img style='margin:0 auto;border:2px solid red;max-width:600px;max-height:600px' src='../../uploads/{$news['filename2']}'></div>'" ?></td>
						</td>
					</tr>
					<tr>
						<td align="right" valign="top">内容</td>
						<td><textarea cols="100" rows="50" name="content"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="添加"/>&nbsp;&nbsp;
							<input type="reset" value="重置"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>