<?php
include "config.php";
include "autoload.php";
session_start();
$th = (new Thuonghieu())->layTatCa();
if (isset($_GET["ten"]) && !empty($_GET["ten"])) {
    $ten = $_GET["ten"];
} else $ten = "";
$dsth = [];
foreach ($th as $data) {
    if (isset($_GET[$data["ten_th"]]) && !empty($_GET[$data["ten_th"]])) {
        $dsth[] = $_GET[$data["ten_th"]];
    }
}
if (isset($_GET["gia"]) && !empty($_GET["gia"])) {
    $gia = $_GET["gia"];
} else $gia = 0;
if (isset($_GET["danhgiaduoi"]) && !empty($_GET["danhgiaduoi"])) {
    $danhgiaduoi = $_GET["danhgiaduoi"];
} else $danhgiaduoi = 0;
if (isset($_GET["danhgiatren"]) && !empty($_GET["danhgiatren"])) {
    $danhgiatren = $_GET["danhgiatren"];
} else $danhgiatren = 0;
if (isset($_GET["khuyenmai"]) && !empty($_GET["khuyenmai"])) {
    $khuyenmai = $_GET["khuyenmai"];
} else $khuyenmai = 0;
if (isset($_GET["ram"]) && !empty($_GET["ram"])) {
    $ram = $_GET["ram"];
} else $ram = 0;
if (isset($_GET["rom"]) && !empty($_GET["rom"])) {
    $rom = $_GET["rom"];
} else $rom = 0;
if (isset($_GET["manhinh"]) && !empty($_GET["manhinh"])) {
    $manhinh = $_GET["manhinh"];
} else $manhinh = 0;
if (isset($_GET["pin"]) && !empty($_GET["pin"])) {
    $pin = $_GET["pin"];
} else $pin = 0;
if (isset($_GET["nsx"]) && !empty($_GET["nsx"])) {
    $nsx = $_GET["nsx"];
} else $nsx = 0;

