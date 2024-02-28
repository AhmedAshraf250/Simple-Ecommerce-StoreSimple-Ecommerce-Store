<?php
$product_id = $_GET['id'];
include('connect.php');

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$description = $_POST['description'];
// $image = $_POST['image'];
$category = $_POST['cat'];
// $brand = $_POST['brand'];
echo "<pre>";
print_r($_FILES);
// echo $_FILES['image']['error'];

// die();
$filesCOUNT = count($_FILES['image']['name']);
for ($i = 0; $i < $filesCOUNT; $i++) {

    if ($_FILES['image']['error'][$i] === 0) {
        $img_name = $_FILES['image']['name'][$i];
        $img_size = $_FILES['image']['size'][$i];
        $img_tmp =  $_FILES['image']['tmp_name'][$i];

        $img_exp = explode(".", $img_name);
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

        $UPdtePro_IMG = "UPDATE images SET name='$new_img_name' WHERE pro_id = '$product_id'";
        $conn->query($UPdtePro_IMG);

        $UPdtePro = "UPDATE products SET name = '$name',
        price = '$price',
        category = '$category',
        count = '$count',
        description = '$description'
        WHERE id = '$product_id'";
    } else {
        $UPdtePro = "UPDATE products SET name = '$name',
        price = '$price',
        category = '$category',
        count = '$count',
        description = '$description'
        WHERE id = '$product_id'";
    }
}


// جملة الاف دى استخدمنا الكى الثابت فى الفايلز الايرور وهو يكون صفرا عند نجاح الرفع
// وعملنا التعديد بالشكل دا واستخدمنا معه هذه الفكره حتى لا يحدث خطأ مثلا لو عدلنا على اشياء ما غير الصورة مثلا
// لان فى الصورة عملين تشكات على اشياء كثيره وفى عملية التعديل لو ما تم رفع صورة فان عمليات التحقق هتظهر اخطاء وذلك لعدم وجود صورة من الاساس
// فقمنا باستخدام هذه الفكره
// فى الجملة الاولى سوف يعدل عليها بالفعل على عمود الايمج لان بالفعل موجود صورة ولان الايرور سوف يكون صفر
// اما الالس الاخيرة فى جملة اف هذه فسوف نتجاهل عمود الايمج لان لم يتم رفع صورة وكى الايرور لن يكون صفرا بالتأكيد


$conn->query($UPdtePro);
header("location:../products.php");
