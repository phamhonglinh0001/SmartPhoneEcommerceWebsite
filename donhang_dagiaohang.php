<div class="table-responsive" style="margin-bottom: 50px;">

    <table class="table table-bordered">
    <tr class="text-center bg-danger">
            <th style="width: 25%">
                Mã đơn hàng 
            </th>
            <td style="width: 25%">
                <?php echo $x["id_dh"];?>
            </td>
            <th style="width: 25%">
                Trạng thái
            </th>
            <td style="width: 25%">
                Đã giao hàng
            </td>
        </tr>
        <tr>
            <th colspan="4" class="text-center">
                Thông tin đặt hàng
                <br>
                <a href="hoadon.php?id=<?php echo $x["id_dh"];?>">Xem hóa đơn</a>
            </th>
        </tr>
        <?php
            $ds = (new Giohang)->getFromDH($x["id_dh"]);
            if($ds!=false){
                
                foreach($ds as $i){

                    echo '<tr><td>';

                    echo '<img src="./assets/img/dienthoai/' . (new Dongdienthoai)->layAnh($i["id_ddt"]) . '" alt="Ảnh sản phâm" style="height: 100px; width:100px;">';

                    echo '</td>';
                    echo '<td colspan="3">';
                    echo 
                    '
                    <a href="chitietsanpham.php?id='.$i["id_ddt"].'">' . (new Dongdienthoai)->layTen($i["id_ddt"]) . '</a>
                    <br>
                    Màu sắc: <small>'.$i["ten_ms"].'</small>
                    <br>
                    Số lượng: <small>'.$i["so_luong"].'</small>
                    <br>
                    Đơn giá: <small>'.number_format($i["gia_mua"], 0, ',', '.').' vnđ</small>

                    ';
                    echo '</td></tr>';
                }
                echo 
                '
                <tr>
                    <th colspan="2" class="text-end">Tổng tiền</th>
                    <td colspan="2">'.number_format($x["tong_tien"], 0, ',', '.').' vnđ </td>
                </tr>
                ';
                echo 
                '
                <tr>
                    <td colspan="4">
                        Ngày đặt hàng: <small>'.$x["ngaydathang"].'</small> <br>
                        Ngày giao hàng: <small>'.$x["ngaynhanhang"].'</small>
                    </td>
                </tr>
                ';
                echo '<tr><td colspan="4">';
                $dc = (new Diachi)->layTatCaByDC($x["id_dc"]);
                if(count($dc)>0) $dc = $dc[0]["chitietdiachi"];
                else $dc = "Địa chỉ này không còn tồn tại";
                $kh = (new Khachhang)->getAllByTK($_SESSION["id_tk"]);
                echo 
                '
                Khách hàng: <b>'.$kh[0]["ten_kh"].'</b>
                <br>
                Số điện thoại: <b>'.$kh[0]["sdt"].'</b>
                <br>
                Địa chỉ nhận hàng: <b>'.$dc.'</b>
                <br>
                ';
                echo '</td></tr>';
            }
        ?>
    </table>
            
</div>