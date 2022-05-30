<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"]))  header("location:dangnhap.php");
else{
    if(isset($_SESSION["ad"]))
$id = $_SESSION["ad"];
else header("location:dangnhap.php");
$username = (new Taikhoan)->getUsername($id);
$ten_admin = (new Admin)->layTen($id);
if(isset($_POST["pass"])&&isset($_POST["n_pass"])&&isset($_POST["r_pass"])){
    if((new Taikhoan)->ktMk($_POST["pass"], $id)==false){
        $_SESSION["err"] = "Nhập mật khẩu hiện tại không chính xác";
    }else if($_POST["r_pass"]!=$_POST["n_pass"]){
        $_SESSION["err"] = "Nhập lại mật khẩu không chính xác";
    }else if($_POST["n_pass"]==$_POST["pass"]){
        $_SESSION["err"] = "Mật khẩu mới trùng với mật khẩu cũ";
    }else{
        (new Taikhoan)->doiMk($_POST["n_pass"], $id);
        $_SESSION["err"] = "Đổi mật khẩu thành công";
    }
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
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
                            <a class="nav-link" href="dongdienthoai.php">
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
        
        <div class="container-fluid">
            <div class="row p-3">
                <div class="col-md-2 text-end">
                    
                </div>
                <div class="col-md-10 p-5">
                                       
                    <div class="row">
                        <div>
                            <h3>Đổi mật khẩu</h3>
                            <small>
                                Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác
                            </small>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <form action="" method="post">
                                <div class="table-responsive">
                                    <span class="text-danger">
                                        <?php
                                            if(isset($_SESSION["err"])){
                                                echo $_SESSION["err"];
                                                unset($_SESSION["err"]);
                                            }
                                        ?>
                                    </span>
                                    <table class="table thongtin table-borderless">
                                    <tr>
                                            <th>Tên admin</th>
                                            <td>
                                                <?php
                                                    if($ten_admin!=false) echo $ten_admin;
                                                ?>
                                            </td>
                                        </tr>
                                    <tr>
                                            <th>Tên đăng nhập</th>
                                            <td>
                                                <?php
                                                    if(isset($username)) echo $username[0]["username"];
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mật khẩu hiện tại</th>
                                            <td>
                                                <input required name="pass" type="password" style="width:400px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mật khẩu mới</th>
                                            <td>
                                                <input required name="n_pass" type="password" style="width:400px;"> <br>
                                                
                                            </td>
                                        </tr>
                                       <tr>
                                            <th>Xác nhận mật khẩu</th>
                                            <td>
                                                <input required name="r_pass" type="password" style="width:400px;"> <br>
                                                
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                <div class="text-center">
                                    <div>
                                        <button type="submit" class="btn btn-danger">Đổi mật khẩu</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
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