<?php
echo "<pre>";
print_r($_FILES);
echo count($_FILES['image']['name']);
// print_r($_FILES['image']);

include('connect.php');

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

    move_uploaded_file($img_tmp, "../img/$new_img_name");
    $image_uploded[$i] = $new_img_name;
}

print_r($image_uploded);
$new_image = implode(",", $image_uploded);
echo $new_image;


$imageName_to_array = explode(",", $new_image);
echo "<br>";
print_r($imageName_to_array);
