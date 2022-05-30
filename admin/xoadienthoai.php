<?php
    include("../config.php");
    include("../autoload.php");
    session_start();

    if(isset($_GET["id"])){
        (new Dienthoai)->xoa($_GET["id"]);
        header("location:dienthoai.php");
    }
?>