<?php
include "config.php";
include "autoload.php";
session_start();
if(isset($_GET["cn"])&&isset($_GET["id"])){
    if($_GET["cn"]=='xoa'){
        $dc = new Diachi();
        $kq = $dc->xoa($_GET["id"]);
        if($kq==false) $_SESSION["err"] = "Địa chỉ này đang nằm trong đơn hàng bạn đang mua nên không xóa được.";
        header("location: taikhoan.php?cn=diachi");
    }
    if($_GET["cn"]=='md'){
        $dc = new Diachi();
        $kh = new Khachhang();
        $id_kh = $kh->layId($_SESSION["id_tk"]);
        $dc->capnhatmacdinh($id_kh, $_GET["id"]);
        header("location: taikhoan.php?cn=diachi");
    }
    if($_GET["cn"]=='sua'){
        header("location: suadiachi.php?id=".$_GET["id"]);
    }
}

?>