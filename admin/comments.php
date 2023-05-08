<?php
include "auth/authorize.php";

include "classes/Database.php";
$database = new Database();
$database = $database->getConnection();

$login_session_duration = 1800;
$current_time = time();


if ($_SESSION['id'] == false) {
    header('location: ../index.php');
} else {
    if (($current_time - $_SESSION['last_acted_on'] > $login_session_duration)) {
        header('location: ../index.php');
    }
?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Comments | Blogry - Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Loader -->
        <?php include "common/preloader.php"; ?>

        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php include "common/header.php"; ?>

            <?php include "common/sidebar.php"; ?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Comments</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Approved Comments</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <!-- Table for Category -->
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Comments</h4>
                                        </p>

                                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>UserName</th>
                                                    <th>Comment</th>
                                                    <th>Post</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $status = 'Default';
                                                $sql = "SELECT *, DATE_FORMAT(created_at, '%M %d, %Y') as created_at FROM comments WHERE status = :status";
                                                $stmt = $database->prepare($sql);
                                                $stmt->bindValue(":status", $status, PDO::PARAM_INT);
                                                $stmt->execute();
                                                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($data as $result) {
                                                ?>

                                                        <tr>
                                                            <td><b><?php echo htmlentities($cnt); ?></b></td>
                                                            <td><?php echo htmlentities(ucfirst($result->user_id)); ?></td>
                                                            <td><?php echo htmlentities($result->comment); ?></td>
                                                            <td><?php echo htmlentities(ucfirst($result->post_id)); ?></td>
                                                            <td>
                                                                <?php
                                                                if ($result->status == 'Default') {
                                                                ?>
                                                                    <a class="btn btn-outline-success btn-sm comment_active" status="<?php echo htmlentities($result->status); ?>" comment_id="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->status); ?></a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a class="btn btn-outline-danger btn-sm comment_inactive" status="<?php echo htmlentities($result->status); ?>" comment_id="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->status); ?></a>
                                                                <?php
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-outline-danger btn-sm delete_comment" comment_id="<?php echo htmlentities($result->id); ?>" title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php $cnt++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <!-- Table for Category -->
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Approved Comments</h4>
                                        </p>

                                        <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>UserName</th>
                                                    <th>Comment</th>
                                                    <th>Post</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $status = 'Active';
                                                $sql = "SELECT *, DATE_FORMAT(created_at, '%M %d, %Y') as created_at FROM comments WHERE status = :status";
                                                $stmt = $database->prepare($sql);
                                                $stmt->bindValue(":status", $status, PDO::PARAM_INT);
                                                $stmt->execute();
                                                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($data as $result) {
                                                ?>

                                                        <tr>
                                                            <td><b><?php echo htmlentities($cnt); ?></b></td>
                                                            <td><?php echo htmlentities(ucfirst($result->user_id)); ?></td>
                                                            <td><?php echo htmlentities($result->comment); ?></td>
                                                            <td><?php echo htmlentities(ucfirst($result->post_id)); ?></td>
                                                            <td>
                                                                <?php
                                                                if ($result->status == 'Active') {
                                                                ?>
                                                                    <a class="btn btn-outline-danger btn-sm comment_inactive" status="<?php echo htmlentities($result->status); ?>" comment_id="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->status); ?></a>
                                                                <?php
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-outline-danger btn-sm delete_comment" comment_id="<?php echo htmlentities($result->id); ?>" title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php $cnt++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php include "common/footer.php"; ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- toastr plugin -->
        <script src="assets/libs/toastr/build/toastr.min.js"></script>

        <!-- toastr init -->
        <script src="assets/js/pages/toastr.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="action.js"></script>

    </body>

    </html>

<?php } ?>