<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if (isset($_POST["km"])) {
    $ddt = (new Dongdienthoai)->layTatCa();
    if (isset($ddt) && !is_null($ddt)) {
        foreach ($ddt as $x) {
            if (isset($_POST["dt" . $x["id_ddt"]])) {
                (new Dongdienthoai)->updateKM($x["id_ddt"], $_POST["km"]);
            }
        }
    }
    $ddt2 = (new Dongdienthoai)->layTatCaByIdKm($_POST["km"]);
    if (isset($ddt2) && !is_null($ddt2)) {
        foreach ($ddt2 as $x) {
            if (!isset($_POST["dt" . $x["id_ddt"]])) {
                (new Dongdienthoai)->updateKM($x["id_ddt"], "NULL");
            }
        }
    }
    $_SESSION["err"] = "Cập nhật xong";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Áp dụng khuyến mãi</title>
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
                            <a class="nav-link active" href="khuyenmai.php">
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

        <div class="container-fluid p-5" style="min-height: 80vh;">
            <div class="text-center">
            <span class="text-danger">
                <?php
                if (isset($_SESSION["err"])) {
                    echo $_SESSION["err"];
                    unset($_SESSION["err"]);
                }
                ?>
            </span>
            <br>
            </div>
            <div style="width:600px;border:1px solid #ccc;padding:20px;border-radius:10px;" class="mx-auto">

                <script>
                    function getData(value) {
                        if (value == "0") {
                            document.getElementById("hienthi").innerHTML = "";
                        } else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("hienthi").innerHTML = (this.responseText);
                                }
                            };
                            xmlhttp.open("GET", "ajaxApdungkhuyenmai.php?id_km=" + value, true);
                            xmlhttp.send();

                        }
                        document.getElementById("th").value = "0";
                    }

                    function getDataTH(value) {
                        km = document.getElementById("km").value;
                        if (km != 0) {
                            if (value == "0") {
                                getData(km);
                            } else {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("hienthi").innerHTML = (this.responseText);
                                    }
                                };
                                xmlhttp.open("GET", "ajaxApdungkhuyenmai.php?id_km=" + km + "&id_th=" + value, true);
                                xmlhttp.send();

                            }
                        }

                    }
                </script>
                <select onchange="getData(this.value)" class="form-select" name="km" id="km">
                    <option value="0">Chọn khuyến mãi</option>
                    <?php
                    $km = (new Khuyenmai)->ad_layAll();
                    if (isset($km) && !is_null($km)) {
                        foreach ($km as $x) {
                            echo
                            '
                        <option value="' . $x["id_km"] . '">' . $x["ten_km"] . '</option>
                        ';
                        }
                    }
                    ?>
                </select>
                <br>
                <select onchange="getDataTH(this.value)" class="form-select" name="th" id="th">
                    <option value="0">Chọn thương hiệu</option>
                    <?php
                    $th = (new Thuonghieu)->layTatCa();
                    if (isset($th) && !is_null($th)) {
                        foreach ($th as $x) {
                            echo
                            '
                        <option value="' . $x["id_th"] . '">' . $x["ten_th"] . '</option>
                        ';
                        }
                    }
                    ?>
                </select>


                <div style="margin: 50px; margin-bottom:10px;">
                    <form action="" idkm="" method="post" id="hienthi">


                    </form>
                </div>
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