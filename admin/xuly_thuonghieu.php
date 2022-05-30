<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if ($_GET["cn"] == "sua") {
    if (isset($_POST["ten_th"])) {
        (new Thuonghieu)->suaTen($_GET["id"], $_POST["ten_th"]);
    }
    if (isset($_FILES["anh"])&&$_FILES["anh"]["error"]!=4) {
        $tenfile = $_FILES["anh"]["name"];
        $arr = explode(".", $tenfile);
        $temp = end($arr);
        if ($temp != "jpg" && $temp != "png" && $temp != "jpeg" && $temp != "gif") {
            $_SESSION["err"] = "Chỉ chấp nhận tệp jpg/png/jpeg/gif";
        } else {
            $dir = "../assets/img/thuonghieu/" . $_GET["id"] . "." . $temp;
            if(file_exists($dir)) unlink($dir);
            move_uploaded_file($_FILES["anh"]["tmp_name"], $dir);
            (new Thuonghieu)->suaAnh($_GET["id"], $_GET["id"] . "." . $temp);
           
        }
    }
    
    $th = (new Thuonghieu)->layMot($_GET["id"]);
}

if ($_GET["cn"] == "xoa") {
    (new Thuonghieu)->xoa($_GET["id"]);
    header("location:thuonghieu.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thương hiệu</title>
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
                            <a class="nav-link active" href="thuonghieu.php">
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

        <div class="container-fluid p-5" style="min-height: 70vh;">
            <div class="table-responsive">
                <form action="" method="post" enctype="multipart/form-data">
                    <span class="text-danger">
                        <?php
                        if (isset($_SESSION["err"])) {
                            echo $_SESSION["err"];
                            unset($_SESSION["err"]);
                        }

                        ?>
                    </span>
                    <table class="table table-hover text-center">
                        <tr>
                            <th>
                                Tên thương hiệu
                            </th>
                            <th>
                                Ảnh thương hiệu
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input name="ten_th" type="text" required class="form-control" value="<?php if (isset($th["ten_th"])) echo $th["ten_th"]; ?>">
                            </td>
                            <td>
                                <img src="../assets/img/thuonghieu/<?php if (isset($th["anh"])) echo $th["anh"]; ?>" alt="" style="width:220px; height:50px;">
                                <input name="anh" type="file">
                            </td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <a href="thuonghieu.php" class="btn btn-danger">Trở về</a>
                    </div>
                </form>

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