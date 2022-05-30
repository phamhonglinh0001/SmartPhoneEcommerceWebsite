<?php
include("./config.php");
include("./autoload.php");
session_start();
if(isset($_GET["id"])){
    $dh = (new Donhang)->getAll($_GET["id"]);
    $kh = (new Khachhang)->getByID($dh["id_kh"]);
    $dc = (new Diachi)->layTatCaByDC($dh["id_dc"]);
    $item = (new Giohang)->getFromDH($dh["id_dh"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
</head>
<body>
    <div style="padding: 10px 100px;">
        <div class="text-center">
            <b style="font-size: 20px;">CÔNG TY TNHH URPHONE</b> <br>
            Chuyên kinh doanh các loại Smartphone <br>
            Địa chỉ: 3/2, An Bình, Ninh Kiều, Cần Thơ <br>
            Điện thoại: 0986611387
        </div>
        <br><br>
        <div class="text-center" style="font-size: 30px; font-weight:bolder">
            HÓA ĐƠN BÁN HÀNG
        </div>
        <div class="text-center">
            <?php
                $date=date_create($dh["ngaynhanhang"]);
            ?>
            Ngày <i><?php
            echo date_format($date,"d"); ?></i> tháng <i><?php
            echo date_format($date,"m"); ?></i>  năm <i><?php
            echo date_format($date,"Y"); ?></i>
        </div>
        <br>
        <div style="padding-left: 20px;">
            <b>Khách hàng: </b> <small><?php echo $kh["ten_kh"];?></small>
            <br><b> Địa chỉ: </b> <small><?php echo $dc[0]["chitietdiachi"]; ?></small>
            <br> <b>Điện thoại: </b><small><?php echo $kh["sdt"];?></small>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <tr class="text-center">
                    <th style="width: 5%;">
                        STT
                    </th>
                    <th style="width: 5%;">
                        Mã
                    </th>
                    <th style="width: 30%;">
                        Tên hàng hóa
                    </th>
                    <th style="width: 10%;">
                        Đơn vị tính
                    </th>
                    <th style="width: 10%;">
                        Số lượng
                    </th>
                    <th style="width: 20%;">
                        Đơn giá
                    </th>
                    <th style="width: 20%;">
                        Thành tiền
                    </th>
                </tr>
                <?php
                    $stt = 0;
                    $tong_tien = 0;
                    foreach($item as $x){
                    $stt++;
                    $tendt = (new Dongdienthoai)->layTen($x["id_ddt"]);
                    $thanh_tien = $x["so_luong"]*$x["gia_mua"];
                    $tong_tien+=$thanh_tien;
                    echo 
                    '
                    <tr>
                        <td>'.$stt.'</td>
                        <td>'.$x["id_ddt"].'</td>
                        <td>'.$tendt.'</td>
                        <td>Cái</td>
                        <td>'.$x["so_luong"].'</td>
                        <td>'.number_format($x["gia_mua"], 0, ',', '.').' vnđ</td>
                        <td>'.number_format($thanh_tien, 0, ',', '.').' vnđ</td>
                    </tr>
                    ';
                    }
                    
                    echo 
                    '
                    <tr>
                        <th colspan="6">
                            Tổng cộng
                        </th>
                        <td>
                        '.number_format($tong_tien, 0, ',', '.').' vnđ
                        </td>
                    </tr>
                    ';
                ?>
            </table>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-borderless text-center">
                    <tr>
                        <td>
                            <b>Khách hàng </b><br>
                            <i>(Ký và ghi rõ họ tên)</i>
                        </td>
                        <td>
                            <b>Nhân viên bán hàng</b><br>
                            <i>(Ký và ghi rõ họ tên)</i>
                        </td>
                    </tr>
            </table>
        </div>
    </div>
</body>
</html>