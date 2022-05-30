<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QL đơn hàng</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>

<body>
    <div class="root">
        <div class="container-fluid tophead text-white" style="background-color: black;">
            <p class="float-end">
                <i class="fa-solid fa-phone"></i>
                &nbsp;
                (+84)986611387
            </p>
            <p>
                <i class="fa-solid fa-envelope"></i>
                &nbsp;
                linhb1805885@student.ctu.edu.vn
            </p>

        </div>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="fas fa-mobile"></i>UrphoneAdmin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="dongdienthoai.php">
                                Dòng điện thoại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="thongso.php">
                                Thông số</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="thuonghieu.php">
                                Thương hiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="khuyenmai.php">
                                Khuyến mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="donhang.php">
                                Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="danhgia.php">
                                Đánh giá</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-h"></i>&nbsp;Thêm</a>
                            <ul class="dropdown-menu">
                                <?php
                                if (!isset($_SESSION["ad"])) {
                                    echo
                                    '
                                        <li><a class="dropdown-item" href="taikhoan.php"><i class="fas fa-sign-in-alt"></i>
                                        Đăng nhập</a></li>
                                        ';
                                } else {
                                    echo
                                    '
                                        <li><a class="dropdown-item" href="taikhoan.php"><i class="fa-solid fa-address-book"></i>
                                        Tài khoản</a></li>
                                <li><a class="dropdown-item" href="dangxuat.php"><i class="fa-solid fa-right-from-bracket"></i>
                                        Đăng xuất</a></li>
                                        ';
                                }

                                ?>


                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="" style="min-height: 80vh; padding: 50px 100px;">
            <?php
            if (isset($_GET["cn"])) $cn = $_GET["cn"];
            else $cn = "dagiaohang";
            ?>
            <div>
                <a href="donhang.php?cn=choxacnhan" class="text-decoration-none <?php if ($cn == "choxacnhan") echo 'text-danger'; ?>">Chờ xác nhận</a> &#160;&#160;&#160;&#160;
                <a href="donhang.php?cn=dangdonggoi" class="text-decoration-none  <?php if ($cn == "dangdonggoi") echo 'text-danger'; ?>">Đang đóng gói</a>&#160;&#160;&#160;&#160;
                
                <a href="donhang.php?cn=danggiaohang" class="text-decoration-none <?php if ($cn == "danggiaohang") echo 'text-danger'; ?>">Đang giao hàng</a>&#160;&#160;&#160;&#160;
                <a href="donhang.php?cn=dagiaohang" class="text-decoration-none  <?php if ($cn == "dagiaohang") echo 'text-danger'; ?>">Đã giao hàng</a>&#160;&#160;&#160;&#160;
                <a href="donhang.php?cn=dahuy" class="text-decoration-none  <?php if ($cn == "dahuy") echo 'text-danger'; ?>">Đã hủy</a>
                
            </div>
            <br>
            <div style="padding: 20px; margin: 20px;">
                <?php
                if ($cn == "choxacnhan") {

                    $dh = (new Donhang)->ad_laydonhang("Chờ xác nhận");
                    if ($dh != false) {
                        foreach ($dh as $x) {
                            include("dh_choxacnhan.php");
                        }
                    } else {
                        echo '<h2>Chưa có đơn hàng</h2>';
                    }
                }
                if ($cn == "danggiaohang") {

                    $dh = (new Donhang)->ad_laydonhang("Đang giao hàng");
                    if ($dh != false) {
                        foreach ($dh as $x) {
                            include("dh_danggiaohang.php");
                        }
                    } else {
                        echo '<h2>Chưa có đơn hàng</h2>';
                    }
                }
                if ($cn == "dagiaohang") {

                    $dh = (new Donhang)->ad_laydonhang("Đã giao hàng");
                    if ($dh != false) {
                        foreach ($dh as $x) {
                            include("dh_dagiaohang.php");
                        }
                    } else {
                        echo '<h2>Chưa có đơn hàng</h2>';
                    }
                }
                if ($cn == "dangdonggoi") {

                    $dh = (new Donhang)->ad_laydonhang("Đang đóng gói");
                    if ($dh != false) {
                        foreach ($dh as $x) {
                            include("dh_dangdonggoi.php");
                        }
                    } else {
                        echo '<h2>Chưa có đơn hàng</h2>';
                    }
                }
                if ($cn == "dahuy") {

                    $dh = (new Donhang)->ad_laydonhang("Đã hủy");
                    if ($dh != false) {
                        foreach ($dh as $x) {
                            include("dh_dahuy.php");
                        }
                    } else {
                        echo '<h2>Chưa có đơn hàng</h2>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="container-fluid footer bg-dark text-white m-0">
            <div class="row p-3">
                <div class="d-flex p-3 justify-content-around">
                    <div class="">

                        <i class="fas fa-map-marker-alt"></i>
                        3/2 Ninh Kiều Cần Thơ

                    </div>
                    <div class="">

                        <i class="fas fa-fax"></i>
                        (+84)986611387

                    </div>
                    <div class="">

                        <i class="fas fa-envelope"></i>
                        linhb1805885@student.ctu.edu.vn

                    </div>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="py-2">
                    <i class="fas fa-copyright"></i>
                    copyright by <span class="badges bg-primary rounded p-1">Linh</span>
                </div>

            </div>
        </div>
    </div>
</body>

</html>