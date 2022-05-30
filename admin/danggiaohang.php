<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if(isset($_GET["id"])){
    (new Donhang)->ad_update_trangthai($_GET["id"], "Đang giao hàng");
    header("location:donhang.php?cn=danggiaohang");
}else{
    header("location:donhang.php?cn=dangdonggoi");
}

?>