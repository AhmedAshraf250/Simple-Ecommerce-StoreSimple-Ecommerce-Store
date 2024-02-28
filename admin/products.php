<?php
$status = "Products";
include("includes/head-sidebar.php");
include("includes/topbar.php");

?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">products</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <!-- Content Row -->
    <div class="row"">
        <div class=" col-lg-12">

        <?php
        if (!isset($_GET['action'])) {
            include("design/all_pro.php");
        } elseif ($_GET['action'] === "add") {
            include("design/add_pro.php");
        } elseif ($_GET['action'] === "edit") {
            include("design/edit_pro.php");
        }
        ?>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include("includes/footer.php") ?>