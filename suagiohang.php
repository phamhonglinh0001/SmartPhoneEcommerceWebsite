<?php
include "config.php";
include "autoload.php";
session_start();
if (isset($_GET["gh"])) {
    $id = $_GET["gh"];
}
$gh = (new Giohang)->getItem($id);
//unset($_SESSION["dieuhuong"]);
$_SESSION["dieuhuong"]="suagiohang.php?gh=".$id;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa giỏ hàng</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
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
                <a class="navbar-brand" href="index.php"><i class="fas fa-mobile"></i>Urphone</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="tatcasanpham.php"><i class="fas fa-mobile-alt"></i>
                                Tất cả điện thoại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="timkiemnangcao.php"><i class="fa-solid fa-magnifying-glass"></i>
                                Tìm kiếm nâng cao</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php"><i class="fa-solid fa-address-book"></i>
                                Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="giohang.php"> <i class="fas fa-shopping-cart"></i>
                                Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="donhang.php"> <i class="fas fa-shopping-cart"></i>
                                Đơn hàng</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-h"></i>&nbsp;Thêm</a>
                            <ul class="dropdown-menu">
                                <?php if (isset($_SESSION['id_tk'])) echo '
                               <li><a class="dropdown-item" href="taikhoan.php"><i class="fa-solid fa-address-book"></i>
                                        Tài khoản</a></li>
                                <li><a class="dropdown-item" href="./dangxuat.php"><i class="fa-solid fa-right-from-bracket"></i>
                                        Đăng xuất</a></li> ';
                                else echo '
                                <li><a class="dropdown-item" href="./dangnhap.php"><i class="fas fa-sign-in-alt"></i>
                                        Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="./dangky.php"><i class="fas fa-edit"></i>
                                        Đăng ký</a></li>
                                        ';
                                ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" action="timkiemnangcao.php">
                        <input name="ten" class="form-control me-2" type="text" placeholder="Tên điện thoại">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid p-5">
            <div class="mx-auto p-3" style="width:600px; border: 1px solid rgb(223, 220, 220); border-radius: 10px;">
                <div class="text-center">
                    <div class="text-danger">
                        
                    </div>
                    <div>
                        <span class="text-danger">
                            <?php
                                if(isset($_SESSION["err"])) {echo $_SESSION["err"]; unset($_SESSION["err"]);}
                            ?>
                        </span>
                    </div>
                    <div>
                        <h2>
                            <?php echo (new Dongdienthoai)->layTen($gh["id_ddt"]) ?>
                        </h2>
                        <small style="font-size: 14px;">
                            Màu sắc: <?php echo $gh["ten_ms"]; ?>
                        </small>
                    </div>
                    <br>
                    <script>
                        function tang(){
                            let x = document.getElementById("sl");
                            let sl = x.innerHTML;
                            x.innerHTML = parseInt(sl) + 1;
                        }
                        function giam(){
                            let x = document.getElementById("sl");
                            let sl = x.innerHTML;
                            if(parseInt(sl)>1) x.innerHTML = parseInt(sl) - 1;
                        }
                    </script>
                    <div>
                        <button onclick="giam()" class="btn btn-warning">
                            -
                        </button>
                        <span id="sl" class="badge text-white bg-danger" style="font-size: 18px; ">
                            <?php echo trim($gh["so_luong"]);?>
                        </span>
                        <button onclick="tang()" class="btn btn-warning">
                            +
                        </button>
                    </div>
                    <br>
                   <br>
                   <script>
                        function ktSL1(){
                            const lk = document.getElementById("themgh1");
                            
                            let sl = document.getElementById("sl").textContent;
                            lk.setAttribute("href", "ktSL.php?cn=suagh&sl="+sl+"&id="+lk.getAttribute("id_gh"));
                        }
                    </script>
                   <a id="themgh1" <?php echo "id_gh='".$gh["id"]."'" ;?>>
                   <button type="button" onclick="ktSL1()" class="btn btn-primary">Lưu</button>
                    </a>
            
                   <a href="giohang.php"><button class="btn btn-danger">
                       Trở về
                   </button></a>
                </div>
            </div>
        </div>
        <div class="container-fluid footer bg-dark text-white m-0">
            <div class="row">
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