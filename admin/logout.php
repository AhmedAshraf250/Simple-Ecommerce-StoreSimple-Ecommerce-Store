<?php
session_start();


unset($_SESSION['suc_log']);
// session_unset();
// session_destroy();

header("location:login.php");
