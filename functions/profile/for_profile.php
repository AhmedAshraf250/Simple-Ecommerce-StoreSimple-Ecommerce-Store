
<?php


session_start();
include "../connect.php";
$userID = $_POST['user-id'];
$select_user = "SELECT * FROM users WHERE id = $userID";
$result = $conn->query($select_user);
$user_row = $result->fetch_assoc();

$curent_user_PIC = $user_row['image'];
$curent_user_PIC_LOC = '../../admin/img/profile/' . $curent_user_PIC;


// file name
$filename = $_FILES['profPic']['name'];
$filetemp =  $_FILES['profPic']['tmp_name'];
$new_img_name = time() . rand(1, 100) . $filename;
// Location
$location = '../../admin/img/profile/' . $new_img_name;
// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg", "png", "jpeg", "gif");


$response = 0;
if (in_array($file_extension, $image_ext)) {
    // Upload file

    if (move_uploaded_file($filetemp, $location)) {
        $img_ins_UPDATE = "UPDATE users SET image='$new_img_name' WHERE id = $userID";
        $conn->query($img_ins_UPDATE);
        unlink($curent_user_PIC_LOC);
        $response = $location;
    }
}

echo $response;
header("location:../../profile.php");
