<?php
include "config.php";
include "autoload.php";
session_start();
if(!isset($_SESSION["id_tk"])){
    $_SESSION["dieuhuong"] = "donhang.php";
    header("location:dangnhap.php");
}else if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))){
    $_SESSION["mess"] = "Hãy thêm thông tin khách hàng trước tiên";
    header("location:taikhoan.php");
}


if (isset($_GET["cn"])) $cn = $_GET["cn"];
else $cn = "dagiaohang";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
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
                            <a class="nav-link active" href="donhang.php"> <i class="fas fa-shopping-cart"></i>
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
        <div class="" style="min-height: 90vh; padding: 20px 100px;">
            <div>
                <a href="donhang.php?cn=choxacnhan" class="text-decoration-none <?php if ($cn == "choxacnhan") echo 'text-danger'; ?>">Chờ xác nhận</a> &#160;&#160;&#160;&#160;
                <a href="donhang.php?cn=dangdonggoi" class="text-decoration-none <?php if ($cn == "dangdonggoi") echo 'text-danger'; ?>">Đang đóng gói</a>&#160;&#160;&#160;&#160;
                
                <a href="donhang.php?cn=danggiaohang" class="text-decoration-none <?php if ($cn == "danggiaohang") echo 'text-danger'; ?>">Đang giao hàng</a>&#160;&#160;&#160;&#160;
                <a href="donhang.php?cn=dagiaohang" class="text-decoration-none <?php if ($cn == "dagiaohang") echo 'text-danger'; ?>">Đã giao hàng</a>&#160;&#160;&#160;&#160;
                <a href="donhang.php?cn=dahuy" class="text-decoration-none <?php if ($cn == "dahuy") echo 'text-danger'; ?>">Đã hủy</a>
                &#160;&#160;&#160;&#160;
                <div onmouseout="hienthi(0);" onmouseover="hienthi(1);"style="position: relative; display: inline-block;">
                <i style="font-size: 20px;" class="text-primary fa-solid fa-circle-question"></i>
                    <div class="table-responsive" id="hienthi" style="background-color: white; width: 500px; display: none; position: absolute; left: 120%; top: 0; z-index:99; font-weight: thin">
                        <table class="table table-bordered">
                                <tr class="bg-danger">
                                    <th>Trạng thái</th>
                                    <th>Mô tả</th>
                                </tr>
                                <tr>
                                    <td>
                                    Chờ xác nhận
                                    </td>
                                    <td>
                                    Đơn hàng đang chờ Shop xác nhận
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Đang đóng gói
                                    </td>
                                    <td>
                                    Shop đang chuẩn bị/đóng gói đơn hàng
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Đang vận chuyển
                                    </td>
                                    <td>
                                    Đơn hàng đang được nhân viên giao đến bạn
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Đã giao hàng
                                    </td>
                                    <td>
                                    Đơn hàng đã giao thành công
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Đã hủy
                                    </td>
                                    <td>
                                    Bạn hoặc Shop đã hủy đơn hàng
                                    </td>
                                </tr>
                        </table>
                         
                    </div>
                </div>
                <script>
                    function hienthi(value) {
                        div = document.getElementById("hienthi");
                        if(value==1){
                           div.style.display = "block";
                        }
                        if(value==0){
                           div.style.display = "none";
                        }
                    }
                </script>
            </div>
            <br><br>

            <?php
            if ($cn == "choxacnhan") {
                $gh_ht = (new Donhang)->layChoXN((new Khachhang)->layId($_SESSION["id_tk"]));
                if ($gh_ht == false) echo "<h2>Chưa có đơn hàng</h2>";
                else {
                    foreach ($gh_ht as $x) {
                        include("donhang_choxacnhan.php");
                    }
                }
               
            }

            ?>


            <?php
            if ($cn == "danggiaohang") {
                
                $gh_ht = (new Donhang)->layDgGH((new Khachhang)->layId($_SESSION["id_tk"]));
                if ($gh_ht == false) echo "<h2>Chưa có đơn hàng</h2>";
                else {
                    foreach ($gh_ht as $x) {
                        include("donhang_danggiaohang.php");
                    }
                }
                
            }

            ?>


            <?php
            if ($cn == "dagiaohang") {
                
                $gh_ht = (new Donhang)->layDaGH((new Khachhang)->layId($_SESSION["id_tk"]));
                if ($gh_ht == false) echo "<h2>Chưa có đơn hàng</h2>";
                else {
                    foreach ($gh_ht as $x) {
                        include("donhang_dagiaohang.php");
                    }
                }
               
            }

            ?>


            <?php
            if ($cn == "dangdonggoi") {
                
                $gh_ht = (new Donhang)->laydangdonggoi((new Khachhang)->layId($_SESSION["id_tk"]));
                if ($gh_ht == false) echo "<h2>Chưa có đơn hàng</h2>";
                else {
                    foreach ($gh_ht as $x) {
                        include("donhang_dangdonggoi.php");
                    }
                }
               
            }

            ?>


            <?php
            if ($cn == "dahuy") {
                
                $gh_ht = (new Donhang)->layHuy((new Khachhang)->layId($_SESSION["id_tk"]));
                if ($gh_ht == false) echo "<h2>Chưa có đơn hàng</h2>";
                else {
                    foreach ($gh_ht as $x) {
                        include("donhang_dahuy.php");
                    }
                }
               
            }

            ?>

        </div>
        <div class="container-fluid footer bg-dark text-white m-0">
            <div class="row pt-3">
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