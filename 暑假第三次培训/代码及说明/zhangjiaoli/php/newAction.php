<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','air0729.','test');
if($mysqli->connect_errno){
    die('CONNECT ERROR:'.$mysqli->connect_error);
}
include_once 'tool.inc.php';
$link=connect();
//验证是否登录
include_once 'is_manage_login.php';
$mysqli->set_charset('utf8');
$id=$_GET['id'];
$act=$_GET['act'];
$titleName=$_POST['titleName'];
$newContent=$_POST['newContent'];
$month=$_POST['month'];
$day=$_POST['day'];
//根据不同操作完成不同功能
switch($act){
    case 'editNew':
        $sql="UPDATE article SET titleName='{$titleName}',newContent='{$newContent}' WHERE id='{$id}';";
    //1.获取上传文件信息
    $upfile=$_FILES["myfile"];
    //定义允许的类型
    $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
    $path="uploads/image/";//定义一个上传后的目录
    //2.过滤上传文件的错误号
    if($upfile["error"]>0 && $upfile["error"]!=4){
        switch($upfile['error']){//获取错误信息
            case 1:
                $info="上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
                break;
            case 2:
                $info="上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
                break;
            case 3:
                $info="文件只有部分被上传";
                break;
            case 5:
                $info="找不到临时文件夹.";
                break;
            case 6:
                $info="文件写入失败！";break;
        }die("上传文件错误,原因:".$info);
    }
    //3.本次上传文件大小的过滤（自己选择）
    if($upfile['size']>2097152){
        die("上传文件大小超出限制");
    }
    //4.类型过滤
    if(!in_array($upfile["type"],$typelist)){
        die("上传文件类型非法!".$upfile["type"]);
    }
    //5.上传后的文件名定义(随机获取一个文件名)
    $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
    do{ 
        $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
    }while(file_exists($path.$newfile));
    //6.执行文件上传
    //判断是否是一个上传的文件
    if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
                echo "文件上传成功!";
                //将图片的名称和路径存入数据库
                $query = "UPDATE article SET path='{$path}' WHERE id='{$id}'";
                $query1 = "UPDATE article SET imgName='{$newfile}' WHERE id='{$id}'";
                $result = $mysqli -> query($query);
                $result1 = $mysqli -> query($query1);
                if($result && $result1){
                    echo"文件已存储到数据库";
                }
                else{
                    echo"请求失败，请重试";
                }
            }else{
            die("上传文件失败！");
        }
    }else{
    die("不是一个上传文件!");
  }
        $res=$mysqli->query($sql);
        if($res){
            $mes="修改成功";
        }else{
            $mes="修改失败";
        }
        $url="manageAction.php";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}';
        </script>";
        exit;
        break;
    case 'delNew':
        $sql="DELETE FROM article WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        if($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url="manageAction.php";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}';
        </script>";
        exit;
        break;
    case 'addNew':
        $sql="INSERT article(level,id,titleName,newContent,month,day) VALUES(0,4,'{$titleName}','{$newContent}','{$month}','{$day}');";
        $res=$mysqli->query($sql);
        if($res){
            echo "<script type='text/javascript'>
                     alert('添加成功');
                     location.href='manageAction.php';
                   </script>";
            exit;
        }else{
            echo "<script type='text/javascript'>
                     alert('添加失败');
                     location.href='addNew.php';
                   </script>";
            exit;
        }
        break;
}
?>