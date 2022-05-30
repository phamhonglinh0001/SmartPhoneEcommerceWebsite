<?php
session_start();
include "config.php";
include "autoload.php";
if(isset($_GET["cn"])){
    if(isset($_POST["ten"])&&isset($_POST["email"]) && isset($_POST["sdt"]) && isset($_POST["gioitinh"]) && isset($_POST["ngaysinh"])){
        $ten = $_POST["ten"];
        $email = $_POST["email"];
        $sdt = $_POST["sdt"];
        $gioitinh = $_POST["gioitinh"];
        $ngaysinh = $_POST["ngaysinh"];

    }
    if($_GET["cn"]=="them"){
        $kh = new Khachhang();
        $kh->them($ten, $ngaysinh, $gioitinh, $sdt, $email,$_SESSION["id_tk"]);
        $_SESSION["mess"] = "Thêm thông tin thành công";
        header("location:taikhoan.php?cn=hoso");
    }
    if($_GET["cn"]=="sua"){
        $kh = new Khachhang();
        $kh->sua($ten, $ngaysinh, $gioitinh, $sdt, $email,$_SESSION["id_tk"]);
        $_SESSION["mess"] = "Sửa thông tin thành công";
        header("location:taikhoan.php?cn=hoso");
    }
}



?>