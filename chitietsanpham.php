<?php
include "config.php";
include "autoload.php";
session_start();

if (isset($_GET["id"])) $id = $_GET["id"];
if (isset($_SESSION["dieuhuong"])) unset($_SESSION["dieuhuong"]);
if (!isset($_SESSION["id_tk"])) {
    // $_SESSION["dieuhuong"] = "chitietsanpham.php?id=" . $id;
    // header("location: dangnhap.php");
    $_SESSION["err1"] = "Hãy đăng nhập để mua hàng";
} else {
    $_SESSION["dieuhuong"] = "chitietsanpham.php?id=" . $id;
    $avt = (new Taikhoan())->getAvatar($_SESSION["id_tk"]);
    if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))) {
        $_SESSION["err1"] = "Bạn chưa thêm thông tin khách hàng nên không thể mua hàng";
    } else {
        $id_kh = (new Khachhang)->layId($_SESSION["id_tk"]);
    }
}
$dt = (new Dongdienthoai)->layMotSp($id);
$dg = (new Danhgia)->layDanhGia($id);
$ts = (new Thongso)->layTatCa($id);

if (is_null($dt["id_km"])) $ten_km = "";
else {
    $km = (new Khuyenmai)->layTatCa($dt["id_km"]);
    if ($km != false) {
        $ten_km = $km["ten_km"];
        $gt_km = $km["giatri_km"];
    }
}
$sl = (new Soluong)->getAll($id);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết điện thoại</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
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
                <a class="navbar-brand" href="index.php"><i class="fas fa-mobile"></i>Urphone</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="tatcasanpham.php"><i class="fas fa-mobile-alt"></i>
                                Tất cả điện thoại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="timkiemnangcao.php"><i class="fa-solid fa-magnifying-glass"></i>
                                Tìm kiếm nâng cao</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php"><i class="fa-solid fa-address-book"></i>
                                Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="giohang.php"> <i class="fas fa-shopping-cart"></i>
                                Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="donhang.php"> <i class="fas fa-shopping-cart"></i>
                                Đơn hàng</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-h"></i>&nbsp;Thêm</a>
                            <ul class="dropdown-menu">
                                <?php if (isset($_SESSION['id_tk'])) echo '
                                <li><a class="dropdown-item" href="taikhoan.php"><i class="fa-solid fa-address-book"></i>
                                        Tài khoản</a></li>
                                <li><a class="dropdown-item" href="./dangxuat.php"><i class="fa-solid fa-right-from-bracket"></i>
                                        Đăng xuất</a></li> ';
                                else echo '
                                <li><a class="dropdown-item" href="./dangnhap.php"><i class="fas fa-sign-in-alt"></i>
                                        Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="./dangky.php"><i class="fas fa-edit"></i>
                                        Đăng ký</a></li>
                                        ';
                                ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" action="timkiemnangcao.php">
                        <input name="ten" class="form-control me-2" type="text" placeholder="Tên điện thoại">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-md-5 p-3">
                    <?php
                    if (is_null($dt["anh"])) echo "<h3>Chưa có ảnh sản phẩm</h3>";
                    else echo '
                        <img src="./assets/img/dienthoai/' . $dt["anh"] . '" alt="Ảnh sản phẩm" class="rounded d-block mx-auto"
                        style="height: 400px; width:400px;">
                        ';
                    ?>
                </div>
                <div class="col-md-7 p-4">
                    <h3>
                        <?php
                        echo $dt["ten_ddt"];
                        ?>

                    </h3>
                    <div class="text-dark">
                        <?php
                        if ($dg == false) echo "Chưa có đánh giá";
                        else echo $dg . '&#160;<i class="fas fa-star text-warning"></i>';
                        ?>

                    </div>
                    <br>
                    <h2>
                        <?php
                        if (is_null($dt["gia"])) echo "<h4>Chưa có giá bán</h4>";
                        else echo number_format($dt["gia"], 0, ',', '.') . " vnđ";
                        ?>
                    </h2>
                    <div>

                        <?php
                        if (empty($ten_km)) echo "Chưa có khuyến mãi";
                        else {
                            echo "<span class='badge bg-warning' style='font-size: 18px;'>- " . $gt_km . "% </span>";
                            echo "&#160;<span class='badge bg-danger'>" . $ten_km . "</span>";
                        }
                        ?>

                    </div>
                    <br>
                    <span class="me-3">Màu sắc:</span>

                    <div class="d-inline-block" id="mausac">
                        <?php
                        if ($sl == false) echo "<span class='text-danger'>Sản phẩm hết hàng</span>";
                        else {
                            
                            foreach ($sl as $mau) {

                                echo
                                '
                                <div class="form-check d-inline-block">
                                <input type="radio" class="form-check-input ms " id="' . $mau["ten_ms"] . '" name="mausac" value="' . $mau["id_ms"] . '">
                                ' . $mau["ten_ms"] . '
                                <label class="form-check-label" for="' . $mau["ten_ms"] . '"></label>
                                </div>
                                ';
                            }
                        }
                        ?>
                    </div>

                    <br>
                    <script>
                        function tang() {
                            let x = document.getElementById("sl");
                            let sl = x.innerHTML;
                            x.innerHTML = parseInt(sl) + 1;
                        }

                        function giam() {
                            let x = document.getElementById("sl");
                            let sl = x.innerHTML;
                            if (parseInt(sl) > 1) x.innerHTML = parseInt(sl) - 1;
                        }
                    </script>
                    <span>Số lượng:

                        <button onclick="giam();" class="bg-warning text-white" style="border:none;width: 20px; font-size: 12px; cursor: pointer;">
                            <b>
                                -
                            </b>
                        </button>

                        <span class="badge bg-danger" id="sl">1</span>

                        <button onclick="tang();" class="bg-warning text-white" style="border:none;width: 20px; font-size: 12px; cursor: pointer;">
                            <b>
                                +
                            </b>
                        </button>

                    </span>
                    <br><br>
                    <span class="text-danger">
                        <?php if (isset($_SESSION["err"])) {
                            echo $_SESSION["err"];
                            unset($_SESSION["err"]);
                        } ?>
                    </span>
                    <span class="text-danger">
                        <?php if (isset($_SESSION["err1"])) {
                            echo $_SESSION["err1"];
                            unset($_SESSION["err1"]);
                        } ?>
                    </span>
                    <br>
                    <script>
                        function ktSL1() {
                            const lk = document.getElementById("themgh1");
                            var ms = "";
                            for (x of document.getElementsByClassName("ms")) {
                                if (x.checked == true) {
                                    ms = x.value;
                                    break;
                                }
                            }
                            let sl = document.getElementById("sl").textContent;
                            lk.setAttribute("href", "ktSL.php?cn=themgh&ms=" + ms + "&sl=" + sl + "&id_ddt=" + lk.getAttribute("dt"))
                        }

                        function ktSL2() {
                            const lk = document.getElementById("themgh2");
                            var ms = "";
                            for (x of document.getElementsByClassName("ms")) {
                                if (x.checked == true) {
                                    ms = x.value;
                                    break;
                                }
                            }
                            let sl = document.getElementById("sl").textContent;
                            lk.setAttribute("href", "ktSL.php?cn=muangay&ms=" + ms + "&sl=" + sl + "&id_ddt=" + lk.getAttribute("dt"))
                        }
                    </script>
                    <div class="container-fluid">
                        <a id="themgh1" <?php echo "dt=$id" ?>><button type="button" onclick="ktSL1()" class="btn btn-primary btn-lg" <?php if ($sl == false||!isset($_SESSION["id_tk"])) echo " disabled"; else if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))) echo " disabled"; ?>>Thêm vào giỏ hàng</button></a>
                        <a id="themgh2" <?php echo "dt=$id" ?>><button type="button" onclick="ktSL2()" class="btn btn-primary btn-lg ms-5" <?php if ($sl == false||!isset($_SESSION["id_tk"])) echo " disabled"; else if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))) echo " disabled"; ?>>Mua ngay</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-md p-5">
                    <hr>
                    <h3>Mô tả sản phẩm</h3>
                    <p>
                        <?php
                        if (is_null($dt["mota"])) echo "Chưa có mô tả";
                        else echo $dt["mota"];

                        ?>
                    </p>
                </div>
                <?php
                    if((new Thongso)->layTatCa($_GET["id"])==false){
                        echo '<div class="col-md p-3 ps-5">Chưa có thông số cụ thể</div>';
                    }else{
                        include("bangthongso.php");
                    }
                ?>
            </div>

        </div>
        <hr>

        <div style="padding: 20px;">
            <h3>
                Các sản phẩm khác
            </h3>
            <div class="danhsach d-flex text-center justify-content-start flex-wrap align-content-around" style="padding: 30px;">
                <?php

                $spMoi = (new Dongdienthoai)->layNgauNhien5();
                if (!empty($spMoi)) {
                    foreach ($spMoi as $sp) {
                        echo
                        '
                            <div class="card m-2 p-2" style="width:200px">
                                <img class="card-img-top" src="./assets/img/dienthoai/' . $sp["anh"] . '" alt="Card image">
                                <div class="card-body">
                                    <div style="height: 100px;">
                                        <h5 class="card-title">' . $sp["ten_ddt"] . '</h5>
                                    </div>
                                    <p class="card-text">' . number_format($sp["gia"], 0, ',', '.') . ' đ</p>
                                    <a href="chitietsanpham.php?id=' . $sp["id_ddt"] . '" class="btn btn-primary">Xem chi tiết</a>
                                </div>
                            </div>
                            
                        ';
                    }
                } else {
                    echo '';
                }
                ?>
            </div>
        </div>
        <hr>
        <div>
            <div class="">
                <?php
                if(isset($_SESSION["id_tk"]))
                if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))) {
                } else {
                    include("binhluan.php");
                }
                ?>
            </div>
        </div>
        <div class="" style="padding: 20px 200px 20px 200px;">
            <br>
            <br>
            <h2 class=".display" id="DG">Đánh giá sản phẩm</h2>
            <div>

                <?php
                if ($dg == false) echo "Chưa có đánh giá";
                else echo '<h1><i class="fas fa-star text-warning"></i>&#160;' . $dg . '</h1>';
                ?>

            </div>
            <br>
            <br>
            <?php
            $dsbl = (new Dongdienthoai)->layBl($id);

            if ($dsbl != false) {
                foreach ($dsbl as $i) {
                    $avt = (new Khachhang)->layAvt($i["id_kh"]);
                    if (!$avt) $avt = "./assets/img/anhdaidien/macdinh.png";
                    else $avt = "./assets/img/anhdaidien/" . $avt;
                    $ten = (new Khachhang)->layTen($i["id_kh"]);
                    if (!$ten) $ten = " ";
                    $dg = (new Danhgia)->layDanhGiaByKH($i["id_kh"], $id);
                    if (!$dg) $dg = "Chưa có đánh giá";

                    echo
                    '
                        <div class="row">
                            <div class="col-md-2" style="padding: 10px;">
                                <div class="mx-auto" style="width:100px; height: 100px; border-radius:50%;">
                                    <img src="' . $avt . '"
                                    alt="" style="width:100px; height: 100px; border-radius:50%;">
                                </div>
                    
                            </div>
                            <div class="col-md-10 p-3">
                                <h5>' . $ten . '</h5>
                                <p class="mb-0"><i class="fas fa-star text-warning"></i>&#160;' . $dg . '</p>
                                <p>' . $i["thoigian_bl"] . '</p>
                                <p>
                                ' . $i["noidung_bl"] . '
                                </p>
                            </div>
               
                        </div>
                        <br>
                        <br>
                        ';
                }
            }

            ?>
        </div>
        <div class="container-fluid footer bg-dark text-white m-0">
            <div class="row">
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