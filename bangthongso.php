<div class="col-md p-3 ps-5">
    <h2>
        <span class="badge bg-success text-white">
            Thông số kỹ thuật
        </span>
    </h2>
    <div class="table-responsive">
        <table class="table table-borderless table-hover thongsochitiet" style="font-size: 14px;">
            <tr>
                <th>
                    Công nghệ màn hình
                </th>
                <td>
                    <?php if (!is_null($ts["congnghemanhinh"])) echo $ts["congnghemanhinh"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Độ phân giải
                </th>
                <td>
                    <?php if (!is_null($ts["dophangiai"])) echo $ts["dophangiai"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Kích thước màn hình (inch)
                </th>
                <td>
                    <?php if (!is_null($ts["kichthuocmanhinh"])) echo $ts["kichthuocmanhinh"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Camera sau (MP)
                </th>
                <td>
                    <?php if (!is_null($ts["camsau"])) echo $ts["camsau"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Camera trước (MP)
                </th>
                <td>
                    <?php if (!is_null($ts["camtruoc"])) echo $ts["camtruoc"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Hệ điều hành
                </th>
                <td>
                    <?php if (!is_null($ts["hedieuhanh"])) echo $ts["hedieuhanh"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    CPU
                </th>
                <td>
                    <?php if (!is_null($ts["cpu"])) echo $ts["cpu"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Tốc độ CPU
                </th>
                <td>
                    <?php if (!is_null($ts["tocdocpu"])) echo $ts["tocdocpu"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    GPU
                </th>
                <td>
                    <?php if (!is_null($ts["gpu"])) echo $ts["gpu"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    RAM (GB)
                </th>
                <td>
                    <?php if (!is_null($ts["ram"])) echo $ts["ram"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    ROM (GB)
                </th>
                <td>
                    <?php if (!is_null($ts["rom"])) echo $ts["rom"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Cổng sạc
                </th>
                <td>
                    <?php if (!is_null($ts["congsac"])) echo $ts["congsac"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Cổng tai nghe
                </th>
                <td>
                    <?php if (!is_null($ts["congtainghe"])) echo $ts["congtainghe"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Loại Pin
                </th>
                <td>
                    <?php if (!is_null($ts["loaipin"])) echo $ts["loaipin"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Dung lượng Pin
                </th>
                <td>
                    <?php if (!is_null($ts["dungluongpin"])) echo $ts["dungluongpin"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Công suất sạc
                </th>
                <td>
                    <?php if (!is_null($ts["congsuatsac"])) echo $ts["congsuatsac"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Dài x Rộng X Dày (mm)
                </th>
                <td>
                    <?php if (!is_null($ts["dai"])) echo $ts["dai"]; ?>
                    x
                    <?php if (!is_null($ts["rong"])) echo $ts["rong"]; ?>
                    x
                    <?php if (!is_null($ts["day"])) echo $ts["day"]; ?>

                </td>
            </tr>
            <tr>
                <th>
                    Ngày ra mắt
                </th>
                <td>
                    <?php if (!is_null($ts["ngayramat"])) echo $ts["ngayramat"]; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Bảo hành (tháng)
                </th>
                <td>
                    <?php if (!is_null($dt["tg_bh"])) echo $dt["tg_bh"] ?>
                </td>
            </tr>
        </table>
    </div>
</div>