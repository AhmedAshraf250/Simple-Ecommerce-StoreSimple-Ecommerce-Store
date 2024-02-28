<?php
$STATUS = "profile";
?>

<!--  head & headre -->
<?php include("includes/head&header.php"); ?>

<?php
if (!isset($_GET['edit'])) {
    include "design/profile/profile.php";
} else if (isset($_GET['edit'])) {
    include "design/profile/profile_edit.php";
}
?>


<?php include("includes/footer.php") ?>