<?php
include "config.php";
include "autoload.php";
session_start();

if(isset($_GET["id"])){
    (new Donhang)->ad_update_trangthai($_GET["id"], "Hoàn tất");
    header("location:donhang.php?cn=hoantat");
}

?>