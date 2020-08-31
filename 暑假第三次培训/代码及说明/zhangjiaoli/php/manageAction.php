<?php 
include_once 'tool.inc.php';
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','test');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
/*
$sql="SELECT id,titleName,newContent,month,day,level FROM article";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    while($row=$mysqli_result->fetch_assoc()){
        $rows[]=$row;
    }
}*/
/*
$sql1="SELECT id,titleName,newContent,month,day,level FROM llxx;";
$mysqli_result1=$mysqli->query($sql1);
if($mysqli_result1 && $mysqli_result1->num_rows>0){
    while($content=$mysqli_result1->fetch_assoc()){
        $contents[]=$content;
    }
}*/
//检查登录
$mysqli=connect();
if(is_manage_login($mysqli)){
   
}else{
    exit();
}
$login_name=$_SESSION['login_name'];
//分页
$page=1;
$page=$_GET['p'];
if(empty($page)){
  $page=1;
  } 
$sql2="select * from article limit ".($page-1) * 2 .",2 ";
$mysqli_result2=$mysqli->query($sql2);
if($mysqli_result2 && $mysqli_result2->num_rows>0){
    while($content1=$mysqli_result2->fetch_assoc()){
        $contents1[]=$content1;
    }
}
$to_sql="SELECT COUNT(*)FROM article";
$result= $mysqli->query($to_sql);
$row1=mysqli_fetch_array($result);
$count=$row1[0];
$to_pages=ceil($count/2); //向上取整
/////////////////
$page1=$_GET['p1'];
if(empty($page1)){
  $page1=1;
  } 
$sql3="select * from llxx limit ".($page1-1) * 5 .",5 ";
$mysqli_result3=$mysqli->query($sql3);
if($mysqli_result3 && $mysqli_result3->num_rows>0){
    while($content2=$mysqli_result3->fetch_assoc()){
        $contents2[]=$content2;
    }
}
$to_sql1="SELECT COUNT(*)FROM llxx";
$result1= $mysqli->query($to_sql1);
$row2=mysqli_fetch_array($result1);
$count1=$row2[0];
$to_pages1=ceil($count1/5);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="../css/sheetstyle.css"/>
	<script type = "text/javascript"src="../js/jquery-1.12.4.js"></script>
    <script src="../js/style.js"></script>
	<title>统战部后台</title>
</head>
<body>
     <div height="100px" width="100%" align="right"><a href="index.php">网站首页</a>|管理员：<?php echo $login_name?>|<a href="loginOut.php">注销</a></div>
     <br/>
     <span>标题查询</span>
     <form action="search.php?act=titleSearch" method="POST">
      <input type="text" name="keywords" value="" />
      <input type="submit" value="查询"/>
     </form>
     <span>内容查询</span>
     <form action="search.php?act=contSearch" method="POST">
      <input type="text" name="keywords" value="" />
      <input type="submit" value="查询"/>
     </form>
     <h2>新闻速递-文章列表-<a href="addNew.php">添加文章</a></h2>
    <table border='1' cellspacing='0' cellpadding='0' width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
           <td>操作</td>
       </tr>
       <?php foreach($contents1 as $content1):?>
       <tr>
           <td><?php echo $content1['id'];?></td>
           <td><?php echo $content1['titleName'];?></td>
           <td><?php echo $content1['month']?>月<?php echo $content1['day']?>日</td>
           <td><a href="editNew.php?id=<?php echo $content1['id'];?>">编辑</a>|
           <!-- 输出置顶的判断 -->
           <?php if($content1['level']){
               echo '<a href="topAction.php?act=cancle&id='.$content1['id'].'">取消置顶</a>';
           }else{
                   echo '<a href="topAction.php?act=istop&id='.$content1['id'].'">置顶</a>';
               }
               ?>
           |<a href="newAction.php?act=delNew&id=<?php echo $content1['id'];?>">删除</a></td>
       </tr>
       <?php endforeach;?>
    </table>
    <?php 
        if($page<=1){
          echo "<a href='".$_SERVER['PHP_SELF']."?p=1&p1=".$page1."'>上一页</a>";
          }else{
          echo "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."&p1=".$page1."'>上一页</a>";
          }
        if ($page<$to_pages){
          echo "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."&p1=".$page1."'>下一页</a>";
          }else{
          echo "<a href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."&p1=".$page1."'>下一页</a>";
          }
          ?>
    <hr/>
    <h2>理论学习-文章列表</h2>
    <table border='1' cellspacing='0' cellpadding='0' width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
           <td>操作</td>
       </tr>
       <?php foreach($contents2 as $content2):?>
       <tr>
           <td><?php echo $content2['id'];?></td>
           <td><?php echo $content2['titleName'];?></td>
           <td><?php echo $content2['month']?>月<?php echo $content2['day']?>日</td>
           <td>
           <!-- 输出置顶的判断 -->
           <?php if($content2['level']){
               echo '<a href="topAction.php?act=cancle1&id='.$content2['id'].'">取消置顶</a>';
           }else{
                   echo '<a href="topAction.php?act=istop1&id='.$content2['id'].'">置顶</a>';
               }
               ?></td>
       </tr>
       <?php endforeach;?>
    </table>
    <?php 
        if($page1<=1){
          echo "<a href='manageAction.php?p=".$page."&p1=1'>上一页</a>";
          }else{
          echo "<a href='manageAction.php?p=".$page."&p1=".($page1-1)."'>上一页</a>";
          }
        if ($page1<$to_pages1){
          echo "<a href='manageAction.php?p=".$page."&p1=".($page1+1)."'>下一页</a>";
          }else{
          echo "<a href='manageAction.php?p=".$page."&p1=".($to_pages1)."'>下一页</a>";
          }
          ?>
</body>
</html>