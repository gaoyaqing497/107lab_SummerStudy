<?php
header('content-type:text/html;charset=utf-8');
$writer = isset($_POST['writer']) ? $_POST['writer'] : "";
$title = isset($_POST['title']) ? $_POST['title'] : "";
$istop = isset($_POST['istop']) ? $_POST['istop'] : 0;
$content = isset($_POST['content']) ? $_POST['content'] : "";
$releasetime = isset($_POST['releasetime']) ? $_POST['releasetime'] : "";
$mysqli=new mysqli('localhost','root','','news');
if($mysqli->connect_errno){
	die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');


$sql1="insert into news2(writer,title,content,releasetime,istop) VALUES('$writer','$title','$content','$releasetime','$istop')";	
$result1=$mysqli->query($sql1);
if($result1){
	$sql2="select id from news2 where title='$title'";
    $result2=mysqli_fetch_array($mysqli->query($sql2));
    $allowExt=array('.jpeg','.jpg','.png','.gif');
    $filename=$_FILES['myfile']['name'];
	$type=$_FILES['myfile']['type'];
	$tmp_name=$_FILES['myfile']['tmp_name'];
	$size=$_FILES['myfile']['size'];
	$error=$_FILES['myfile']['error'];
	$filetype=strrchr($_FILES['myfile']['name'],".");
    $id=$result2[0];
				   
				
					
	if($error==0){
		if(!in_array($filetype,$allowExt))
			{
			    header("Location:insertnews2.php?error=8");
			}else{
				$picname=$id.$filetype;
				copy($tmp_name,"../upload2/".$picname);
				header("Location:insertnews2.php");
				}
				        
	}else{
			switch($error){
					case 1:
					header("Location:insertnews2.php?error=1");
					break;
					case 2:
					header("Location:insertnews2.php?error=2");
					break;
		            case 3:
					header("Location:insertnews2.php?error=3");
					break;
		            case 4:
					header("Location:insertnews2.php?error=4");
					break;
		            case 6:
					header("Location:insertnews2.php?error=6");
					break;
		            case 7:
		            header("Location:insertnews2.php?error=7");
					break;
		            case 8:
					header("Location:insertnews2.php?error=8");
					break;
					     }
		}
}else{
    header("Location:insertnews2.php");
    }
			

?>

