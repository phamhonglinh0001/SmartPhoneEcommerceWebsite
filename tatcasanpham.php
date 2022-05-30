<?php
include "config.php";
include "autoload.php";
session_start();
$ddt = new Dongdienthoai();
$ddt->layTatCa();
$sl = ceil($ddt->getRowCount()/10);
if(!isset($_GET["trang"])) $_GET["trang"] = 1;
$trang = $_GET["trang"];
$data = $ddt->layLimit($trang);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả điện thoại</title>
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
                            <a class="nav-link active" href="tatcasanpham.php"><i class="fas fa-mobile-alt"></i>
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
        <div class="container-fluid bg-success text-white text-center mt-3 p-5">
            <h1>URPHONE</h1>
            <h5>Thế giới điện thoại</h5>
            <p>Chào mừng bạn đến với Urphone. Dưới đây là tất cả các mẫu điện thoại mà cửa hàng đang kinh doanh. Mời bạn 
                xem! 
            </p>
        </div>
        <div class="cantainer-fluid px-5 py-3">
            <div class="spmoi">
                <h3><span class="badge bg-success">Tất cả điện thoại</span></h3>
            </div>
            <div class="danhsach d-flex text-center justify-content-start flex-wrap align-content-around p-3">
            <?php 
                    if(!empty($data)){
                        foreach ($data as $sp){
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
                        echo '<h1>Hiện tại cửa hàng chưa có sản phẩm nào!</h1>';
                    }
                ?>

            </div>
        </div>
        <div class="container-fluid p-3">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="<?php if($trang-1>0) echo 'tatcasanpham.php?trang='.$trang-1;?>">Trang trước</a></li>
                <?php
                for ($i=1; $i<=$sl; $i++){
                    if($i==$trang){
                        echo 
                    '
                    <li class="page-item active"><a class="page-link" href="tatcasanpham.php?trang='.$i.'">'.$i.'</a></li>
                    ';
                    }else{
                        echo 
                    '
                    <li class="page-item"><a class="page-link" href="tatcasanpham.php?trang='.$i.'">'.$i.'</a></li>
                    ';
                    }
                }
                ?>
                <li class="page-item"><a class="page-link" href="<?php if($trang+1<$sl) echo 'tatcasanpham.php?trang='.$sl+1;?>">Trang sau</a></li>
              </ul>
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