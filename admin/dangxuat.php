<?php
session_start();
if(isset($_SESSION["ad"])){
    unset($_SESSION["ad"]);
    
    header("location:dangnhap.php");
    
}

?>
