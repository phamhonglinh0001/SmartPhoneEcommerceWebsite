<?php
include("../config.php");
include("../autoload.php");
session_start();

$id_ddt = $_GET["id"];
$ms = (new Soluong)->getFullMS();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $ms_daco = (new Soluong)->getAll($id_ddt);
    foreach($ms as $x){
        $co = false;
        if($ms_daco != false)
        foreach($ms_daco as $i){
            if($x["id_ms"]==$i["id_ms"]){
                $co = true;
                if($_POST[$x["id_ms"]]!=0&&!empty($_POST[$x["id_ms"]])){
                    $id_ms = $x["id_ms"];
                    $so_luong = $_POST[$x["id_ms"]];
                    (new Soluong)->update($so_luong, $id_ms, $id_ddt);
                }
                else{
                    (new Soluong)->delete($i["id_ms"], $id_ddt);
                }
               
                break;
            }
        }
        if($co == false && $_POST[$x["id_ms"]]!=0 && !empty($_POST[$x["id_ms"]]) ){
            (new Soluong)->add($_POST[$x["id_ms"]],$x["id_ms"],$id_ddt);
        }
    }
    $_SESSION["err"] = "Cập nhật số lượng xong.";
}

$ten_dt = (new Dongdienthoai)->layTen($id_ddt);
$ms_daco = (new Soluong)->getAll($id_ddt);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý số lượng</title>
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
        
        <div class="container-fluid p-5">
            <div class="mx-auto p-3" style="width:600px; border: 1px solid rgb(223, 220, 220); border-radius: 10px;">
                <form action="" method="post">
                    <div class="text-center">
                        <h6>Quản lý số lượng</h6>
                        <small><?php echo $ten_dt; ?></small>
                        <br>
                        <span class="text-danger">
                        <?php
                        
                            if(isset($_SESSION["err"])) {
                                echo $_SESSION["err"];
                                unset($_SESSION["err"]);
                            }
                        ?>
                    </span>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <tr>
                                <th style="width:50%;">
                                    Màu sắc 
                                </th>
                                <th>
                                    Số lượng
                                </th>
                            </tr>
                            
                                <?php 
                                    foreach($ms as $x){
                                        if($ms_daco!=false)
                                        foreach($ms_daco as $i){
                                            if($x["id_ms"]==$i["id_ms"]) $value=$i["so_luong"];
                                        }
                                        if(!isset($value)) $value="";
                                        echo
                                        '
                                        <tr>
                                        <th>
                                            '.$x["ten_ms"].'
                                        </th>
                                        <td>
                                        <input placeholder="Nhập số lượng" class="form-control" type="number" min="0" name="'.$x["id_ms"].'" value="'.$value.'">
                                        
                                        </td>
                                        </tr>
                                        ';
                                        $value="";
                                    }
                                ?>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="themmaumoi.php?id=<?php echo $id_ddt; ?>" class="btn btn-warning">
                                        Thêm màu mới
                                    </a>
                                </td>
                            </tr>
                            
                        </table>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">Lưu</button>
                            <a href="dongdienthoai.php" class="btn btn-primary">Trở về</a>
                        </div>
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