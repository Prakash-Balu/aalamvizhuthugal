<?php

session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /admin/admin_login.php?error=login');
}
include("database/db_conection.php");
$delete_id = $_GET['del'];
$delete_query = "delete  from membership WHERE id='$delete_id'"; //delete query
$run = mysqli_query($dbcon, $delete_query);
if ($run) {
//javascript function to open in the same window
    echo "<script>window.open('view_subscriptions.php?deleted=user has been deleted','_self')</script>";
}
