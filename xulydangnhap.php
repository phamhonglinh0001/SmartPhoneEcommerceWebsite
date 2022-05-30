<?php
include "config.php";
include "autoload.php";
session_start();

$u = $_POST['username'];
$p = $_POST['password'];
$tk = new Taikhoan();
$kh = new Khachhang();
if(isset($_SESSION['error_message'])) unset($tk);
if($tk->getAll($u, $p) != null){
    if($tk->getData()[0]['level'] == 0){
        $_SESSION['id_tk'] = $tk->getData()[0]['id_taikhoan'];
        if(isset($_SESSION["dieuhuong"])){
            $dh = $_SESSION["dieuhuong"];
            unset($_SESSION["dieuhuong"]);
            header("location: ".$dh);
        }else{
            header("location: ./index.php");
        }
        
    }else{
        $_SESSION['error_message'] = 'Đây không phải là tài khoản khách hàng';
        header("location: ./dangnhap.php");
    }
}else{
    $_SESSION['error_message'] = 'Bạn nhập sai username hoặc password';
    header("location: ./dangnhap.php");
}


?>