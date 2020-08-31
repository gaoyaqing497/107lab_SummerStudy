<html>
	<head>
		<title>编辑新闻</title>
	</head>
	<body>
		<div align=center>
			<?php
				session_start();
				include("menu.php"); 
				require("dbconfig.php");
				require("common.php");
				header('content-type:text/html;charset=utf-8');
				$mysqli->set_charset('utf-8');
				if(isset($_GET['id'])){
					$id=$_GET['id'];
					$_SESSION['id']=$id;
				}
				else{
					$id=$_SESSION['id'];
				}
				if(isset($_GET['k'])){
					$k=$_GET['k'];
					$_SESSION['k']=$k;
				}else{
					$k=$_SESSION['k'];
				}
				if($k>0){
				    $sql = "select * from news where id=$id";
					$result=$mysqli->query($sql);
				}else{
				    $sql = "select * from xwsd where id=$id";
				    $result=$mysqli->query($sql);
                }

				if($result && $result->num_rows>0){
					$news = $result->fetch_assoc();
				}else{
					die("查询无结果");
				}
				
			?>

			<h3>编辑新闻</h3>
			<img src="" alt="">
			<form action="action.php?action=update&k=<?php echo $k;?>&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $news['id']; ?>"/>
				<table style="width:320px border:0">
					<tr>
						<td align="right">标题:</td>
						<td><input type="text" style="width:700" name="title" value="<?php echo $news['title']; ?>"/></td>
					</tr>
					<tr>
						<td align="right" >关键词:</td>
						<td><input type="text" style="width:700" name="keywords" value="<?php echo $news['keywords']; ?>"/></td>
					</tr>
					<tr>
						<td align="right" >作者:</td>
						<td><input type="text" style="width:100" name="author" value="<?php echo $news['author']; ?>"/></td>
					</tr>
					<tr>
						<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						<td>文件上传:</td>
						<td><input type="file" name="myFile"><span style="font-size: 13px;">(最大2M)</span></td>
					</tr>
					<tr><td>    </td><td><input type="submit" value="上传文件"></td></tr>
					<tr>
						<td>图片</td>
						<td style="max-width:80%"><?php if(!empty($news['filename'])) echo "<div><img style='margin:0 auto;border:2px solid red;max-width:600px;max-height:600px' src='../../uploads/{$news['filename']}'></div>'" ?></td>
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
						<td align="right" valign="top">内容:</td>
						<!-- <?php echo "<div><img style='margin:0 auto;border:2px solid red;max-width:80%;' src='../../uploads/{$news['filename']}'></div>'" ?> -->
						<td><textarea cols="100" rows="70" name="content"><?php echo $news['content']; ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="编辑"/>&nbsp;&nbsp;
							<input type="reset" value="重置"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>