<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");

    if(isset($_GET["id_th"])){
        if($_GET["id_th"]=="0") $dt = (new Dongdienthoai)->layTatCa();
        else $dt = (new Dongdienthoai)->getByTH($_GET["id_th"]);
        
        if(isset($dt)&&!is_null($dt)&&!empty($dt)){
            echo
        '
        <tr>
                        <th style="width: 10%;">
                            Ảnh
                        </th>
                        <th style="width: 30%;" >
                            Dòng điện thoại
                        </th>
                        <th style="width: 10%;">
                            Thương hiệu
                        </th>
                        <th style="width: 10%;">
                            Khuyến mãi
                        </th>
                        
                        <th style="width: 15%;">
                            Giá
                        </th>
                        <th style="width: 10%;">
                            Bảo hành
                        </th>
                        <th style="width: 15%;">
                            Thao tác
                        </th>
                    </tr>
        ';
        foreach ($dt as $x) {
            $th = (new Thuonghieu)->layTenById($x["id_th"]);
            if ($th == false) $th = "";
            if (isset($x["id_km"]) && !is_null($x["id_km"])) {
                $km = (new Khuyenmai)->layGtKMById($x["id_km"]);
                if ($km == false) $km = "";
                else $km .= "%";
            } else {
                $km = "";
            }
            if (isset($x["mota"]) && !is_null($x["mota"])) {
                $mota = $x["mota"];
            } else {
                $mota = "";
            }
            if (isset($x["gia"]) && !is_null($x["gia"])) {
                $gia = number_format($x["gia"], 0, ',', '.');
            } else {
                $gia = "";
            }
            if (isset($x["tg_bh"]) && !is_null($x["tg_bh"])) {
                $tg_bh = $x["tg_bh"] . " tháng";
            } else {
                $tg_bh = "";
            }


            echo '<tr>';
            if (is_null($x["anh"])) echo "<td></td>";
            else echo
            '
                            <td>
                                <img style="width:50px;" src="../assets/img/dienthoai/' . $x["anh"] . '">
                            </td>
                        ';
            echo
            '
                            <td>
                                <a href="../chitietsanpham.php?id='.$x["id_ddt"].'">' . $x["ten_ddt"] . '</a>
                            </td>
                        ';
            echo
            '
                            <td>
                                ' . $th . '
                            </td>
                        ';
            echo
            '
                            <td>
                                ' . $km . '
                            </td>
                        ';
            
            echo
            '
                            <td>
                                ' . $gia . ' vnđ
                            </td>
                        ';
            echo
            '
                            <td>
                                ' . $tg_bh . '
                            </td>
                        ';
            echo
            '
            <td class="text-center">
            <a href="suadongdt.php?id='.$x["id_ddt"].'" class="btn btn-primary" style="margin-bottom:5px;">Sửa</a><br>
            <a href="suasoluong.php?id='.$x["id_ddt"].'" class="btn btn-warning" style="margin-bottom:5px;">Quản lý số lượng</a>
            
        </td>
                        ';
            echo '</tr>';
        }
        }else{
            echo '
            <tr>
                <td>
                    Không có điện thoại
                </td>
            </tr>
            ';
        }
    }
?>