<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");

if(isset($_GET["id"])){
    (new Donhang)->xoa($_GET["id"]);
    header("location:donhang.php?cn=dahuy");
}

?>