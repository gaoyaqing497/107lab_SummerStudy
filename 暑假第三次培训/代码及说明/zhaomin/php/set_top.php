<?php
    $id= isset($_GET['id'])?$_GET['id']:"";
    $table=isset($_GET['table'])?$_GET['table']:"";
	$link=@new mysqli('localhost','root','','HRM');
			        $link->set_charset('utf8');
			        if($link->connect_errno){
			        die('CONNECT_ERROR:'.$link->connect_errno);
			        }
			        
    if($table=='News'){
       	$sql_select_1="SELECT istop FROM News WHERE id='$id'";    
	    $res_1 = $link->query($sql_select_1);  
	    $row_1= mysqli_fetch_assoc($res_1);
	   if($row_1['istop']==0){
	       $sql2="update News SET istop=0 WHERE id!='$id'";
	       $sql1="update News SET istop=1 WHERE id='$id'";
	       $res2=$link->query($sql2);
	       $res1=$link->query($sql1);
	   }
	   if($row_1['istop']==1){
	       $sql1="update News SET istop=0 WHERE id='$id'";
	       $res1=$link->query($sql1);
	   }
	  
    }
    
    if($table=='Theory'){
       	$sql_select_1="SELECT istop FROM Theory WHERE id='$id'";    
	    $res_1 = $link->query($sql_select_1);  
	    $row_1= mysqli_fetch_assoc($res_1);
	   if($row_1['istop']==0){
	       $sql2="update Theory SET istop=0 WHERE id!='$id'";
	       $res2=$link->query($sql2);
	       $sql1="update Theory SET istop=1 WHERE id='$id'";
	       $res1=$link->query($sql1);
	   }
	   if($row_1['istop']==1){
	       $sql1="update Theory SET istop=0 WHERE id='$id'";
	       $res1=$link->query($sql1);
	   }
    }
     mysqli_free_result($res1);
	   mysqli_free_result($res2);
	   mysqli_free_result($res_1);
    mysqli_close($link);
    header("Location:../index.php");
?>