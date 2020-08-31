<?
    function uploadfile(){
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
    }
?>