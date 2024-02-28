<?php
session_start();
// $errors = [];

$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // $errors[] = 'Email is not valid';
    // echo 'Email is not valid';
    // class="alert alert-danger"
    // $num = 1;
    echo '<div class="alert alert-danger">Email is not valid</div>';
} else {
    // include('../includes/modalSendMessage.php');
    $_SESSION['contact_email'] = $email;
    header("Location:../includes/modalSendMessage.php");
}

