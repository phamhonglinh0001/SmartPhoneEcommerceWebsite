<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");

if(isset($_GET["id_th"])){
    if($_GET["id_th"]=="0"){
        echo "";
    }else{
        $ddt = (new Dongdienthoai)->getByTH($_GET["id_th"]);
    if(isset($ddt)&&!is_null($ddt)){
        echo
        '
        <option value="0">Chọn dòng điện thoại</option>
        ';
        foreach($ddt as $x){
            echo
            '
            <option value="' . $x["id_ddt"] . '">' . $x["ten_ddt"] . '</option>
            ';
        }
    }
    }
    
}
