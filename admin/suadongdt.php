<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");
if(isset($_POST["ten"])){
    (new Dongdienthoai)->update($_GET["id"], "ten_ddt",$_POST["ten"] );
}
if(isset($_POST["th"])){
    (new Dongdienthoai)->update($_GET["id"], "id_th",$_POST["th"] );
}
if(isset($_POST["mota"])){
    (new Dongdienthoai)->update($_GET["id"], "mota",$_POST["mota"] );
}
if(isset($_POST["gia"])){
    (new Dongdienthoai)->update($_GET["id"], "gia",$_POST["gia"] );
}
if(isset($_POST["bh"])){
    (new Dongdienthoai)->update($_GET["id"], "tg_bh",$_POST["bh"] );
}
if (isset($_FILES["anh"])&&$_FILES["anh"]["error"]!=4) {
    $tenfile = $_FILES["anh"]["name"];
    $arr = explode(".", $tenfile);
    $temp = end($arr);
    if ($temp != "jpg" && $temp != "png" && $temp != "jpeg" && $temp != "gif") {
        $_SESSION["err"] = "Chỉ chấp nhận tệp jpg/png/jpeg/gif";
    } else {
        $dir = "../assets/img/dienthoai/" . $_GET["id"] . "." . $temp;
        if(file_exists($dir)) unlink($dir);
        move_uploaded_file($_FILES["anh"]["tmp_name"], $dir);
        (new Dongdienthoai)->update($_GET["id"], "anh", $_GET["id"] . "." . $temp);
       
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa dòng điện thoại</title>
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
                            <a class="nav-link active" href="dongdienthoai.php">
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
        
        <div class="container-fluid p-5" style="min-height: 80vh;">
            <div class="table-responsive">
                <span class="text-danger">
                    <?php
                        if(isset($_SESSION["err"])){
                            echo $_SESSION["err"];
                            unset($_SESSION["err"]);
                        }
                    ?>
                </span>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <?php
                            $dt = (new Dongdienthoai)->layMotSp($_GET["id"]);
                        
                        ?>
                        <tr>
                            <th>
                                Ảnh
                            </th>
                            <td>
                                <img src="../assets/img/dienthoai/<?php echo $dt["anh"];?>" alt="" style="width:100px;height:100px;">
                                
                                <input style="margin-top:5px;" name="anh" type="file" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Điện thoại
                            </th>
                            <td>
                                <input name="ten" type="text" class="form-control" value="<?php echo $dt["ten_ddt"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Thương hiệu
                            </th>
                            <td>
                                <select name="th" id="" class="form-select">
                                    <?php
                                        foreach((new Thuonghieu)->layTatCa() as $x){
                                            if($x["id_th"]==$dt["id_th"]){
                                                echo 
                                                '
                                                <option value="'.$x["id_th"].'" selected>
                                                    '.$x["ten_th"].'
                                                </option>
                                                ';
                                            }else{
                                                echo 
                                                '
                                                <option value="'.$x["id_th"].'">
                                                    '.$x["ten_th"].'
                                                </option>
                                                ';
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Mô tả
                            </th>
                            <td>
                            <textarea class="form-control" name="mota" id="" cols="30" rows="5"><?php
                                    if(isset($dt["mota"])&&!is_null($dt["mota"])){
                                        echo $dt["mota"];
                                    }
                                ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Giá
                            </th>
                            <td>
                                <input name="gia" class="form-control" type="number" value="<?php if(!is_null($dt["gia"])) echo $dt["gia"]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Bảo hành
                            </th>
                            <td>
                                <input name="bh" class="form-control" type="number" value="<?php if(!is_null($dt["tg_bh"])) echo $dt["tg_bh"]; ?>">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="dongdienthoai.php" class="btn btn-danger">Trở về</a>
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