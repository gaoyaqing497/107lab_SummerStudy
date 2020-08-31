<?php
session_start();
require_once "common.php";
header('content-type:text/html;charset=utf-8');
$username=$_POST['username'];
$username=$mysqli->escape_string($username);
$password=md5($_POST['password']);
$password1=md5($_POST['password1']);
$password2=md5($_POST['password2']);
$act=$_GET['act'];
$id=$_GET['id'];
$in=$_GET['in'];

switch($act){
    case 'login':
        if(isset($_REQUEST['authcode'])){
            if(strtolower($_REQUEST['authcode'])!=$_SESSION['authcode']){
                echo "<script type='text/javascript'>
                alert('验证码错误！');
                location.href='login.php';
                </script>";
            }
        }
        $sql0="select account,password from sadmin where password='{$password}' and account='{$username}'";
        $res0=$mysqli->query($sql0);
        if($res0->num_rows>0){
            echo "<script type='text/javascript'>
            location.href='userList.php?username={$username}';
            </script>";
        }
        $sql="select account,password from user where password='{$password}' and account='{$username}'";
        $res=$mysqli->query($sql);
        if($res->num_rows>0){
            session_start();
            $_SESSION['account']=$username;
            echo "<script type='text/javascript'>
            location.href='cuser.php?username={$username}';
            </script>";
            exit();
        }
        else{
            echo "<script type='text/javascript'>
            alert('密码错误');
            location.href='login.php';
            </script>";
            exit();
        }
        break;
    case 'addUser':

        if(isset($_REQUEST['authcode'])){
            if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode']){
            }else{
                echo "<script type='text/javascript'>
                alert('验证码错误！');
                location.href='login.php';
                </script>";
            }
        }
        if($password1!=$password2){
            echo "<script type='text/javascript'>
            alert('两次密码不一致！');
            location.href='login.php';
            </script>";
        }
        $sql2="select account from user where account='{$username}'";
        $res2=$mysqli->query($sql2);
        if($res2->num_rows>0){
            echo "<script type='text/javascript'>
			alert('该用户名已存在，换一个试试');
			location.href='login.php';
			</script>";
            exit;
        }
        $sql="insert into user(account,password) values('{$username}','{$password}')";
        $res=$mysqli->query($sql);
        if($res){
            $insert_id=$mysqli->insert_id;
            session_start();
            $_SESSION['account']=$username;
            echo "<script type='text/javascript'>
            alert('恭喜你成为网站的第{$insert_id}位用户');
            if($in==-1)
                location.href='userList.php';
            else
                location.href='cuser.php';
            </script>";
            exit;
        }else{
            echo "<script type='text/javascript'>
			alert('注册失败');
			location.href='addUser.php';
			</script>";
            exit;
        }
        break;
    case 'delUser':
        $id=$_GET['id'];
        if($id>0){
            $sql="DELETE FROM user WHERE id=".$id;
        }else{
            $sql="DELETE FROM user WHERE id=".(-1)*$id;
        }
        $res=$mysqli->query($sql);
        if($res){
            $mes='删除成功';
        }else{
            $mes='删除失败';
        }
        if($id>0)
            $url='login.php';
        else
            $url='userList.php';
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}';
        </script>";
        exit;
        break;
    case 'editUser':
        $id0=$_GET['id'];
        $k = $_SESSION['k'];
        unset($_SESSION['account']);
        $_SESSION['account']=$username;
        $sql="update user SET account='{$username}',password='{$password}' WHERE id='{$id0}'";
        $res=$mysqli->query($sql);
        if($res){
            $mes='编辑成功';
        }else{
            $mes='编辑失败';
        }
        echo "<script type='text/javascript'>
        alert('{$mes}');
        if($k>0)
            location.href='userList.php?username={$username}';
        else
            location.href='cuser.php?username={$username}';
        </script>";
        exit;
        break;
}
