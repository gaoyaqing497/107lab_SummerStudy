<?php
session_start();
require_once "common.php";
$page1=$_GET['p1'];
$page2=$_GET['p2'];
$account = $_GET['username'];
if($account>0){
	$_SESSION['account']=$account;
}
$sql="SELECT id,account FROM user where account='{$_SESSION['account']}'";
$mysqli_result=$mysqli->query($sql);
$row=$mysqli_result->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>cuser</title>
	<style type="">
        a{
        	text-decoration:none;
        	color:black;
		}
    </style>
	<script type="text/javascript">
    </script>
    <script type="text/javascript">
			function dodel(id,k){
				if(confirm("确定要删除吗？")){
					if(k>0){
						window.location="news/action.php?action=del&k=1&id="+id;
					}else{
						window.location="news/action.php?action=del&k=-1&id="+id;
					}
				}
			}
	</script>
	<style>
		a:hover{
			color:red;
		}
		.page{
			margin:15px auto;
			text-align: center;
		}
		.page form{
			display: inline;
			margin: 2px;
		}
		.page a{
			text-decoration: none;
			border: 1px solid #aad;
			padding: 2px 5px 2px 5px;
			margin: 2px;
		}
		.current{
			border:1px solid #009;
			background-color: #009;
			padding: 4px 5px 4px 5px ;
			margin: 2px;
			color:#fff;
			font-weight: bold;
		}
		.disabled{
			text-decoration: none;
			border: 1px solid #eee;
			padding: 2px 5px 2px 5px;
			margin: 2px;
			color:#ddd;
		}
	</style>
