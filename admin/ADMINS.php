<?php
$status = "ADMINS";
include("includes/head-sidebar.php");
include("includes/topbar.php");
// $live_user_id = $_SESSION['userID'];
$live_user_id = $_SESSION['suc_log'][$_SESSION['user']]['id'];
$select_user = "SELECT * FROM admins WHERE id = $live_user_id";
$res_live_user = $conn->query($select_user);
$row_live_user = $res_live_user->fetch_assoc();

$select_privileges = "SELECT * FROM privileges_admins WHERE priv = $USER_PRIVILEGES_SESSION";
$result_privileges = $conn->query($select_privileges);
$row_priv = $result_privileges->fetch_assoc();
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800 ">ADMINS</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">welcome you <span style="font-size: larger" class="badge badge-primary h2"><?= $_SESSION['user'] ?></span>
            you are a <span style="font-size: larger" class="badge badge-primary"><?= $row_priv['name'] ?></span></h1>
    </div>


    <!-- Content Row -->
    <div class="row">
        <div class=" col-lg-12">

            <?php
            if (!isset($_GET['action'])) {
                include("design/admins.php");
            } elseif ($_GET['action'] === "add") {
                include("design/add_admin.php");
            } elseif ($_GET['action'] === "edit") {
                include("design/edit_admin.php");
            }
            ?>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include("includes/footer.php") ?>