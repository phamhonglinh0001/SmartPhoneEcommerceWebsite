<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if(isset($_GET["id_ddt"])){
    (new Thongso)->xoa($_GET["id_ddt"]);
    header("location:thongso.php");
}

?>