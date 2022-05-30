<?php
include "config.php";
include "autoload.php";
session_start();
if(isset($_GET["id_tk"])){
    if (isset($_FILES["anhdaidien"])&&$_FILES["anhdaidien"]["error"]!=4) {
        $tenfile = $_FILES["anhdaidien"]["name"];
        $arr = explode(".", $tenfile);
        $temp = end($arr);
        if ($temp != "jpg" && $temp != "png" && $temp != "jpeg" && $temp != "gif") {
            $_SESSION["mess"] = "Chỉ chấp nhận tệp jpg/png/jpeg/gif";
            header("location:taikhoan.php");
        } else {
            $dir = "./assets/img/anhdaidien/" . $_GET["id_tk"] . "." . $temp;
            if(file_exists($dir)) unlink($dir);
            move_uploaded_file($_FILES["anhdaidien"]["tmp_name"], $dir);
            (new Taikhoan)->capNhatAnh($_GET["id_tk"] . "." . $temp, $_GET["id_tk"]);
            $_SESSION["mess"] = "Cập nhật ảnh đại diện xong";
            header("location:taikhoan.php");
        }
    }
}

?>