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
    $result = mysqli_query($link, "TRUNCATE TABLE photo");

    header("location:zw01.php");
?>