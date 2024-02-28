<?php
session_start();
include('connect.php');

///////////////////////////////-- collecting errors here --///////////////////////////////
$errors = [];
///////////////////////////////-- collecting errors here --///////////////////////////////

$frist_name = $_POST['fname'];
$last_name = $_POST['lname'];
$password = $_POST['password'];
$email = $_POST['email'];

if ($last_name) {
    $fullName = $frist_name . ' ' . $last_name;
} else {
    $fullName = $frist_name;
}

///////////////////////////////-- VALIDATE funs WALLing --///////////////////////////////

function reg_vlad_empty($chkname, $key)
{
    // global $errvar;
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

///////////////////////////////-- VALIDATE funs WALLing --///////////////////////////////

reg_vlad_empty($fullName, 'user');
reg_vlad_empty($password, 'password');
reg_vlad_empty($email, 'email');
reg_email_VALIDATE($email, 'Invalidemail');

// echo "<pre>";
// print_r($_SESSION);
// unset($_SESSION['errors']);
// die();
//--//--//--//--//--//--//--//--//--//--//--//--//

// if (empty($frist_name)) {           // || empty($last_name)) {

// $errors['user'] = "empty";
// $_SESSION['errors']['user'] = 'empty';
// $errors['user'] = 'empty';
// $errors = ['user' => 'empty'];
// }
// elseif (!empty($frist_name) && !empty($last_name)) {
// $errors['user'] = 'Testing';
// }
//--//--//--//--//--//--//--//--//--//--//--//--//

// if (empty($password)) {
//     $errors['password'] = "empty";
//     // $_SESSION['errors']['password'] = 'empty';
//     // $errors['password'] = 'empty';
//     // $errors = ['password' => 'empty'];
// }
// //--//--//--//--//--//--//--//--//--//--//--//--//

// if (empty($email)) {
//     $errors['email'] = "empty";
//     // $_SESSION['errors']['email'] = 'empty';
//     // $errors['email'] = 'empty';
//     // $errors = ['email' => 'empty'];
// } else {
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $errors['Invalidemail'] = "true";
//         // $_SESSION['errors']['Invalidemail'] = 'true';
//         // $errors['Invalidemail'] = 'true';
//         // $errors = ['Invalidemail' => 'true'];
//         // $errors = "Invalid email format";
//     }
// }
// //--//--//--//--//--//--//--//--//--//--//--//--//

// if (empty($errors)) {
//     $ins = "INSERT INTO users(name, password, email,gender,pr) VALUES ('$fullName','$password','$email',1,1)";
//     $conn->query($ins);
//     $_SESSION['success_log'] = $fullName;
//     header("Location:../index.php");
// } else {
//     header("Location:../register.php");
// }

if (empty($_SESSION['errors'])) {
    $ins = "INSERT INTO users(name, password, email,gender,pr) VALUES ('$fullName','$password','$email',1,1)";
    $conn->query($ins);
    $_SESSION['success_log'] = $fullName;
    header("Location:../index.php");
} else {
    header("Location:../register.php");
}

echo "<pre>";
print_r($_POST);
// print_r($errors);
print_r($_SESSION);
echo $fullName;
