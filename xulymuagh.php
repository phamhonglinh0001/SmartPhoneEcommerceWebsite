<?php
    include "config.php";
    include "autoload.php";
    session_start();
    if(isset($_GET["chuoi"])&&isset($_POST["diachi"])){
        $dc = $_POST["diachi"];
        (new Donhang)->them((new Khachhang)->layId($_SESSION["id_tk"]),$dc);
        $max = (new Donhang)->maxId();

        $ds = explode("-", $_GET["chuoi"]);
        $tong_tien = 0;
        foreach($ds as $i){
            $item = (new Giohang)->getItem($i);
            $km = (new Dongdienthoai)->layKM($item["id_ddt"]);
            if($km==false) $gia=(new Dongdienthoai)->layGia($item["id_ddt"]);
            else $gia=(new Dongdienthoai)->layGia($item["id_ddt"])*((100-$km)/100);
            (new Giohang)->update_tt($i,'gia_mua', $gia );
            (new Giohang)->update_tt($i,'trang_thai', 'Đã thanh toán');
            (new Giohang)->update_tt($i,'id_dh', $max);
            $sl_cu = (new Soluong)->getSoLuong($item["id_ms"], $item["id_ddt"]);

            (new Soluong)->update($sl_cu["so_luong"]-$item["so_luong"], $item["id_ms"], $item["id_ddt"]);
            $tong_tien+=($item["so_luong"]*$gia);
        }
        (new Donhang)->update($max, "tong_tien", $tong_tien);
        header("location:donhang.php?cn=choxacnhan");
    }
?>