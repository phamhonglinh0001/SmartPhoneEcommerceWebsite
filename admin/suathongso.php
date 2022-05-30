<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    (new Thongso)->update($_GET["id_ddt"],$_POST['congnghemanhinh'],	$_POST['dophangiai'],	$_POST['kichthuocmanhinh'],	$_POST['camsau'],	$_POST['camtruoc'],	$_POST['hedieuhanh'],	$_POST['cpu'],	$_POST['tocdocpu'],	$_POST['gpu'],	$_POST['ram'],	$_POST['rom'],	$_POST['congsac'],	$_POST['congtainghe'],	$_POST['loaipin'],	$_POST['dungluongpin'],	$_POST['congsuatsac'],	$_POST['dai'],	$_POST['rong'],	$_POST['day'],	$_POST['ngayramat'],	$_POST['nang']);
    $_SESSION["err"] = "Lưu thay đổi";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông số</title>
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
                            <a class="nav-link active" href="thongso.php">
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
        
        <div class="" style="min-height: 80vh; padding:20px;">
        <h5 class="text-center">Sửa thông số</h5>
        <h6 class="text-center text-danger">Điện thoại: <?php echo (new Dongdienthoai)->layTen($_GET["id_ddt"]); ?> </h6>
        <div class="text-center">
        <span class="text-danger">
            <?php
                if(isset($_SESSION["err"])){
                    echo $_SESSION["err"];
                    unset($_SESSION["err"]);
                }
            ?>
        </span>
        </div>
            <?php
                $x = (new Thongso)->layTatCa($_GET["id_ddt"]);
                if($x!=false){
                    echo
                    '
                    <div class="table-responsive">
                    <form action="" method="post">
                    ';
                    echo
                    '
                    <table class="table table-hover table-borderless mx-auto" style="width:600px;">
                    ';
                    
                        echo
                        '
                        <tr>
                         <th>
                             Công nghệ màn hình
                         </th>
                         <td>
                            <input required class="form-control" name="congnghemanhinh" value="'.$x["congnghemanhinh"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Độ phân giải
                         </th>
                         <td>
                            <input required class="form-control" name="dophangiai" value="'.$x["dophangiai"].'">
                         </td>
                        </tr>
                        <tr>
                        <th>
                            Kích thước màn hình
                        </th>
                        <td>
                            <input required class="form-control" name="kichthuocmanhinh" value="'.$x["kichthuocmanhinh"].'">
                        </td>
                       </tr>
                       <tr>
                         <th>
                             Camera sau
                         </th>
                         <td>
                            <input required class="form-control" name="camsau" value="'.$x["camsau"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Camera trước
                         </th>
                         <td>
                            <input required class="form-control" name="camtruoc" value="'.$x["camtruoc"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Hệ điều hành
                         </th>
                         <td>
                            <input required class="form-control" name="hedieuhanh" value="'.$x["hedieuhanh"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             CPU
                         </th>
                         <td>
                            <input required class="form-control" name="cpu" value="'.$x["cpu"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Tốc độ CPU
                         </th>
                         <td>
                            <input required class="form-control" name="tocdocpu" value="'.$x["tocdocpu"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             GPU
                         </th>
                         <td>
                            <input required class="form-control" name="gpu" value="'.$x["gpu"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             RAM
                         </th>
                         <td>
                            <input required class="form-control" name="ram" value="'.$x["ram"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             ROM
                         </th>
                         <td>
                            <input required class="form-control" name="rom" value="'.$x["rom"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Cổng sạc
                         </th>
                         <td>
                            <input required class="form-control" name="congsac" value="'.$x["congsac"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Cổng tai nghe
                         </th>
                         <td>
                            <input required class="form-control" name="congtainghe" value="'.$x["congtainghe"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Loại pin
                         </th>
                         <td>
                            <input required class="form-control" name="loaipin" value="'.$x["loaipin"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Dung lượng pin
                         </th>
                         <td>
                            <input required class="form-control" name="dungluongpin" value="'.$x["dungluongpin"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Công suất sạc
                         </th>
                         <td>
                            <input required class="form-control" name="congsuatsac" value="'.$x["congsuatsac"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Dài x rộng x dày
                         </th>
                         <td>
                            <input required style="width:30%;" class="form-control d-inline-block" name="dai" value="'.$x["dai"].'">
                            <input required style="width:30%;" class="form-control d-inline-block" name="rong" value="'.$x["rong"].'">
                            <input required style="width:30%;" class="form-control d-inline-block" name="day" value="'.$x["day"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Ngày ra mắt
                         </th>
                         <td>
                            <input required class="form-control" name="ngayramat" value="'.$x["ngayramat"].'">
                         </td>
                        </tr>
                        <tr>
                         <th>
                             Trọng lượng
                         </th>
                         <td>
                            <input required class="form-control" name="nang" value="'.$x["nang"].'">
                         </td>
                        </tr>
     
                        ';
                   
                    echo
                    '
                    </table>
                    ';
                    echo
                    '
                    <br>
                    <div class="text-center">
                    <button class="btn btn-primary" type="submit">Lưu</button>
                    <a class="btn btn-danger" href="thongso.php">Trở về</a>
                    </div>
                    </form>
                    </div>
                    ';
                }
            ?>
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