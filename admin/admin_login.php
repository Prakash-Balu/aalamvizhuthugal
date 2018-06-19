<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: /admin/view_subscriptions.php');
}
?>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="icon" href="../assets/images/favicon.png" type="image/png">
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
        <title>Admin Login</title>
        <style type="text/css">
            .login-panel {
                margin-top: 150px;
            }
            .panel-heading {
                color: #fff!important;
                background-color: rgba(66, 139, 202, 0.69)!important;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="admin_login.php">
                                <fieldset>
                                    <div class="form-group"  >
                                        <input class="form-control" placeholder="Name" name="admin_name" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="admin_pass" type="password" value="">
                                    </div>


                                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="login" name="admin_login" >


                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

</html>

<?php
include("database/db_conection.php");

if (isset($_POST['admin_login'])) {

    $admin_name = $_POST['admin_name'];
    $admin_pass = md5($_POST['admin_pass']);

    $admin_query = "select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";

    $run_query = mysqli_query($dbcon, $admin_query);

    if (mysqli_num_rows($run_query) > 0) {
        $_SESSION['admin_logged_in'] = 1;
        echo "<script>window.open('view_subscriptions.php','_self')</script>";
    } else {
        echo"<script>alert('Admin Details are incorrect..!')</script>";
    }
}
?>