<?php
session_start();
include('connect.php');


///////////////////////////////-- collecting errors here --///////////////////////////////
$errors = [];
///////////////////////////////-- collecting errors here --///////////////////////////////

$user = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

///////////////////////////////-- VALIDATE funs WALLing --///////////////////////////////

// function reg_vlad_empty($chkname, $key)
// {
//     global $errors;
//     if (empty($chkname)) {
//         $error[$key] = "empty";
//     }
// }
function reg_vlad_empty($chkname, $key)
{
    if (empty($chkname)) {
        $_SESSION['errors'][$key] = "empty";
    }
}
//////
function reg_email_VALIDATE($chkname, $key)
{
    if (!filter_var($chkname, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][$key] = "true";
    }
}
//////
function reg_val_isset($chkname, $key)
{
    global $conn;

    $select = "SELECT * FROM users WHERE name = '$chkname'";
    $result = $conn->query($select);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['errors'][$key] = "true";
    }
    ///////
    $select_M = "SELECT * FROM users WHERE email = '$chkname'";
    $result_M = $conn->query($select_M);
    if (mysqli_num_rows($result_M) > 0) {
        $_SESSION['errors'][$key] = "true";
    }
}

///////////////////////////////-- VALIDATE funs WALLing --///////////////////////////////

reg_vlad_empty($user, 'user');
reg_vlad_empty($password, 'password');
reg_vlad_empty($email, 'email');
reg_email_VALIDATE($email, 'Invalidemail');

reg_val_isset($user, 'user_isset');
reg_val_isset($email, 'email_isset');

$live_url_DN_open = $_SESSION['live_url_DN_open'];
if (empty($_SESSION['errors'])) {
    $ins = "INSERT INTO users( name, email, password, gender) VALUES ('$user','$email','$password','$gender')";
    $conn->query($ins);
    $_SESSION['suc_USER_log'] = $user;

    if ($live_url_DN_open) {

        header("location:$live_url_DN_open");
    } else {

        header("Location:../index.php");
    }
} else {
    header("Location:../register.php");
}

// echo "<pre>";
// print_r($_POST);
// print_r($errors);
// print_r($_SESSION);