$ds = (new Dongdienthoai)->timKiem($ten, $dsth, $gia, $danhgiaduoi, $danhgiatren, $khuyenmai, $ram, $rom, $manhinh, $pin, $nsx);
$dsid = [];
foreach ($ds as $item) {
    $dsid[] = $item["id_ddt"];
}
$sanpham = (new Dongdienthoai)->layTatCaBangId($dsid);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm nâng cao</title>
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
                            <a class="nav-link active" href="timkiemnangcao.php"><i class="fa-solid fa-magnifying-glass"></i>
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
        <div class="container-fluid p-5 searchbox">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="ten" class="form-control" placeholder="Tên điện thoại...">
                    <button type="submit" class="btn btn-primary" type="button">Tìm kiếm</button>
                    <button type="reset" class="btn btn-danger" type="button">Làm mới bộ lọc</button>
                </div>

                <div class="mb-3 mt-3">
                    <label for="" class="form-label"><span class="badge bg-danger">Thương hiệu</span></label>
                    <br>
                    <?php
                    foreach ($th as $data) {
                        $id = $data["id_th"];
                        $ten = $data["ten_th"];
                        echo
                        '
                        <div class="form-check d-inline-block">
                        <input class="form-check-input" type="checkbox" id="' . $ten . '" name="' . $ten . '" value="' . $id . '">
                        <label class="form-check-label">' . $ten . '</label>
                        </div>&nbsp;&nbsp;&nbsp;
                        ';
                    }


                    ?>


                </div>

                <div class="mb-3 d-inline-block" style="width:250px;">
                    <label for="" class="form-label"><span class="badge bg-danger">Giá</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">VNĐ</span>
                        <select name="gia" class="form-select d-inline-block">
                            <option value="0">Không chọn</option>
                            <option value="dong_dienthoai.gia<30000000">Dưới 3 triệu</option>
                            <option value="(dong_dienthoai.gia>=3000000 and dong_dienthoai.gia<=5000000)">3 triệu - 5 triệu</option>
                            <option value="(dong_dienthoai.gia>=5000000 and dong_dienthoai.gia<=10000000)">5 triệu - 10 triệu</option>
                            <option value="dong_dienthoai.gia>10000000">Trên 10 triệu</option>

                        </select>
                    </div>
                </div>

                <div class="mb-3 d-inline-block ms-5">
                    <label for="" class="form-label"><span class="badge bg-danger">Đánh giá</span></label>
                    <br>
                    Từ
                    <div class="d-inline-block">
                        <select name="danhgiaduoi" class="form-select d-inline-block">
                            <option value="0">Không chọn</option>
                            <option value=">=1">1 sao</option>
                            <option value=">=2">2 sao</option>
                            <option value=">=3">3 sao</option>
                            <option value=">=4">4 sao</option>
                            <option value=">=5">5 sao</option>
                        </select>
                    </div>

                    Đến
                    <div class="d-inline-block">
                        <select name="danhgiatren" class="form-select d-inline-block">
                            <option value="0">Không chọn</option>
                            <option value="<=1">1 sao</option>
                            <option value="<=2">2 sao</option>
                            <option value="<=3">3 sao</option>
                            <option value="<=4">4 sao</option>
                            <option value="<=5">5 sao</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-inline-block ms-5" style="width: 200px">
                    <label for="" class="form-label"><span class="badge bg-danger">Khuyến mãi</span></label>
                    <div class="d-inline-block">
                        <select name="khuyenmai" class="form-select d-inline-block">
                            <option value="0">Không chọn</option>
                            <option value="khuyen_mai.giatri_km<25">Dưới 25%</option>
                            <option value="(khuyen_mai.giatri_km>=25 and khuyen_mai.giatri_km<=50)">25% - 50%</option>
                            <option value="(khuyen_mai.giatri_km>=50 and khuyen_mai.giatri_km<=75)">50% - 75%</option>
                            <option value="(khuyen_mai.giatri_km>=75 and khuyen_mai.giatri_km<=99)">75% - 99%</option>

                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"><span class="badge bg-danger">Cấu hình:</span></label>
                    <br>
                    <div class="container-flui d-flex justify-content-start ">
                        <div class="" style="width:150px;margin: 10px; margin-left:0;">
                            <div class="">
                                <span class="input-group-text">RAM</span>
                                <select name="ram" class="form-select">
                                    <option value="0">Không chọn</option>
                                    <option value="thong_so.ram<2">Dưới 2GB</option>
                                    <option value="(thong_so.ram>=2 and thong_so.ram<=4)">2GB - 4GB</option>
                                    <option value="(thong_so.ram>=4 and thong_so.ram<=8)">4GB - 8GB</option>
                                    <option value="thong_so.ram>8">Trên 8GB</option>

                                </select>
                            </div>
                        </div>
                        <div class="" style="width:150px;margin: 10px;">
                            <span class="input-group-text">ROM</span>
                            <select name="rom" class="form-select ">
                                <option value="0">Không chọn</option>
                                <option value="thong_so.rom<16">Dưới 16GB</option>
                                <option value="thong_so.rom=16">16GB</option>
                                <option value="thong_so.rom=32">32GB</option>
                                <option value="thong_so.rom=64">64GB</option>
                                <option value="thong_so.rom=128">128GB</option>
                                <option value="thong_so.rom>128">Trên 128GB</option>
                            </select>
                        </div>
                        <div class="" style="width:150px;margin: 10px;">

                            <span class="input-group-text">Màn hình</span>
                            <select name="manhinh" class="form-select ">
                                <option value="0">Không chọn</option>
                                <option value="thong_so.kichthuocmanhinh<5">Dưới 5 inch</option>
                                <option value="(thong_so.kichthuocmanhinh>=5 and thong_so.kichthuocmanhinh<=5.5)">5 inch - 5.5 inch</option>
                                <option value="(thong_so.kichthuocmanhinh>=5.5 and thong_so.kichthuocmanhinh<=6)">5.5 inch - 6 inch</option>
                                <option value="thong_so.kichthuocmanhinh>6">Trên 6 inch</option>

                            </select>
                        </div>
                        <div class="" style="width:200px;margin: 10px;">

                            <span class="input-group-text">Pin</span>
                            <select name="pin" class="form-select ">
                                <option value="0">Không chọn</option>
                                <option value="thong_so.dungluongpin<2000">Dưới 2000mAh</option>
                                <option value="(thong_so.dungluongpin>=2000 and thong_so.dungluongpin<=3000)">2000mAh - 3000mAh</option>
                                <option value="(thong_so.dungluongpin>=3000 and thong_so.dungluongpin<=4000)">3000mAh - 4000mAh</option>
                                <option value="thong_so.dungluongpin>4000">Trên 4000mAh</option>

                            </select>
                        </div>


                        <div class="" style="width:150px;margin: 10px;">

                            <span class="input-group-text">Năm sản xuất</span>
                            <select name="nsx" class="form-select ">
                                <option value="0">Không chọn</option>
                                <option value="thong_so.ngayramat<'2020-01-01'">Trước 2020</option>
                                <option value="(thong_so.ngayramat>'2020-01-01' and thong_so.ngayramat<='2020-12-31')">2020</option>
                                <option value="(thong_so.ngayramat>'2021-01-01' and thong_so.ngayramat<='2021-12-31')">2021</option>
                                <option value="(thong_so.ngayramat>'2022-01-01' and thong_so.ngayramat<='2022-12-31')">2022</option>
                                <option value="thong_so.ngayramat>'2023-01-01'"></option>
                            </select>
                        </div>
                    </div>
                </div>





            </form>
            <hr>
        </div>
        <div class="cantainer-fluid px-5 py-3">
            <div class="spmoi">
                <h3><span class="badge bg-success">Kết quả tìm kiếm</span></h3>
            </div>
            <div class="danhsach d-flex text-center justify-content-start flex-wrap align-content-around p-3">
                <?php
                if (!empty($sanpham)) {
                    foreach ($sanpham as $sp) {
                        echo
                        '
                            <div class="card m-2 p-2" style="width:200px">
                                <img class="card-img-top" src="./assets/img/dienthoai/' . $sp["anh"] . '" alt="Card image">
                                <div class="card-body">
                                    <div style="height: 100px;">
                                        <h5 class="card-title">' . $sp["ten_ddt"] . '</h5>
                                    </div>
                                    <p class="card-text">' . number_format($sp["gia"], 0, ',', '.') . ' đ</p>
                                    <a href="chitietsanpham.php?id='.$sp["id_ddt"].'" class="btn btn-primary">Xem chi tiết</a>
                                </div>
                            </div>
                            
                        ';
                    }
                } else {
                    echo '<h1>Không có sản phẩm phù hợp</h1>';
                }
                ?>
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