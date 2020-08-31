<html>
<head>
   <meta http-equiv="Content-type" content="text/html;charset=utf-8"
</head>
<body>
<?php



  /*1.传入页码*/
  $page = $_GET['p'];
  /*2.根据页码取出数据：php->mysql处理*/
  $host = "localhost";
  $username = "root";
  $password = " ";
  $db = " test";
  //连接数据库
  $conn = mysql_conect($host,$username,$password);
  if(!$conn){
	echo "数据库连接失败"；
	exit；
  }
  //选择操作的数据库
  mysql_select_db($db);
  //设置数据库编码格式
  mysql_query('SET NAMES UTF8');
  //编写sql获取分页数据
  $sql = 'SELECT * FROM page LIMIT' .($page-1) * 10,"10";
  //把sql语句传送数据库
  $result = mysql_query($sql);
  //处理数据
  echo "<table border= 1 cellspacing =0 width=40%>";
  echo "<tr><td>ID</td><td>NAME</td></tr>";  
  while（$row = mysql_fetch_assoc($result)）{
	  echo"<tr>"
	  echo"<td>{$row['id']}</td>";
	  echo"<td>{$row["name"]}</td>";
	  echo"</tr>";
  }
  echo"table";
  //释放结果，
  mysql_free_result（$result）;
  mysql_close($conn);
  /*3.显示数据+分页条*/
  $page_banner =" a href =".$_SERVER['PHP_SELF']."?p=".($page-1)">上一页"</a>;
  $page_banner.="<a href=" .$_SERVER['PHP_SELF']."?p=".($page+1)">下一页</a>";
  echo $page_banner;
  /*8太完美*/
</body>
</html>