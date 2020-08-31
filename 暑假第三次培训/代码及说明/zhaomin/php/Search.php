<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>查看搜索结果</title>
	</head>
<style type="text/css">
	h3,h4{
		text-align: center;
	}
   table
        {
        	font-family: "宋体";
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
        }
        table td, table th
        {
        	padding-left: 10px;
        	padding-right: 10px;
            border: 1px solid #cad9ea;
            color: #666;
            height: 30px;
        }
        table thead th
        {
            background-color: #CCE8EB;
            width: 100px;
        }
        table tr:nth-child(odd)
        {
            background: #fff;
        }
        table tr:nth-child(even)
        {
            background: #F5FAFA;
        }
</style>
	<body>
		<h3>搜索结果</h3>
		<table  border="1" with="500">
			<tr><th>作者</th>
				<th>标题</th>
				<th>内容</th>
			</tr>
		<?php
           $link =@new mysqli('localhost','root','','HRM');
			        $link->set_charset('utf8');
			        if($link->connect_errno){
			        die('CONNECT_ERROR:'.$link->connect_errno);
					        }
		        $keywords = isset($_POST['keywords'])?$_POST['keywords']:"";
		        if(isset($_POST['keywords'])){
		        	$sql="select *from News where content like '%{$keywords}%' or author like '%{$keywords}%'";
		        	 $res= $link->query($sql);
		        	 while($row=mysqli_fetch_assoc($res)){
		        	 	    $row['author']=str_replace($keywords,'<font color="red">'.$keywords.'</font>',$row['author']);
		        	 	    $row['content']=str_replace($keywords,'<font color="orange">'.$keywords.'</font>',$row['content']);
				        	echo "<tr>";
				      		echo "<td>{$row['author']}</td>";
				      		echo "<td>{$row['content']}</td>";
				      		echo "<td><a href='../html/decoration_1.html?News_id={$row['id']}'>跳转</a></td>";
				      		echo "</tr>";
		        	 }
		        	echo "</table>";
		        }
		    mysqli_free_result($res);
		    mysqli_close($link);
		    ?>	
	 <h4><a href="../index.php">返回首页</a></h4>
	</body>
</html>
