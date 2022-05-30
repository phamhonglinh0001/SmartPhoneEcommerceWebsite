<div class="mx-auto" style="width:600px; border: 1px solid rgb(223, 220, 220); border-radius: 10px; padding:50px;">
    <div class="text-center">
        <span class="badge bg-warning" style="font-size: 20px;">
            Thông tin đơn hàng
        </span>
    </div>
    <hr>
    <?php
    foreach ($ds as $i) {
        $item = (new Giohang)->getItem($i);
        $giakm = (new Dongdienthoai)->layKM($item["id_ddt"]);
        if($giakm==false){
            $gia = number_format((new Dongdienthoai)->layGia($item["id_ddt"]), 0, ',', '.').' vnđ';
        }else{
            $gia = 
            '
            <strike>
                '.number_format((new Dongdienthoai)->layGia($item["id_ddt"]), 0, ',', '.').' vnđ
            </strike><br>
                '.number_format((new Dongdienthoai)->layGia($item["id_ddt"])*((100-$giakm)/100), 0, ',', '.').' vnđ
            ';
        }
        echo
        '
            <div class="table-responsive"
    style="
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 10px;
    padding: 20px;
    ">
        <table class="table table-hover table-borderless">
            <tr>
                <th style="width: 100px;">
                    Điện thoại
                </th>
                <td>
                '.(new Dongdienthoai)->layTen($item["id_ddt"]).'
                </td>
            </tr>
            <tr>
                <th>
                    Màu sắc
                </th>
                <td>
                '.$item["ten_ms"].'
                </td>
            </tr>
            <tr>
                <th>
                    Số lượng
                </th>
                <td>
                '.$item["so_luong"].'
                </td>
            </tr>
            <tr>
                <th>
                    Giá
                </th>
                <td>
                '.$gia.'
                </td>
            </tr>
        </table>
    </div>
    <br>  ';
    }
    ?>
    <hr>
    <div>
        Tên khách hàng:
    <?php
                        echo " ".(new Khachhang)->layTen((new Khachhang)->layId($_SESSION["id_tk"]));
                        ?>
    </div>
    <div>
        <form action="xulymuagh.php?chuoi=<?php echo $_GET["chuoi"]; ?>" method="post">
    <?php
        $dc = (new Diachi)->layTatCa((new Khachhang)->layId($_SESSION["id_tk"]));
        if (count($dc) > 0) {
            foreach ($dc as $d) {
                echo
                '
                <div class="form-check">
                <input type="radio" class="form-check-input" id="dc' . $d["id_dc"] . '" name="diachi" value="' . $d["id_dc"] . '"';
                if ($d["macdinh"] == 1) echo "checked";
                echo '
                >
                <label class="form-check-label" for="dc' . $d["id_dc"] . '">
                '. $d["chitietdiachi"] . '
                </label>
                </div>
                ';
            }
        } else {
            echo "Chưa có địa chỉ";
        }
        ?>
    </div>
    <div>
        <button type="submit" class="btn btn-danger">
            Xác nhận
        </button>
    </div>
    </form>
</div>