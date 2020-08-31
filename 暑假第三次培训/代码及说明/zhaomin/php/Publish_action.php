<?php
     header('content-type:text/html;charset=utf-8');
     $title = isset($_POST['title'])?$_POST['title']:"";
     $author = isset($_POST['author'])?$_POST['author']:"";
     $content= isset($_POST['content'])?$_POST['content']:"";
     $link =@new mysqli('localhost','root','','HRM');
			        $link->set_charset('utf8mb4');
			        if($link->connect_errno){
			          die('CONNECT_ERROR:'.$link->connect_errno);
			        }
    if(!empty($title)&&!empty($author)&&!empty($content)){
		    $sql="insert into News VALUES(null,'$title',null,0,'$content','$author')";	
			$res=$link->query($sql);
			if($res){
			    $sql2="select id from News where content='$title'";
		        $result=mysqli_fetch_array($link->query($sql2));
		        $id=$result[0];
				    $allowExt=array('.jpeg','.jpg','.png','.gif');
					$filename=$_FILES['myfile']['name'];
					$type=$_FILES['myfile']['type'];
					$tmp_name=$_FILES['myfile']['tmp_name'];
					$size=$_FILES['myfile']['size'];
					$error=$_FILES['myfile']['error'];
				    $filetype=strrchr($_FILES['myfile']['name'],".");
					
					if($error==0){
					   if(!in_array($filetype,$allowExt))
					    //检查文件类型
					    {
					       header("Location:Publish_News.php?error=10");
					    }else{
						    $newname=$id.$filetype;
							copy($tmp_name,"../upload/".$newname);
						    header("Location:Publish_News.php?error=11");
					    }
				        
					}else{
					     switch($error){
					     case 1:
					            header("Location:Publish_News.php?error=1");
					            break;
					     case 2:
					           header("Location:Publish_News.php?error=2");
					           break;
					     case 3:
					      		header("Location:Publish_News.php?error=3");
					           break;
					     case 4:
					      		header("Location:Publish_News.php?error=4");
					           break;
					     case 6:
					      		header("Location:Publish_News.php?error=6");
					           break;
					     case 7:
					     case 8:
					      	   header("Location:Publish_News.php?error=7");
					           break;
					     }
					}
			}
    }else{
    	 header("Location:Publish_News.php?error=12");
    }
	

?>
