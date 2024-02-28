<?php
include('connect.php');

$product_id = $_GET['id'];

// print_r($_SESSION);
$delete_product_imgs = "DELETE FROM images WHERE pro_id = '$product_id'";
$delete_product = "DELETE FROM products WHERE id = '$product_id'";
$conn->query($delete_product_imgs);
$conn->query($delete_product);


header("location:../products.php");
