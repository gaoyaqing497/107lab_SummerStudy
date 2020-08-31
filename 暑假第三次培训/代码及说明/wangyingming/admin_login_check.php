<?php
$link = @new mysqli('localhost','root','');


if(isset($_REQUEST['verification_code']))
{
  session_start();
  if(strtolower($_REQUEST['verification_code']) != $_SESSION['verification_code'])
  {
    echo "<script>
        alert('验证码输入错误');
        location.href='admin_login.php';
    </script>";
  }
}


$res=$link->select_db('test');
if(!$res)
{
    echo "<script>
        alert('没有链接到指定数据库');
        location='admin_login.php';
    </script>";
}
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)||empty($password))
    {
        echo "<script>
            alert('用户名或者密码不能为空');
            location='admin_login.php';
        </script>";
    }
    else
    {
        $sql = "select username,password from admin where username='$username'";
        $res = $link->query($sql);
        $rows=$res->fetch_assoc();
        $number=mysqli_num_rows($res);

        if($number && $rows['username'] == $username && $rows['password'] == $password)
        {
            echo "<script type='text/javascript'>
	             location.href='admin_start.php?username=$username';
	        </script>";
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('用户名或者密码错误');
            location.href='admin_login.php';
         </script>"; 
        }

    }
?>