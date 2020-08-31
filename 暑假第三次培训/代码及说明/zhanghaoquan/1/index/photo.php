<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
function connectDb()
{
    $link = mysqli_connect("localhost", "root", "123456");
    if ($link) {
        mysqli_select_db($link, 'mydb');
        mysqli_query($link, "SET NAMES 'utf8'");
    } else {
        echo mysqli_error($link);
    }
    return $link;
}
 
 
$link = connectDb();
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/png"))
    ) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "..\\images/" . $_FILES["file"]["name"]);
 
        $icon_tem = "image/" . $_FILES["file"]["name"];
        $icon_arr = array("$icon_tem");
        $icon = implode($icon_arr);
 
        $name = $_POST['name'];
 
        mysqli_query($link,"INSERT INTO photo (photos) VALUES ('$icon')");

        header("location:zw01.php");
    }
}
?>
</body>
</html>
