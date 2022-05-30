<tr>
    <td class="chb">
        <div class="d-flex justify-content-start align-content-center">
            <div class="form-check">
                <input class="form-check-input chon" type="checkbox" id="check<?php echo $i["id"];?>" value="<?php echo $i["id"];?>">
                <label class="form-check-label">Chọn</label>
            </div>
        </div>
    </td>
    <td>
        <img src="<?php
                    $temp = new Dongdienthoai();
                    if ($temp->layAnh($i["id_ddt"]) != false) echo "./assets/img/dienthoai/" . $temp->layAnh($i["id_ddt"]);
                    else echo "";
                    ?>" alt="" style="width:50px; height:50px;">
        <a href="chitietsanpham.php?id=<?php echo $i["id_ddt"]; ?>">
            <?php
            if ($temp->layTen($i["id_ddt"]) != false) echo $temp->layTen($i["id_ddt"]);
            ?>
        </a>
    </td>
    <td>
        <?php
        $km = (new Dongdienthoai)->layKM($i["id_ddt"]);
        $dongia = $temp->layGia($i["id_ddt"]);
        if($km!=false){
            if ($dongia != false) echo '<strike>'.number_format($dongia, 0, ',', '.') . " vnđ</strike><br>";
            echo (number_format((100-$km)/100*$dongia, 0, ',', '.')).' vnđ';
            $dongia = (100-$km)/100*$dongia;
        }else{
            if ($dongia != false) echo number_format($dongia, 0, ',', '.') . " vnđ";
            
        }
        
        ?>
    </td>
    <td>
        <?php
            echo $i["so_luong"];
        ?>
        
    </td>
    
    <td>
    <?php
            echo $i["ten_ms"];
        ?>
    </td>
    <td>
        <?php
            echo (number_format($i["so_luong"]*$dongia, 0, ',', '.')).' vnđ';
        ?>
        
    </td>
    <td>
        <a href="suagiohang.php?gh=<?php echo $i["id"];?>"><button class="btn btn-warning">Sửa</button></a>
        <a href="xoagiohang.php?gh=<?php echo $i["id"];?>"><button class="btn btn-danger">Xóa</button></a>
    </td>
</tr>