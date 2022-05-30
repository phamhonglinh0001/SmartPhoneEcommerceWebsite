<?php
include "config.php";
include "autoload.php";
session_start();
if (isset($_SESSION["id_tk"]) == false) {
    $_SESSION["dieuhuong"] = "giohang.php";
    header("location: dangnhap.php");
}
if (is_null((new Khachhang())->getAllByTK($_SESSION["id_tk"])) || empty((new Khachhang())->getAllByTK($_SESSION["id_tk"]))){
    $_SESSION["mess"] = "Hãy thêm thông tin khách hàng trước tiên";
    header("location:taikhoan.php");
}
$id = $_SESSION["id_tk"];
$id_kh = (new Khachhang)->layId($id);
if ($id_kh != false) $gh = (new Giohang)->getGioHang($id_kh);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
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
                            <a class="nav-link active" href="giohang.php"> <i class="fas fa-shopping-cart"></i>
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
        <div class="container-fluid p-5">
            <div>
                <h1>Giỏ hàng của bạn</h1>
                <p>Hãy nhanh tay thanh toán các sản phẩm trong giỏ hàng của bạn để mang chúng về nhà</p>
            </div>
            <hr>
            
            <div class="mx-auto">
                <a id="thanhtoan"><button onclick="thanhtoan();" class="btn btn-primary">Thanh toán</button></a>
                <span class="text-danger"> 
                    <?php
                    if(isset($_SESSION["err"])) {
                        echo $_SESSION["err"];
                        unset($_SESSION["err"]);
                    }
                    
                    ?>
                </span>
            </div>
            <script>
                function thanhtoan(){
                    const chb = document.getElementsByClassName("chon");
                    const sl = chb.length;
                    var chuoi = "";
                    for(i=0; i<sl; i++){
                        if(chb[i].checked == true){
                            chuoi += chb[i].value+"-";
                        }
                    }
                    chuoi = chuoi.slice(0, -1);
                    const lk = document.getElementById("thanhtoan");
                    lk.setAttribute("href","ktSL.php?cn=thanhtoan&chuoi="+chuoi);
                    
                }
            </script>
            <br>
            <div class="table-responsive banggiohang">
        
                <table class="table table-hover">
                    <tr>
                        <th>
                           
                        </th>
                        <th style="width: 350px" class="">
                            Sản phẩm
                        </th>
                        <th style="width: 200px">
                            Đơn giá
                        </th>
                        <th>
                            Số lượng
                        </th>
                        <th>
                            Màu sắc
                        </th>
                        <th>
                            Tổng tiền
                        </th>
                        <th>

                        </th>
                    </tr>

                    <?php
                    if ($gh != false) {
                        foreach ($gh as $i) {
                            include("itemgiohang.php");
                        }
                    }
                    ?>



                </table>
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