<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');

$filename=$_FILES['myfile']['name'];
$type=$_FILES['myfile']['type'];
$tmp_name=$_FILES['myfile']['tmp_name'];
$size=$_FILES['myfile']['size'];
$error=$_FILES['myfile']['error'];
$maxsize = 2097152;
$allowExt = array('jpeg','jpg','png','gif','wbmp');

$author = $_POST['author'];
$title = $_POST['title'];
$content = nl2br($_POST['content']);
$time = time();
$sql ="insert into news (title,content,time,flag,author) values ('$title','$content','$time','0','$author')";

$res=$link->query($sql);
if(!$res)
{
    exit('文章发布失败了');
}
$insert_id = $link->insert_id;

if(UPLOAD_ERR_OK == $error)
{
    if($_FILES['myfile']['size'] > $maxsize)
  {
    exit('文件过大');
  }
  // $ext=strtolower(end(explode('.',$_FILES['myfile']['name'])));
  $ext=pathinfo($_FILES['myfile']['name'],PATHINFO_EXTENSION);//获取文件的扩展名，判断该扩展名是否在允许的数组中
  if(!in_array($ext,$allowExt))
  {
    exit('非法图片');
  }
  //啥判断文件通过http，post方法上传
  if(!is_uploaded_file($_FILES['myfile']['tmp_name']))
  {
    exit('文件不是通过http,post上传的');
  }
  //检测是否真实的图片
  //getimagesize():得到指定图片的信息,返回的是一个描述信息的数组
  if(!getimagesize($tmp_name))
  {
    exit('不是真正的图片');
  }
  //检查存储文件夹是否存在，不存在就建立
  $path="uploads";
  if(!file_exists($path))
  {
    mkdir($path,0777,true);
    chmod($path,0777);
  }
  // $uniname = md5(uniqid(microtime(true),true)).$ext;确保文件名唯一
  //将文件命名为唯一的id编号便于在文章中显示
  $filename=$insert_id;
  $filename.='.'.$ext;
  $destination = $path.'/'.$filename;
  if(move_uploaded_file($tmp_name,$destination))
  {
    echo "<script>
        alert('新闻和新闻图片上传成功');
        location.href='addnews.php';
    </script>";
  }
  else{
    echo "<script>
        alert('新闻图片上传失败');
        location.href='addnews.php';
    </script>";
  }
}
$link->close();
?>