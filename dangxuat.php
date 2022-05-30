<?php
session_start();
if(isset($_SESSION['id_tk'])) unset($_SESSION['id_tk']);
header("location: ./index.php");
?>