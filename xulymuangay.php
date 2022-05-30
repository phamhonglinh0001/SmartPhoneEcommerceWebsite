<?php
include "config.php";
include "autoload.php";
session_start();
if(isset($_SESSION["dh"])){
    $id_ddt=$_SESSION["dh"]["id"];
    $ms=$_SESSION["dh"]["ms"];
    $sl=$_SESSION["dh"]["sl"];
    unset($_SESSION["dh"]);
}
$dc = $_POST["diachi"];
$id_kh = (new Khachhang)->layId($_SESSION["id_tk"]);

(new Donhang)->them($id_kh,$dc);
$max = (new Donhang)->maxId();
$gia = (new Dongdienthoai)->layGia($id_ddt);
$km = (new Dongdienthoai)->layKM($id_ddt);
if(!$km==false) $gia = $gia*((100-$km)/100); 

(new Giohang)->add2($id_ddt, $ms, $sl, $id_kh, 'Đã thanh toán', $gia, $max);
$sl_cu = (new Soluong)->getSoLuong($ms, $id_ddt)["so_luong"];
(new Soluong)->update($sl_cu-$sl, $ms, $id_ddt);

$tong_tien = $gia*$sl;
(new Donhang)->update($max, 'tong_tien', $tong_tien);

header("location:donhang.php?cn=choxacnhan");

?>