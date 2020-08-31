<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');

$author = $_POST['author'];
$title = $_POST['title'];
$content = nl2br($_POST['content']);
$flag = 0 ;
$time = time();

$sql ="insert into theory (author,title,content,flag,time) values ('$author','$title','$content','$flag','$time')";
$res=$link->query($sql);
$insert_id = $link->insert_id ;

$filename=$_FILES['myfile']['name'];
$type=$_FILES['myfile']['type'];
$tmp_name=$_FILES['myfile']['tmp_name'];
$size=$_FILES['myfile']['size'];
$error=$_FILES['myfile']['error'];
$maxsize = 2097152;
$allowExt = array('jpeg','jpg','png','gif','wbmp');

if(UPLOAD_ERR_OK == $error)
{
    if($_FILES['myfile']['size'] > $maxsize)
  {
    echo "<script>
      alert('图片体积超过限制');
      location.href='addtheory.php';
    </script>";
  }
  $ext=pathinfo($_FILES['myfile']['name'],PATHINFO_EXTENSION);
  if(!in_array($ext,$allowExt))
  {
    echo "<script>
      alert('非支持图片类型');
      location.href='addtheory.php';
    </script>";
  }
  if(!is_uploaded_file($_FILES['myfile']['tmp_name']))
  {
    echo "<script>
      alert('文件不是通过http,post上传的');
      location.href='addtheory.php';
    </script>";
  }
  if(!getimagesize($tmp_name))
  {
    echo "<script>
      alert('不是真正的图片');
      location.href='addtheory.php';
    </script>";
  }
  $path="uploads2";
  if(!file_exists($path))
  {
    mkdir($path,0777,true);
    chmod($path,0777);
  }
  // 将文件命名为唯一的id编号便于在文章中显示
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
        location.href='addtheory.php';
    </script>";
  }
}
$link->close();
?>