<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}

$link->set_charset('utf8');
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
if($password == $repassword)
{
    $sql="insert into user (username,password) values ('$username','$password')";
    $res=$link->query($sql);
    if($res)
    {
        $mes="添加成功！";
        $id=$link->insert_id;
        // echo "$id";
        $link->close();
        echo "<script type='text/javascript'>
            alert('{$mes}');
            location='user_list.php';
        </script>";
    }
}
else
{
    echo "<script>
            alert('两次密码不一致，请重新设置');
            location='adduuser.php';
        </script>" ;
}
?>