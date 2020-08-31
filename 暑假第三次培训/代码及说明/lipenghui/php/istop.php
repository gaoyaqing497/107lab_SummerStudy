<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
	require("news/dbconfig.php");
	require("common.php");
	$mysqli->set_charset('utf8');
	header('content-type:text/html;charset=utf-8');
    $k=$_GET['k'];
    $id=$_GET['id'];
	if($k==1||$k==-1){
	    $sql1="update news set flag=0";
	    $sql2="update news set flag=1 where id='{$id}'";
	}else{
	    $sql1="update xwsd set flag=0";
	    $sql2="update xwsd set flag=1 where id='{$id}'";
	}
	$mysqli->query($sql1);
	$mysqli->query($sql2);
	if($k>0)
	    $url='cuser.php';
	else
	    $url='userList.php';
	echo "<script type='text/javascript'>
            location.href='{$url}';
            </script>";
	$mysqli->close();
?>