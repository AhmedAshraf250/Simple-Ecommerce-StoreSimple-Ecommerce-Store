<?php
include 'connect.php';

extract($_POST);

if ($name && $phone && $email && $subject && $message) {
    $ins = "INSERT INTO messages(name, phone, email, subject, message, view) VALUES ('$name','$phone','$email','$subject','$message',0)";

    if ($conn->query($ins) === TRUE) {
        // echo "New record created successfully";
        echo "<div class='alert alert-success'>تم إرسال الرسالة بنجاح .. شكرا لك</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$array = [
    "dsfds" =>  "sdfdsf"
];