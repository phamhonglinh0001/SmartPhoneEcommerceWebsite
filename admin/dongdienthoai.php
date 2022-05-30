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
    <title>QL dòng điện thoại</title>
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
                            <a class="nav-link active" href="dongdienthoai.php">
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

        <div class="container-fluid p-5" style="min-height: 80vh;">
            <div style="margin-bottom: 20px;">
                <script>
                    function getData(value) {
                        
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("tb-hienthi").innerHTML = (this.responseText);
                                }
                            };
                            xmlhttp.open("GET", "ajaxDataDT.php?id_th=" + value, true);
                            xmlhttp.send();
                        
                    }
                </script>
                
                <select onchange="getData(this.value)" class="form-select" name="thuonghieu" id="thuonghieu" style="width:300px;">
                    <?php
                    $th = (new Thuonghieu)->layTatCa();
                    if (isset($th) && !is_null($th) && !empty($th)) {
                        echo '<option value="0">Chọn thương hiệu</option>';
                        foreach ($th as $x) {
                            echo
                            '
                                <option value="' . $x["id_th"] . '">' . $x["ten_th"] . '</option>
                                ';
                        }
                    } else {
                        echo
                        '
                            <option value="0">Không có thương hiệu</option>
                            ';
                    }

                    ?>
                </select>
                
                <div class="text-end">
                
                <a href="themdongdt.php" class="btn btn-success">Thêm mới</a>
                </div>
                
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tb-hienthi">
                    <tr>
                        <th style="width: 10%;">
                            Ảnh
                        </th>
                        <th style="width: 30%;" >
                            Dòng điện thoại
                        </th>
                        <th style="width: 10%;">
                            Thương hiệu
                        </th>
                        <th style="width: 10%;">
                            Khuyến mãi
                        </th>
                        
                        <th style="width: 15%;">
                            Giá
                        </th>
                        <th style="width: 10%;">
                            Bảo hành
                        </th>
                        <th style="width: 15%;">
                            Thao tác
                        </th>
                    </tr>

                    <?php
                    $ddt = (new Dongdienthoai)->layTatCa();
                    if (isset($ddt) && !is_null($ddt) && !empty($ddt)) {
                        foreach ($ddt as $x) {
                            $th = (new Thuonghieu)->layTenById($x["id_th"]);
                            if ($th == false) $th = "";
                            if (isset($x["id_km"]) && !is_null($x["id_km"])) {
                                $km = (new Khuyenmai)->layGtKMById($x["id_km"]);
                                if ($km == false) $km = "";
                                else $km .= "%";
                            } else {
                                $km = "";
                            }
                            if (isset($x["mota"]) && !is_null($x["mota"])) {
                                $mota = $x["mota"];
                            } else {
                                $mota = "";
                            }
                            if (isset($x["gia"]) && !is_null($x["gia"])) {
                                $gia = number_format($x["gia"], 0, ',', '.');
                            } else {
                                $gia = "";
                            }
                            if (isset($x["tg_bh"]) && !is_null($x["tg_bh"])) {
                                $tg_bh = $x["tg_bh"] . " tháng";
                            } else {
                                $tg_bh = "";
                            }


                            echo '<tr>';
                            if (is_null($x["anh"])) echo "<td></td>";
                            else echo
                            '
                                            <td>
                                                <img style="width:50px;" src="../assets/img/dienthoai/' . $x["anh"] . '">
                                            </td>
                                        ';
                            echo
                            '
                                            <td>
                                                <a href="../chitietsanpham.php?id='.$x["id_ddt"].'">' . $x["ten_ddt"] . '</a>
                                            </td>
                                        ';
                            echo
                            '
                                            <td>
                                                ' . $th . '
                                            </td>
                                        ';
                            echo
                            '
                                            <td>
                                                ' . $km . '
                                            </td>
                                        ';
                            
                            echo
                            '
                                            <td>
                                                ' . $gia . ' vnđ
                                            </td>
                                        ';
                            echo
                            '
                                            <td>
                                                ' . $tg_bh . '
                                            </td>
                                        ';
                            echo
                            '
                                            <td class="text-center">
                                                <a href="suadongdt.php?id='.$x["id_ddt"].'" class="btn btn-primary" style="margin-bottom:5px;">Sửa</a><br>
                                                <a href="suasoluong.php?id='.$x["id_ddt"].'" class="btn btn-warning" style="margin-bottom:5px;">Quản lý số lượng</a>
                                                
                                            </td>
                                        ';
                            echo '</tr>';
                        }
                    } else {
                        echo
                        '
                                <tr>
                                    <td colspan="7">
                                        Không có điện thoại
                                    </td>
                                </tr>
                                ';
                    }
                    ?>
                </table>
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