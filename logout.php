<?php
session_start();

unset($_SESSION['suc_USER_log']);
unset($_SESSION['suc_USER_log_ID']);
// session_unset();
// session_destroy();
header('location:login.php');
