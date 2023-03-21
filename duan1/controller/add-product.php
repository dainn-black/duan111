<?php
require "../models/connect.php";
$name = $_POST["name"];
$price = $_POST["price"];
$describe = $_POST["describe"];
$id_type = $_POST["id_type"];
$image = $_FILES["image"]["name"];
$query = "INSERT INTO `products`( `name`, `image`, `price`, `describe`, `id_type`) VALUES ('$name','$image',$price,'$describe',$id_type)";
// $query = "INSERT INTO products ( name, image, price, describe, id_type) VALUES ('$name','$image',$price,'$describe',$id_type)";

move_uploaded_file($_FILES["image"]["tmp_name"],"../img/".$_FILES["image"]["name"]);

connect($query);
header("location:../views/admin/product.php");
?>