<?php
    include("../config.php");
    include("../autoload.php");
    session_start();
    if(isset($_GET["id_km"])){
        if(isset($_GET["id_th"])){
            $dt = (new Dongdienthoai)->layTatCa();
            if(isset($dt)&&!is_null($dt)){
                foreach($dt as $x){
                    if($x["id_th"]==$_GET["id_th"]){
                        if($x["id_km"]==$_GET["id_km"]){
                            echo
                            '
                            <input name="dt'.$x["id_ddt"].'" type="checkbox" id="dt'.$x["id_ddt"].'" class="form-check-input" checked>
                            <label for="dt'.$x["id_ddt"].'" class="form-check-label">'.$x["ten_ddt"].'</label><br>
                            ';
                        }else{
                            echo
                            '
                            <input name="dt'.$x["id_ddt"].'" type="checkbox" id="dt'.$x["id_ddt"].'" class="form-check-input">
                            <label for="dt'.$x["id_ddt"].'" class="form-check-label">'.$x["ten_ddt"].'</label><br>
                            ';
                        }
                    }else{
                        echo
                        "";
                    }
                    
                }
                echo
                '
                <br><button name="km" value="'.$_GET["id_km"].'" type="submit" class="btn btn-primary">Lưu</button>
                        <a class="btn btn-danger" href="khuyenmai.php">Trở về</a>
                ';
            }else{
                echo "Không có điện thoại";
            }
        }else{
            $dt = (new Dongdienthoai)->layTatCa();
            if(isset($dt)&&!is_null($dt)){
                foreach($dt as $x){
                    if($x["id_km"]==$_GET["id_km"]){
                        echo
                        '
                        <input name="dt'.$x["id_ddt"].'" type="checkbox" id="dt'.$x["id_ddt"].'" class="form-check-input" checked>
                        <label for="dt'.$x["id_ddt"].'" class="form-check-label">'.$x["ten_ddt"].'</label><br>
                        ';
                    }else{
                        echo
                        '
                        <input name="dt'.$x["id_ddt"].'" type="checkbox" id="dt'.$x["id_ddt"].'" class="form-check-input">
                        <label for="dt'.$x["id_ddt"].'" class="form-check-label">'.$x["ten_ddt"].'</label><br>
                        ';
                    }
                }
                echo
                '
                <br><button name="km" value="'.$_GET["id_km"].'" type="submit" class="btn btn-primary">Lưu</button>
                        <a class="btn btn-danger" href="khuyenmai.php">Trở về</a>
                ';
            }else{
                echo "Không có điện thoại";
            }
        }
    }


?>