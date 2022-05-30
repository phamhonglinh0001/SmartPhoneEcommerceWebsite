<?php
include("../config.php");
include("../autoload.php");
session_start();
if(!isset($_SESSION["ad"])) header("location:dangnhap.php");


$sql = "select * from ".$_GET["bang"];
$data = (new Database)->query($sql);
if(count($data)>0){
    print_r($data);
}else{
    echo "Không có kết quả phù hợp";
}

?>