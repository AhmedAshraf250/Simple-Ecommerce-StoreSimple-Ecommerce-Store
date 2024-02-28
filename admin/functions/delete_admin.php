<?php

session_start();

include("connect.php");


$USER_PRIVILEGES_SESSION = $_SESSION['suc_log'][$_SESSION['user']]['priv'];


$selected_admin_ID_toDELETE = $_GET['id'];
$select = "SELECT * from admins WHERE id = $selected_admin_ID_toDELETE";
$result = $conn->query($select);
$row = $result->fetch_assoc();

///-----//////-----//////-----//////-----///

$selected_admin_ID_toDELETE_priv_id = $row['priv_id'];
$select_privileges = "SELECT * FROM privileges_admins WHERE id = $selected_admin_ID_toDELETE_priv_id ";
$result_priv = $conn->query($select_privileges);
$row_priv = $result_priv->fetch_assoc();

$detected_priv = $row_priv['priv'];

if ($USER_PRIVILEGES_SESSION > $detected_priv) {
    $delete = "DELETE FROM admins WHERE id = $selected_admin_ID_toDELETE";
    $conn->query($delete);
    header("location:../admins.php");
} else { ?>

    <?php
    // include("../includes/head-sidebar.php");
    // include("../includes/topbar.php");
    header("location:../admins.php");
    ?>
    // include("../includes/head-sidebar.php");
    // include("../includes/topbar.php");


    <p>fuck you</p>
    <br>
    <br>
    <br>
    <button class> Back </button>

<?php }
// echo $USER_PRIVILEGES_SESSION;
// echo $user_priv_id;
?>