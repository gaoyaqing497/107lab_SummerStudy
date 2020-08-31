<html>
	<head>
		<title>新闻内容</title>
		<script type="text/javascript">
			function dodel(id){
				if(confirm("ȷ��Ҫɾ����")){
					window.location="action.php?action=del&id="+id;
				}
			}

		</script>
	</head>
	<body>
		<div align="center">
			<?php
			include("menu.php");?>

			<h3>新闻内容</h3>
			<table style="width:880" border="1px">
				<tr>
					<th>序号</th><th>标题</th><th>关键词</th>
					<th>作者</th><th>发布时间</th><th>新闻内容</th>
				</tr>
				<?php
						require("dbconfig.php");
						require("../common.php");
						header('content-type:text/html;charset=utf-8');
						$mysqli->set_charset('utf-8');
						$id=$_GET['id'];
						$k=$_GET['k'];
						if($k>0){
						    $sql = "select * from news where id=$id";
						    $result=$mysqli->query($sql);
						}else{
						    $sql = "select * from xwsd where id=$id";
						    $result=$mysqli->query($sql);
						}
						$result=$mysqli->query($sql);

					if($result && $result->num_rows>0){
					   $row=$result->fetch_assoc();
							echo "<tr>";
							echo "<td>{$row['id']}</td>";
							echo "<td>{$row['title']}</td>";
							echo "<td>{$row['keywords']}</td>";
							echo "<td>{$row['author']}</td>";
							echo "<td>{$row['addtime']}</td>";
							echo "<td>{$row['content']}</td>";
							echo "</tr>";
					}
					
						$mysqli->close();
				?>
			</table>
		</div>
	</body>
</html>