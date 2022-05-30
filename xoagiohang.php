<?php
include "config.php";
include "autoload.php";
session_start();
if (isset($_GET["gh"])) {
    $id = $_GET["gh"];
    (new Giohang)->delete($id);
    header("location:giohang.php");
}else{
    header("location:giohang.php");
}


?>