<?php
	require("dbconfig.php");
	require("common.php");
	#include_once "../uploadfunc.php";
	$mysqli->set_charset('utf-8');
	header('content-type:text/html;charset=utf-8');
	$allowExt=array('jpeg','jpg','png','gif','wbmp');
	$maxSize=2097152;
	$flag=true;//检测是否为真实图片
	session_start();
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
	switch($_GET["action"]){
		case "add":
				$fileInfo=$_FILES['myFile'];
				$filename=$fileInfo['name'];
				$type=$fileInfo['type'];
				$tmp_name=$fileInfo['tmp_name'];
				$size=$fileInfo['size'];
				$error=$fileInfo['error'];
				//确保文件名唯一
				$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
				$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
				//检测是否为真实图片类型
				//移动文件到指定目录
				if($error!=4){
					if($flag){
						if(!getimagesize($fileInfo['tmp_name'])){
							echo "<script type='text/javascript'>
								alert('不是真正的图片类型！');
								location.href='add.php';
								</script>";
						}
					}
					if($error==UPLOAD_ERR_OK){
						if(move_uploaded_file($tmp_name,"../../uploads/".$uniName)){
							if($fileInfo['size']>$maxSize){
								echo "<script type='text/javascript'>
								alert('文件太大！');
								location.href='add.php';
								</script>";
							}
							if(!in_array($ext,$allowExt)){
								echo "<script type='text/javascript'>
								alert('非法文件类型！');
								location.href='add.php';
								</script>";
							}
						}
						else if($error!=4){
							echo "<script type='text/javascript'>
							alert('文件上传失败！');
							location.href='add.php';
							</script>";
						}
					}else{
						echo "<script type='text/javascript'>
							alert('文件上传失败！');
							location.href='add.php';
							</script>";
					}
					echo "<script type='text/javascript'>
							alert('文件上传成功！');
							location.href='add.php';
							</script>";
				}

				$title = $_POST["title"];
				$keywords = $_POST["keywords"];
				$author = $_POST["author"];
				$content = $_POST["content"];
				
				$addtime = time();
				header('content-type:text/html;charset=utf-8');
				$mysqli->set_charset('utf-8');
        		if($k==1||$k==-1){
        		    $sql0 = "insert into news(title,keywords,author,content,addtime,filename) values('{$title}','{$keywords}','{$author}','{$content}','{$addtime},'{$filename}');";
        		}else{
        		    $sql0 = "insert into xwsd(title,keywords,author,content,addtime,filename) values('{$title}','{$keywords}','{$author}','{$content}','{$addtime}','{$filename}');";
				}
				$_SESSION['filename']=$uniName;
        		$mysqli->query($sql0);
				$id = mysqli_insert_id($mysqli);
				if($id>0){
					echo "<h3>添加成功</h3>";
				}
				if($k>0)
					echo "<script type='text/javascript'>
					alert('添加成功！');
					location.href='../cuser.php';
					</script>";
				else{
				    echo "<script type='text/javascript'>
						alert('添加成功！');
						location.href='../userList.php';
						</script>";
				}
				break;

		case "del": 
				$id=$_GET['id'];
				if($k>0){
				    $sql = "delete from news where id={$id}";
				}else{
				    $sql = "delete from xwsd where id={$id}";
				}
				$mysqli->query($sql);
				header("Location:../cuser.php");
			break;

		case "update":
				$fileInfo=$_FILES['myFile'];
				$filename=$fileInfo['name'];
				$type=$fileInfo['type'];
				$tmp_name=$fileInfo['tmp_name'];
				$size=$fileInfo['size'];
				$error=$fileInfo['error'];
				//确保文件名唯一
				$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
				$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
				//检测是否为真实图片类型
				//移动文件到指定目录
				if($error!=4){
					if($flag){
						if(!getimagesize($fileInfo['tmp_name'])){
							echo "<script type='text/javascript'>
								alert('不是真正的图片类型！');
								location.href='edit.php';
								</script>";
						}
					}
					if($error==UPLOAD_ERR_OK){
						if(move_uploaded_file($tmp_name,"../../uploads/".$uniName)){
							if($fileInfo['size']>$maxSize){
								echo "<script type='text/javascript'>
								alert('文件太大！');
								location.href='edit.php';
								</script>";
							}
							if(!in_array($ext,$allowExt)){
								echo "<script type='text/javascript'>
								alert('非法文件类型！');
								location.href='edit.php';
								</script>";
							}
						}
						else if($error!=4){
							echo "<script type='text/javascript'>
							alert('文件上传失败！');
							location.href='edit.php';
							</script>";
						}
					}else{
						echo "<script type='text/javascript'>
							alert('文件上传失败！');
							location.href='edit.php';
							</script>";
					}
					echo "<script type='text/javascript'>
							alert('文件上传成功！');
							location.href='edit.php';
							</script>";
				}
				$title = $_POST["title"];
				$keywords = $_POST["keywords"];
				$author = $_POST["author"];
				$content = $_POST["content"];
				$id = $_POST['id'];
				header('content-type:text/html;charset=utf-8');
				$mysqli->set_charset('utf-8');
				if($k==1){
				    $sql1="update news set title='{$title}',keywords='{$keywords}',author='{$author}',content='{$content}',filename='{$uniName}' where id='{$id}'";
				}else{
				    $sql1="update xwsd set title='{$title}',keywords='{$keywords}',author='{$author}',content='{$content}',filename='{$uniName}' where id='{$id}'";
				}
				echo $sql1;
				echo "<hr>";
				if($mysqli->query($sql1)){
				    echo "y";
				}else{
				    echo "n";
				}
				if($k>0)
					echo "<script type='text/javascript'>
					alert('编辑成功！');
					location.href='../cuser.php';
					</script>";
				else{
				    echo "<script type='text/javascript'>
						alert('编辑成功！');
						location.href='../userList.php';
						</script>";
				}
				
			break;
	}

	$mysqli->close();?>
