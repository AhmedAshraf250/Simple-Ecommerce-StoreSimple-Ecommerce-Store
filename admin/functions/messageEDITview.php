<?php


$id = $_POST['id'];
$mySpan = $_POST['mySpan'];




require 'connect.php';

$updateMEs = "UPDATE messages SET view = 1 WHERE id = $id";
$query = $conn->query($updateMEs);

if ($query) {

    echo --$mySpan;
} else {
    echo $conn->error;
}



//////////////////////

// $MSG_SEL = "SELECT * FROM messages where view = '0' LIMIT 5 ";
// $MSG_SEL_query = $conn->query($MSG_SEL);
