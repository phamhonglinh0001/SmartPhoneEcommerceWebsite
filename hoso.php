<div class="row" style="margin-bottom: 100px;">
    <div>
        <h3>Hồ sơ của bạn</h3>
        <small>
            Quản lý thông tin hồ sơ để bảo mật tài khoản
        </small>
        <hr>
    </div>
    <div class="row">
       
            <div class="col-md-8">
            <form action="<?php echo $actHoSo; ?>" method="post" class="row">
                <div class="text-danger">
                    <?php if(isset($_SESSION["mess"])) echo $_SESSION["mess"]; unset($_SESSION["mess"]);?>
                </div>
                <div class="table-responsive">
                    <table class="table thongtin table-borderless">
                        <tr>
                            <th>Tên đăng nhập</th>
                            <td><?php echo $username[0]["username"]; ?></td>
                        </tr>
                        <tr>
                            <th>Tên</th>
                            <td>
                                <input type="text" style="width:400px;" name="ten" required value=
                                <?php
                                if (!is_null($ttkh) && !empty($ttkh))
                                echo "'".$ttkh[0]["ten_kh"]."'";
                                ?>
                                >
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="email" style="width:400px;" name="email" required value=
                                <?php
                                if (!is_null($ttkh) && !empty($ttkh))
                                echo "'".$ttkh[0]["email"]."'";
                                ?>
                                > <br>
                            </td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>
                                
                                <input type="text" style="width:400px;" name="sdt" required value=
                                <?php
                                if (!is_null($ttkh) && !empty($ttkh))
                                echo "'".$ttkh[0]["sdt"]."'";
                                ?>
                                > <br>
                            </td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td>
                                <input type="radio" name="gioitinh" value="1"
                                <?php
                                if (!is_null($ttkh) && !empty($ttkh))
                                if(!isset($ttkh[0]["gioitinh"]) || is_null($ttkh[0]["gioitinh"]) || empty($ttkh[0]["gioitinh"]))
                                echo 'checked';
                                else if($ttkh[0]["gioitinh"]==1){
                                    echo "checked";
                                }
                                
                                ?>
                                
                                >
                                <label for="">Nam</label>
                                <input type="radio" name="gioitinh" value="0"
                                <?php
                                if (!is_null($ttkh) && !empty($ttkh))
                                if($ttkh[0]["gioitinh"]==0){
                                    echo "checked";
                                }
                                
                                ?>
                                >
                                <label for="">Nữ</label>
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td>
                                <input type="text" style="width:400px;" name="ngaysinh" required placeholder="2000-01-01" value=
                                <?php
                                if (!is_null($ttkh) && !empty($ttkh))
                                echo "'".$ttkh[0]["ngaysinh"]."'";
                                ?>
                                >
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center">
                    <div>
                        <input type="submit" class="btn btn-primary" style="width: 100px;" value="Lưu">
                    </div>
                </div>
            </form>
            </div>
            <div class="col-md-4" style="border-left: 1px solid rgb(221, 217, 217);">
                <form action="capnhatavt.php?id_tk=<?php echo $id_tk ?>" enctype="multipart/form-data" method="post">
                <div>
                    <label for="files">Chọn ảnh đại diện</label>
                    <input required id="files" type="file" name="anhdaidien">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
       
    </div>
</div>