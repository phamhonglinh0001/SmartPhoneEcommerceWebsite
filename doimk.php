<?php
if(isset($_POST["mkcu"])&&isset($_POST["mkmoi"])&&isset($_POST["mkcu"])){
    $mkcu = $_POST["mkcu"];
    $mkmoi = $_POST["mkmoi"];
    $nhaplaimk = $_POST["nhaplaimk"];
    if(!$tk->ktMk($mkcu,$id_tk)){
        $mess = "Mật khẩu cũ nhập không chính xác";
        $_SESSION["mess"]=$mess;
    }else if($mkmoi!=$nhaplaimk){
        $mess = "Nhập lại mật khẩu không trùng khớp";
        $_SESSION["mess"]=$mess;
    }else{
        $tk->doiMk($mkmoi, $id_tk);
        $mess = "Bạn đã đổi mật khẩu thành công";
        $_SESSION["mess"]=$mess;
    }
}




?>
<div class="row" style="margin-bottom: 100px;">
    <div>
        <h3>Đổi mật khẩu</h3>
        <small>
            Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác
        </small>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="text-danger">
                <?php if (isset($_SESSION["mess"])) echo $_SESSION["mess"]; unset($_SESSION["mess"]);?>
            </div>
            <form action="" method="post">
                <div class="table-responsive">
                    <table class="table thongtin table-borderless">

                        <tr>
                            <th>Mật khẩu hiện tại</th>
                            <td>
                                <input type="password" name="mkcu" style="width:400px;" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Mật khẩu mới</th>
                            <td>
                                <input type="password" name="mkmoi" style="width:400px;" required> <br>

                            </td>
                        </tr>
                        <tr>
                            <th>Xác nhận mật khẩu</th>
                            <td>
                                <input type="password" name="nhaplaimk" style="width:400px;" required> <br>

                            </td>
                        </tr>

                    </table>
                </div>
                <div class="text-center">
                    <div>
                        <input type="submit" value="Đổi mật khẩu" class="btn btn-danger">
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>