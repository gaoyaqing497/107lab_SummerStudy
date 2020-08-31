<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>新闻发布</title>
		<style>
			.user{
				width: 300px;
				height:450px;
				background-color:white;
				padding-top:20px;
				margin: auto;
				font-family: "宋体";
				font-size: 15px;
				border:solid 1px gainsboro;
			}
			.u1{
				width:90% ;
				height:30px ;
				margin: 5px 5%;
				border:solid 1px gainsboro;
				background-color: whitesmoke;
			}
			.u2{
				width:90% ;
				height:150px ;
				margin: 5px 5%;
				border:solid 1px gainsboro;
				background-color: whitesmoke;
			}
			.u3{
				width:60% ;
				margin: 5px 5%;
				border:solid 1px gainsboro;
				background-color: whitesmoke;
			}
			h2,h4{
				text-align: center;
			}
			.button1{
			width: 50%;
			height: 25px;
			margin-top:10px ;
			margin-bottom:10px ;
			margin-left: 25%;
			background-color:#AEDD81;
			color: white;
			border: none;
			border-radius:7px 7px 7px 7px ;
		}
		</style>
	</head>
	<body>
		<?php
			$error=isset($_GET["error"])?$_GET["error"]:"";
			echo"
			   <script  type=\"text/javascript\">
					switch($error){
						 case 1:
					            alert (\"文件超过限制！\");
					            break;
					     case 2:
					           alert (\"文件超过表单限制！\");
					           break;
					     case 3:
					      		alert (\"文件部分上传！\");
					           break;
					     case 4:
					      		alert (\"未选择文件。\");
					           break;
					     case 6:
					      		alert (\"哎呀，没有找到临时目录\");
					           break;
					     case 7:
					      		alert (\"系统错误！\");
					           break;
					     case 10:
					           alert (\"文件类型不支持哦！\");
					           break;
					     case 11:
					           alert (\"发布成功啦！去看看吧\");
					           break;
					     case 12:
					           alert (\"内容不能为空。\");
					           break;
						}   	   	  
			   </script>
			";
	    ?>
		 <form class="user" action="Publish_action.php" method="post" enctype="multipart/form-data">
			<h2>新闻发布</h2>
			<input class="u1" placeholder="请输入文章标题" type="text" name="title">
				
			<input class="u1" placeholder="请输入文章作者" type="text" name="author">
			
			<textarea class="u2" placeholder="请输入文章内容" name="content"></textarea>

			<input  class="u3" type="file" name="myfile"/>
			
			<input class="button1" type="submit" value="发布" >
		</form>
		<h4><a href="../index.php">返回首页</a></h4>
	</body>
</html>

 
 
