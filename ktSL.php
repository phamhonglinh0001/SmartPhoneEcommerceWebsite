<?php
include "config.php";
include "autoload.php";
session_start();
    if(isset($_GET["cn"])){
        if($_GET["cn"]=="suagh"){
            $item = (new Giohang)->getItem($_GET["id"]);
            
            $data = (new Soluong)->getSoLuong($item["id_ms"], $item["id_ddt"]); 
            $sl = $data["so_luong"];
            if($sl==0){
                $_SESSION["err"] = "Sản phẩm hết hàng";
                header("location:".$_SESSION["dieuhuong"]);
            }else if($sl < $_GET["sl"]){
                $_SESSION["err"] = "Điện thoại này chỉ còn ".$sl." sản phẩm.";
                header("location:".$_SESSION["dieuhuong"]);
            }else{
                $gh = (new Giohang)->update($_GET["sl"], $_GET["id"]);
                header("location:giohang.php");
            }
        }
        if($_GET["cn"]=="themgh"){
            $id_kh = (new Khachhang)->layId($_SESSION["id_tk"]);
            $sl_cu = (new Giohang)->getSlCu($_GET["ms"], $_GET["id_ddt"], $id_kh);

            $data = (new Soluong)->getSoLuong($_GET["ms"], $_GET["id_ddt"]); 
            $sl = $data["so_luong"];
            if($sl_cu==false) $sl_mua = $_GET["sl"];
            else $sl_mua = $_GET["sl"]+$sl_cu;
            
            if($sl==0){
                $_SESSION["err"] = "Sản phẩm hết hàng";
                header("location:".$_SESSION["dieuhuong"]);
            }else if($sl < $sl_mua){
                if($sl_cu==false) $_SESSION["err"] = "Màu ".$data["ten_ms"]." chỉ còn ".$sl." sản phẩm.";
                else $_SESSION["err"] = "Màu ".$data["ten_ms"]." chỉ còn ".$sl." sản phẩm. Trong giỏ hàng bạn đã có ".$sl_cu." sản phẩm";
                header("location:".$_SESSION["dieuhuong"]);
            }else{
                if($sl_cu==false){
                    (new Giohang)->add($_GET["id_ddt"], $_GET["ms"], $_GET["sl"], $id_kh);
                } 
                else{
                    $id_gh = (new Giohang)->getIdGioHang($id_kh);
                    (new Giohang)->update2($sl_mua, $_GET["ms"], $_GET["id_ddt"], $id_gh);
                }
                header("location:giohang.php");
            }
        }
        if($_GET["cn"]=="muangay"){
            $data = (new Soluong)->getSoLuong($_GET["ms"], $_GET["id_ddt"]); 
            $sl = $data["so_luong"];
            
            if($sl==0){
                $_SESSION["err"] = "Sản phẩm hết hàng";
                header("location:".$_SESSION["dieuhuong"]);
            }else if($sl < $_GET["sl"]){
                $_SESSION["err"] = "Màu ".$data["ten_ms"]." chỉ còn ".$sl." sản phẩm.";
                header("location:".$_SESSION["dieuhuong"]);
            }else{
                $lc = "location:"."xacnhanmuahang.php?cn=muangay&dt=".$_GET["id_ddt"]."&sl=".$_GET["sl"]."&ms=".$_GET["ms"];
                header($lc);
            }
        }
    }
    if($_GET["cn"]=="thanhtoan"){
        $ds = explode("-", $_GET["chuoi"]);
        $vipham = false;
        foreach($ds as $i){
            $item = (new Giohang)->getItem($i);
            
            $data = (new Soluong)->getSoLuong($item["id_ms"], $item["id_ddt"]); 
            $sl = $data["so_luong"];
            
            if($sl==0){
                $vipham = true;
                $_SESSION["err"] = "Sản phẩm ".(new Dongdienthoai)->layTen($gh[0]["id_ddt"])." hết hàng";
                header("location:giohang.php");

            }else if($sl < $item["so_luong"]){
                $vipham = true;
                $_SESSION["err"] ="Sản phẩm ".(new Dongdienthoai)->layTen($gh[0]["id_ddt"])." Màu ".$data["ten_ms"]." chỉ còn ".$sl." sản phẩm.";
                header("location:".$_SESSION["dieuhuong"]);
            }
        }
        if($vipham ==false)
        header("location:xacnhanmuahang.php?cn=giohang&chuoi=".$_GET["chuoi"]);
    }


?>