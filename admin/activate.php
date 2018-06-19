<?php

session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /admin/admin_login.php?error=login');
}
include("database/db_conection.php");
$id = $_GET['id'];
$query = "select * from membership WHERE id='$id'";
$run = mysqli_query($dbcon, $query);
if (mysqli_num_rows($run) > 0) {
    $data = mysqli_fetch_assoc($run);
    $query = "update membership SET status = 1 WHERE id='$id'";
    $run = mysqli_query($dbcon, $query);
    if(isset($data['email']) && $data['email'] != ''){
        subscriptionApprovalMail($data['email'], $data['name']);
    }
    echo "<script>window.open('view_subscriptions.php','_self')</script>";
}
