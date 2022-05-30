<?php
include "config.php";
include "autoload.php";
session_start();
if(isset($_GET["cn"])){
    if($_GET["cn"]=="them"){
        $dg = $_POST["danhgiasao"];
        $bl = $_POST["noidung"];
        $id_ddt = $_GET["id_ddt"];
        (new Binhluan)->them($id_ddt, $bl, (new Khachhang)->layId($_SESSION["id_tk"]));
        (new Danhgia)->them($id_ddt, (new Khachhang)->layId($_SESSION["id_tk"]), $dg);
        header("location:".$_SESSION["dieuhuong"]);
    }
    if($_GET["cn"]=="sua"){
        $dg = $_POST["danhgiasao"];
        $bl = $_POST["noidung"];
        $id_ddt = $_GET["id_ddt"];
        (new Binhluan)->sua($id_ddt, $bl, (new Khachhang)->layId($_SESSION["id_tk"]));
        (new Danhgia)->sua($id_ddt, (new Khachhang)->layId($_SESSION["id_tk"]), $dg);
        header("location:".$_SESSION["dieuhuong"]);
    }
    if($_GET["cn"]=="xoa"){
        $id_ddt = $_GET["id_ddt"];
        (new Binhluan)->xoa($id_ddt,(new Khachhang)->layId($_SESSION["id_tk"]));
        (new Danhgia)->xoa($id_ddt, (new Khachhang)->layId($_SESSION["id_tk"]));
        header("location:".$_SESSION["dieuhuong"]);
    }
}

?>