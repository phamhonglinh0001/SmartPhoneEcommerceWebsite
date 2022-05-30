<?php
include "config.php";
include "autoload.php";
session_start();
if (!isset($_GET["cn"])) $_GET["cn"] = "hoso";
$chucnang = $_GET["cn"];

if (isset($_SESSION["dieuhuong"])) unset($_SESSION["dieuhuong"]);

if (!isset($_SESSION["id_tk"]) || is_null($_SESSION["id_tk"])) {
    $_SESSION["dieuhuong"] = "taikhoan.php";
    header("location:dangnhap.php");
} else {
    $id_tk = $_SESSION["id_tk"];
}
$kh = new Khachhang();
$tk = new Taikhoan();

$ttkh = $kh->getAllByTK($id_tk);
$username = $tk->getUsername($id_tk);


if (is_null($ttkh) || empty($ttkh)) {
    $actHoSo = "xulyhoso.php?cn=them";
} else {
    $actHoSo = "xulyhoso.php?cn=sua";
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
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
        <div class="container-fluid">
            <div class="row p-3">
                <div class="col-md-2 text-end">
                    <div class="row" style="height: 70px;">
                        <div class="col-md-4">
                            <img src="<?php
                            $anh=(new Taikhoan)->getAvatar($id_tk);
                        if (!isset($anh[0]["avatar"]) || is_null($anh[0]["avatar"]) || empty($anh[0]["avatar"]))
                            echo './assets/img/anhdaidien/macdinh.png?999999';
                        else
                            echo './assets/img/anhdaidien/' . $anh[0]["avatar"];
                        ?>?999999" class="col-md-4" style="width:70px; height:70px; border-radius: 50%;">


                        </div>
                        <div class="col-md-8 text-start" style="line-height: 70px; font-size: 20px;">
                            <?php echo $username[0]["username"]; ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md text-center">
                            <ul class="list-unstyled">
                                <li><a href="taikhoan.php?cn=hoso" class="text-decoration-none">Hồ sơ</a></li>
                                <li><a href="taikhoan.php?cn=diachi" class="text-decoration-none">Địa chỉ</a></li>
                                <li><a href="taikhoan.php?cn=doimk" class="text-decoration-none">Đổi mật khẩu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 p-5">
                    <?php if ($chucnang == "hoso") include("hoso.php"); ?>



                    <?php if ($chucnang == "diachi"){
                        if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))){
                            $_SESSION["mess"] = "Hãy thêm thông tin khách hàng trước tiên";
                            include("hoso.php");
                        }else{
                            include("diachi.php");
                        }
                        
                    } 


                    ?>
                    <?php
                    if ($chucnang == "doimk") include("doimk.php");

                    ?>
                </div>
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
    
    <script>


    </script>
</body>

</html>