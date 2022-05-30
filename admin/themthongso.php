<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    (new Thongso)->them($_GET["id_ddt"],$_POST['congnghemanhinh'],	$_POST['dophangiai'],	$_POST['kichthuocmanhinh'],	$_POST['camsau'],	$_POST['camtruoc'],	$_POST['hedieuhanh'],	$_POST['cpu'],	$_POST['tocdocpu'],	$_POST['gpu'],	$_POST['ram'],	$_POST['rom'],	$_POST['congsac'],	$_POST['congtainghe'],	$_POST['loaipin'],	$_POST['dungluongpin'],	$_POST['congsuatsac'],	$_POST['dai'],	$_POST['rong'],	$_POST['day'],	$_POST['ngayramat'],	$_POST['nang']);
    $_SESSION["err"] = "Thêm thành công";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông số</title>
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
                            <a class="nav-link active" href="thongso.php">
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
                            <a class="nav-link" href="donhang.php">
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
                                    if(!isset($_SESSION["ad"])){
                                        echo 
                                        '
                                        <li><a class="dropdown-item" href="taikhoan.php"><i class="fas fa-sign-in-alt"></i>
                                        Đăng nhập</a></li>
                                        ';
                                    }else{
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

        <div class="" style="min-height: 80vh; padding:20px;">
            <h5 class="text-center">Thêm thông số</h5>
            <h6 class="text-center text-danger">Điện thoại: <?php if((new Dongdienthoai)->layTen($_GET["id_ddt"])!=false) echo (new Dongdienthoai)->layTen($_GET["id_ddt"]); ?> </h6>
            <div class="text-center">
                <span class="text-danger">
                    <?php
                    if (isset($_SESSION["err"])) {
                        echo $_SESSION["err"];
                        echo
                        '
                        <a href="suathongso.php?id_ddt='.$_GET["id_ddt"].'" class="btn btn-warning">Xem</a>
                        ';
                        unset($_SESSION["err"]);
                    }
                    ?>
                </span>
            </div>

            <div class="table-responsive">
                <form action="" method="post">
                    <?php
                        if((new Thongso)->layTatCa($_GET["id_ddt"])==false){
                            echo
                            '
                            <table class="table table-hover table-borderless mx-auto" style="width:600px;">

                        <tr>
                            <th>
                                Công nghệ màn hình
                            </th>
                            <td>
                                <input required class="form-control" name="congnghemanhinh">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Độ phân giải
                            </th>
                            <td>
                                <input required class="form-control" name="dophangiai">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Kích thước màn hình
                            </th>
                            <td>
                                <input placeholder="6.5" required class="form-control" name="kichthuocmanhinh">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Camera sau
                            </th>
                            <td>
                                <input required class="form-control" name="camsau">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Camera trước
                            </th>
                            <td>
                                <input required class="form-control" name="camtruoc">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Hệ điều hành
                            </th>
                            <td>
                                <input required class="form-control" name="hedieuhanh">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                CPU
                            </th>
                            <td>
                                <input required class="form-control" name="cpu">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Tốc độ CPU
                            </th>
                            <td>
                                <input required class="form-control" name="tocdocpu">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                GPU
                            </th>
                            <td>
                                <input required class="form-control" name="gpu">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                RAM
                            </th>
                            <td>
                                <input placeholder="1.5" required class="form-control" name="ram">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                ROM
                            </th>
                            <td>
                                <input placeholder="32" required class="form-control" name="rom">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Cổng sạc
                            </th>
                            <td>
                                <input required class="form-control" name="congsac">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Cổng tai nghe
                            </th>
                            <td>
                                <input required class="form-control" name="congtainghe">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Loại pin
                            </th>
                            <td>
                                <input required class="form-control" name="loaipin">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Dung lượng pin
                            </th>
                            <td>
                                <input placeholder="3000" required class="form-control" name="dungluongpin">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Công suất sạc
                            </th>
                            <td>
                                <input required class="form-control" name="congsuatsac">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Dài x rộng x dày
                            </th>
                            <td>
                                <input placeholder="(mm)" required style="width:30%;" class="form-control d-inline-block" name="dai"> <input placeholder="(mm)" required style="width:30%;" class="form-control d-inline-block" name="rong"> <input placeholder="(mm)" required style="width:30%;" class="form-control d-inline-block" name="day">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Ngày ra mắt
                            </th>
                            <td>
                                <input placeholder="2022-03-30" required class="form-control" name="ngayramat">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Trọng lượng
                            </th>
                            <td>
                                <input placeholder="(g)" required class="form-control" name="nang">
                            </td>
                        </tr>


                    </table>

                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Thêm</button>
                        <a class="btn btn-danger" href="thongso.php">Trở về</a>
                    </div>
                            ';

                        }
                    ?>
                    
                </form>
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