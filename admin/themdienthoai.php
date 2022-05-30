<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if (isset($_POST["imei"]) && isset($_POST["mausac"])){
    $dt = (new Dienthoai)->ktImei($_POST["imei"]);
    if($dt!=false){
        $_SESSION["err"]= "Mã imei đã tồn tại";
        
    }else{
        (new Dienthoai)->them($_POST["imei"], $_POST["mausac"], $_POST["ddt"]);
        $_SESSION["err"]= "Đã thêm xong. Thêm mới hoặc trở về";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm điện thoại</title>
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
                            <a class="nav-link active" href="dienthoai.php">
                                Điện thoại</a>
                        </li>
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

        <div style="min-height: 80vh; padding: 100px;">
            <div class="mx-auto" style="padding:20px; width:50%;border-radius:10px;border: 1px solid #ccc">
                <div class="text-center">
                    <h3>
                        Thêm điện thoại
                    </h3>
                    <span class="text-danger">
                                <?php
                                    if(isset($_SESSION["err"])){
                                        echo $_SESSION["err"];
                                        unset($_SESSION["err"]);
                                    }
                                ?>
                    </span>
                </div>
                <form action="" method="post">
                    <label for="ddt" class="form-label">Dòng điện thoại</label><br>
                    <select name="ddt" id="ddt" class="form-select">
                        <?php
                            $ddt = (new Dongdienthoai)->layTatCa();
                            if(isset($ddt)&&!is_null($ddt)){
                                foreach($ddt as $x){
                                    echo
                                    '
                                    <option value="'.$x["id_ddt"].'">'.$x["ten_ddt"].'</option>
                                    ';
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <label for="imei" class="form-label">IMEI</label><br>
                    <input name="imei" type="text" id="imei" class="form-control" required>
                    <br>
                    <label for="mausac" class="form-label">Màu sắc</label><br>
                    <input name="mausac" type="text" id="mausac" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="dienthoai.php" class="btn btn-danger">Trở về</a>
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