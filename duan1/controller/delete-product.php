<?php 
require_once "../models/connect.php";
$id = $_GET["id"];
$query = "DELETE FROM `products` WHERE id_p = '$id'";
connect($query);
header("location:../views/admin/product.php");
?>