<?php
include "config.php";
include "autoload.php";
session_start();
$ddt = new Dongdienthoai();
$spMoi = $ddt->laySpMoi();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urphone - Thế giới điện thoại</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
</head>

<body>
    <div class="root mx-auto">
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
        <div class="mx-auto">
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-md pt-1 mx-auto">
                        <!-- Carousel -->
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                            </div>

                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/img/slide/1.png" alt="" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/slide/2.png" alt="" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/slide/3.png" alt="" class="d-block w-100">
                                </div>
                            </div>

                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-3">
            <div class="row">
                <div class="d-flex justify-content-center flex-wrap">
                    <div>
                        <a href="timkiemnangcao.php?Iphone=1">
                            <img src="./assets/img/thuonghieu/iphone.png" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Itel=2">
                            <img src="./assets/img/thuonghieu/itel.jpg" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Masstel=3">
                            <img src="./assets/img/thuonghieu/masstel.png" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Mobell=4">
                            <img src="./assets/img/thuonghieu/mobell.jpg" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Nokia=5">
                            <img src="./assets/img/thuonghieu/nokia.jpg" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Oppo=6">
                            <img src="./assets/img/thuonghieu/oppo.jpg" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Realme=7">
                            <img src="./assets/img/thuonghieu/realme.png" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Samsung=8">
                            <img src="./assets/img/thuonghieu/samsung.png" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Vivo=9">
                            <img src="./assets/img/thuonghieu/vivo.jpg" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                    <div>
                        <a href="timkiemnangcao.php?Xiaomi=10">
                            <img src="./assets/img/thuonghieu/xiaomi.png" class="rounded thuonghieu" alt="brand">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cantainer-fluid px-5 py-3">
            <div class="spmoi">
                <h3>Sản phẩm <span class="badge bg-danger">Mới</span></h3>
            </div>
            <div class="danhsach d-flex text-center justify-content-start flex-wrap align-content-around p-3">
                <?php 
                    if(!empty($spMoi)){
                        foreach ($spMoi as $sp){
                            echo
                        '
                            <div class="card m-2 p-2" style="width:200px">
                                <img class="card-img-top" src="./assets/img/dienthoai/'.$sp["anh"].'" alt="Card image">
                                <div class="card-body">
                                    <div style="height: 100px;">
                                        <h5 class="card-title">'.$sp["ten_ddt"].'</h5>
                                    </div>
                                    <p class="card-text">'.number_format($sp["gia"], 0, ',', '.').' đ</p>
                                    <a href="chitietsanpham.php?id='.$sp["id_ddt"].'" class="btn btn-primary">Xem chi tiết</a>
                                </div>
                            </div>
                            
                        ';
                        }
                    }else{
                        echo '<h1>Hiện tại chưa có sản phẩm mới!</h1>';
                    }
                ?>
                

            </div>
        </div>
        <div class="container-fluid p-5 bg-primary d-flex text-center text-white justify-content-around">
            <div>
                <h1><i class="fas fa-dolly-flatbed"></i></h1>
                <h5>Giao hàng toàn quốc</h5>
            </div>
            <div>
                <h1><i class="fas fa-headset"></i></i></h1>
                <h5>Hỗ trợ 24/7</h5>
            </div>
            <div>
                <h1><i class="fas fa-lock"></i></i></h1>
                <h5>Thanh toán bảo mật</h5>
            </div>
            <div>
                <h1><i class="fas fa-undo"></i></i></h1>
                <h5>30 ngày đổi mới</h5>
            </div>
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