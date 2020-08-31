<?php 
include_once 'tool.inc.php';
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','test');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//检查登录
$mysqli=connect();
if(is_manage_login($mysqli)){
   
}else{
    exit();
}
$login_name=$_SESSION['login_name'];
//查询(模糊查询)
$keywords=$_POST['keywords'];
$act=$_GET['act'];
switch ($act) {
  case 'titleSearch':
    $sql="SELECT * FROM article WHERE titleName like '%{$keywords}%'";
    $sql1="SELECT * FROM llxx WHERE titleName like '%{$keywords}%'";
    $result=$mysqli->query($sql);
    $result1=$mysqli->query($sql1);
    if($result && $result->num_rows>0){
      echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
        //高亮显示
        $row['titleName']=preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$row['titleName']); 
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['titleName']."</td>";
        echo "<td>".$row['month']."月".$row['day']."日</td></tr>";
        }
        echo '</table>';
    }
    echo '<br/><br/>';
    if($result1 && $result1->num_rows>0){
      echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row1=$result1->fetch_assoc()){
        $rows1[]=$row1;
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row1['id']."</td>";
        echo "<td>".$row1['titleName']."</td>";
        echo "<td>".$row1['month']."月".$row1['day']."日</td></tr>";
        }
        echo '</table>';
    }
    if(!$result && !$result1){
    $url="manageAction.php";
        echo "<script type='text/javascript'>
        alert('没有查询到有关信息');
        location.href='{$url}';
        </script>";
        exit;
      }
        break;
  case 'contSearch':
    $sql="SELECT * FROM article WHERE newContent like '%{$keywords}%'";
    $sql1="SELECT * FROM llxx WHERE newContent like '%{$keywords}%'";
    $result=$mysqli->query($sql);
    $result1=$mysqli->query($sql1);
    if($result && $result->num_rows>0){
      echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['titleName']."</td>";
        echo "<td>".$row['month']."月".$row['day']."日</td></tr>";   
    }
        echo '</table>';
    }
    if($result1 && $result1->num_rows>0){
      echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row1=$result1->fetch_assoc()){
        $rows1[]=$row1;
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row1['id']."</td>";
        echo "<td>".$row1['titleName']."</td>";
        echo "<td>".$row1['month']."月".$row1['day']."日</td></tr>";
    }
        echo '</table>';
    }
    if(!$result && !$result1){
    $url="manageAction.php";
        echo "<script type='text/javascript'>
        alert('没有查询到有关信息');
        location.href='{$url}';
        </script>";
        exit;
      }
        break;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="../css/sheetstyle.css"/>
	<script type = "text/javascript"src="../js/jquery-1.12.4.js"></script>
    <script src="../js/style.js"></script>
	<title>查询结果</title>
</head>
<body>
     <div height="100px" width="100%" align="right"><a href="index.php">网站首页</a>|管理员：<?php echo $login_name?>|<a href="loginOut.php">注销</a></div>
     <br/>
</body>
</html>