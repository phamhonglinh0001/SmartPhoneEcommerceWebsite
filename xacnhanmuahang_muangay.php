<div class="mx-auto p-3" style="width:500px; border: 1px solid rgb(223, 220, 220); border-radius: 10px;">
    <form action="xulymuangay.php" method="post">
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <tr>
                    <th>
                        Tên
                    </th>
                    <td>
                        <?php
                        echo (new Dongdienthoai)->layTen($_GET["dt"]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Số lượng
                    </th>
                    <td>
                        <?php
                        echo ($_GET["sl"]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Màu sắc
                    </th>
                    <td>
                        <?php
                        echo ((new Mausac)->getTen($_GET["ms"]));
                        ?>
                    </td>
                </tr>

                <tr>

                    <th>
                        Tên khách hàng
                    </th>
                    <td>
                        <?php
                        echo (new Khachhang)->layTen((new Khachhang)->layId($_SESSION["id_tk"]));
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Chọn địa chỉ
                    </th>
                    <td>
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
                                ' . $d["chitietdiachi"] . '
                                </label>
                                </div>
                                ';
                            }
                        } else {
                            echo "Chưa có địa chỉ";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                    <button type="submit" class="btn btn-danger">Mua ngay</button>
                    </td>
                </tr>
            </table>
        </div>
        <?php
            $_SESSION["dh"]["id"] = $_GET["dt"];
            $_SESSION["dh"]["ms"] = $_GET["ms"];
            $_SESSION["dh"]["sl"] = $_GET["sl"];
        ?>
    </form>
</div>