</head>
<body>
<h2 style="text-align: center">统战部后台-<a style="font-size: 20px" href='login.php'>退出</a></h2>
	<div style="text-align: center" >
	<a href="#.php">返回首页</a>
	</div>
	<hr style="width:90%">
	<h2 style="text-align:center;">用户信息</h2>
	<table style="margin:0 auto;" border="1px" width='300px' >
		<tr>
			<td>用户名</td>
			<td>操作</td>
		</tr>
		<tr>
			<td><?php echo $_SESSION['account'];?></td>
			<td><a href="editUser.php?id=<?php echo $row['id'];?>&k=-1">更新</a>|<a href='doAction.php?act=delUser&id=<?php echo $row['id'];?>'>注销</a></td>
		</tr>
	</table>
	<div style="margin:0 auto;width:1000px;">
    	<h3 style="text-align:center">理论学习-<a href='news/add.php?k=1'>添加内容</a></h3>
    	<table style="width:80%;margin:0 auto" border="1px" >
			<?php
			$total_sql1="select count(*) from news";
			$total_result1=mysqli_fetch_array($mysqli->query($total_sql1));
			$total1=$total_result1[0];
			$totalpages1=ceil($total1/8);
			if($page1<1){
				$page1=1;
			}else if($page1>$totalpages1){
				$page1=$totalpages1;
			}
			$page11=($page1-1)*8;
			$sql = "select id,title from news ORDER BY flag DESC,top DESC,addtime DESC limit {$page11},8";
			$result=$mysqli->query($sql);
			$sql11 = "select title from news where flag=1";
			$result11=$mysqli->query($sql11);
			echo "<tr style='color:red'><td>置顶文章</td><td style='width:90%;'>{$result11->fetch_assoc()['title']}</td></tr>";
			if($result && $result->num_rows>0){
				$idd=1+($page1-1)*8;
			    while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>$idd</td>";
					echo "<td><a href='news/details.php?id={$row['id']}&k=1'>{$row['title']}</a></td>";
					echo "<td><a href='news/edit.php?id={$row['id']}&k=1'>编辑</a></td>";
					echo "<td><a href='javascript:dodel({$row['id']},1)'>删除</a></td>";
					echo "<td><a href='istop.php?id={$row['id']}&k=1'>置顶</a></td>";
					echo "</tr>";
					$idd++;
				}
			}?>
		</table>
		<?php
			$showPage1=5;
			$page1_1=$page1-1;
			$page1_2=$page1+1;
			// 显示数据页和分页条
			$page_banner1="<div class='page'>";
			//计算偏移量
			$pageoffset1=($showPage1-1)/2;
			if($page1>1){
				$page_banner1.="<a href='".$_SERVER['PHP_SELF']."?p1=1'>首页</a>";
				$page_banner1.="<a href='".$_SERVER['PHP_SELF']."?p1={$page1_1}'><上一页</a>";
			}else{
				$page_banner1.="<span class='disabled'>首页</span>";
				$page_banner1.="<span class='disabled'><上一页</span>";
			}
			//初始化数据
			$start1=1;
			$end1=$totalpages1;
			if($totalpages1>$showPage1){
				if($page1>$pageoffset1+1){
					$page_banner1.="...";
				}
				if($page1>$pageoffset1){
					$start1=$page1-$pageoffset1;
					$end1=$totalpages1>$page1+$pageoffset1?$page1+$pageoffset1:$totalpages1;
				}else{
					$start1=1;
					$end1=$totalpages1>$showPage1?$showPage1:$totalpages1;
				}
				if($page1+$pageoffset1>$totalpages1){
					$start1=$start1-($page1+$pageoffset1-$end1);
				}
			}
			//显示各页
			for($i=$start1;$i<=$end1;$i++){
				if($page1==$i){
					$page_banner1.="<span class='current'>{$i}</span>";
				}else{
					$page_banner1.="<a href='".$_SERVER['PHP_SELF']."?p1=".($i)."'>{$i}</a>";
				}
			}
				
			//尾部省略
			if($totalpages1>$showPage1&&$totalpages1>$page1+$pageoffset1){
				$page_banner1.="...";
			}
			if($page1<$totalpages1){
				$page_banner1.="<a href='".$_SERVER['PHP_SELF']."?p1={$page1_2}'>下一页></a>";
				$page_banner1.="<a href='".$_SERVER['PHP_SELF']."?p1={$totalpages1}'>尾页</a>";
			}else{
				$page_banner1.="<span class='disabled'>下一页></span>";
				$page_banner1.="<span class='disabled'>尾页</span>";
			}
			$page_banner1.="共{$totalpages1}页";
			$page_banner1.="<form action='cuser.php' method='get'>";
			$page_banner1.="到第<input type='text' size='2' name='p1'>页";
			$page_banner1.="<input type='submit' value='确定'>";
			$page_banner1.="</form></div>";
			echo $page_banner1;
		?>


    	<h3 style="text-align:center">新闻速递-<a href='news/add.php?k=2'>添加内容</a></h3>
    	<table style="width:80%;margin:0 auto"border="1px" >
			<?php
			$total_sql2="select count(*) from xwsd";
			$total_result2=mysqli_fetch_array($mysqli->query($total_sql2));
			$total2=$total_result2[0];
			$totalpages2=ceil($total2/8);
			if($page2<1){
				$page2=1;
			}else if($page2>$totalpages2){
				$page2=$totalpages2;
			}
			$page22=($page2-1)*8;
    		$sql = "select id,title from xwsd ORDER BY flag DESC,top DESC,addtime DESC limit {$page22},8";
    		$result=$mysqli->query($sql);
			$sql22 = "select title from xwsd where flag=1";
			$result22=$mysqli->query($sql22);
			echo "<tr style='color:red'><td>置顶文章</td><td style='width:90%;'>{$result22->fetch_assoc()['title']}</td></tr>";
			if($result && $result->num_rows>0){
				$idd=1+($page2-1)*8;
			    while($row=$result->fetch_assoc()){
					echo "<tr>";
					echo "<td>$idd</td>";
					echo "<td><a href='news/details.php?id={$row['id']}&k=-1'>{$row['title']}</a></td>";
					echo "<td><a href='news/edit.php?id={$row['id']}&k=-1'>编辑</a></td>";
					echo "<td><a href='javascript:dodel({$row['id']},-1)'>删除</a></td>";
					echo "<td><a href='istop.php?id={$row['id']}&k=2'>置顶</a></td>";
					echo "</tr>";
					$idd++;
				}
			}?>
		</table>
		<?php
			$showPage2=5;
			$page2_1=$page2-1;
			$page2_2=$page2+1;
			// 显示数据页和分页条
			$page_banner2="<div class='page'>";
			//计算偏移量
			$pageoffset2=($showPage2-1)/2;
			if($page2>1){
				$page_banner2.="<a href='".$_SERVER['PHP_SELF']."?p2=1'>首页</a>";
				$page_banner2.="<a href='".$_SERVER['PHP_SELF']."?p2={$page2_1}'><上一页</a>";
			}else{
				$page_banner2.="<span class='disabled'>首页</span>";
				$page_banner2.="<span class='disabled'><上一页</span>";
			}
			//初始化数据
			$start2=1;
			$end2=$totalpages2;
			if($totalpages2>$showPage2){
				if($page2>$pageoffset2+1){
					$page_banner2.="...";
				}
				if($page2>$pageoffset2){
					$start2=$page2-$pageoffset2;
					$end2=$totalpages2>$page2+$pageoffset2?$page2+$pageoffset2:$totalpages2;
				}else{
					$start2=1;
					$end2=$totalpages2>$showPage2?$showPage2:$totalpages2;
				}
				if($page2+$pageoffset2>$totalpages2){
					$start2=$start2-($page2+$pageoffset2-$end2);
				}
			}
			//显示各页
			for($i=$start2;$i<=$end2;$i++){
				if($page2==$i){
					$page_banner2.="<span class='current'>{$i}</span>";
				}else{
					$page_banner2.="<a href='".$_SERVER['PHP_SELF']."?p2=".($i)."'>{$i}</a>";
				}
			}
				
			//尾部省略
			if($totalpages2>$showPage2&&$totalpages2>$page2+$pageoffset2){
				$page_banner2.="...";
			}
			if($page2<$totalpages2){
				$page_banner2.="<a href='".$_SERVER['PHP_SELF']."?p2={$page2_2}'>下一页></a>";
				$page_banner2.="<a href='".$_SERVER['PHP_SELF']."?p2={$totalpages2}'>尾页</a>";
			}else{
				$page_banner2.="<span class='disabled'>下一页></span>";
				$page_banner2.="<span class='disabled'>尾页</span>";
			}
			$page_banner2.="共{$totalpages2}页";
			$page_banner2.="<form action='cuser.php' method='get'>";
			$page_banner2.="到第<input type='text' size='2' name='p2'>页";
			$page_banner2.="<input type='submit' value='确定'>";
			$page_banner2.="</form></div>";
			echo $page_banner2;
		?>
    </div>
</body>
</html>