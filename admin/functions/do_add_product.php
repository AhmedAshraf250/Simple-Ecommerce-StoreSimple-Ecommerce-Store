<?php
include('connect.php');

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$description = $_POST['description'];
// $image = $_POST['image'];
$category = $_POST['cat'];


// exit();
$insert = "INSERT INTO products(name, price ,category, count, description) 
VALUES 
('$name','$price','$category','$count','$description')";

$conn->query($insert);
$product_id = $conn->insert_id;
// echo ($product_id);
// die();


///////////////////////////////////////////////////////////////////////////////////


$filesCOUNT = count($_FILES['image']['name']);
$image_uploded = [];

for ($i = 0; $i < $filesCOUNT; $i++) {

    $img_name = $_FILES['image']['name'][$i];
    $img_size = $_FILES['image']['size'][$i];
    $img_tmp =  $_FILES['image']['tmp_name'][$i];


    $img_exp = explode(".", $img_name);
    // $img_ext =  $img_exp['1'];
    $img_ext =  end($img_exp);
    $allowed_ext = ['jpg', 'png', 'jpeg', 'gif'];

    if (!in_array($img_ext, $allowed_ext)) {
        echo "Not allowed .. upload a photo";
        exit();
    }

    if ($img_size > 3000000) {
        echo "this is too large .. upload a photo 1:3 Mb";
        exit();
    }


    $new_img_name = time() . rand(1, 10000) . $img_name;

    move_uploaded_file($img_tmp, "../img/products/$new_img_name");

    // $image_uploded[$i] = $new_img_name;

    $img_ins = "INSERT INTO images(pro_id, name) VALUES ('$product_id','$new_img_name')";
    $conn->query($img_ins);
}
// $ImageName_to_string_for_db = implode(",", $image_uploded);

///////////////////////////////////////////////////////////////////////////////////

header("location:../products.php");
