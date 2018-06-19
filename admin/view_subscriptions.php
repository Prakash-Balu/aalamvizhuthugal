<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /admin/admin_login.php?error=login');
}
?>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
        <title>Subscribers List</title>
        <style>
            .login-panel {
                margin-top: 150px;
            }
            .table {
                margin-top: 50px;

            }

        </style>
    </head>
    <body class="container">
        <div class="table-scrol row">
            <h1 align="center">Subscribers List</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="subscribers" style="table-layout: fixed">
                    <thead>
                        <tr>

                            <th>User Id</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Address</th>
                            <th>Manage User</th>
                        </tr>
                    </thead>

                    <?php
                    include("database/db_conection.php");
                    $view_users_query = "select * from membership;";
                    $run = mysqli_query($dbcon, $view_users_query);

                    while ($row = mysqli_fetch_assoc($run)) {
                        $userId = $row['id'];
                        ?>
                        <tr>
                            <td><?php echo $userId; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['door_no'] . ' ' . $row['street'] . ' ' . $row['town'] . ' ' . $row['district'] . ' PIN:' . ' ' . $row['pincode']; ?></td>
                            <td>
                                <?php
                                if ($row['status'] == 1) {
                                    ?><a href="javascript:void(0);"><button class="btn btn-success">Activate</button></a><?php
                                } else {
                                    ?><a href="activate.php?id=<?php echo $userId ?>"><button class="btn btn-default">Click to Activate</button></a><?php
                                }
                                ?>

                                <a href="delete.php?del=<?php echo $userId ?>"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>

<?php } ?>

                </table>
            </div>
        </div>
    </body>
    <script  type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"  crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/datatables.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery("#subscribers").DataTable();

        });
    </script>
</html>
