<?php
include "auth/authorize.php";
include "classes/Database.php";
$database = new Database();
$database = $database->getConnection();

$login_session_duration = 1800;
$current_time = time();


if ($_SESSION['id'] == false) {
    header('location: ../index.html');
} else {
    if (($current_time - $_SESSION['last_acted_on'] > $login_session_duration)) {
        header('location: ../index.html');
    }
?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Socials | Blogry - Admin Dashboard</title>
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
                                    <h4 class="mb-sm-0">Socials</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Social Links</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Social Links</h4>
                                        <form method="POST">
                                            <div>
                                                <input type="hidden" id="user_id" value="<?php echo $_SESSION["id"] ?>">
                                                <div class="mb-4 pt-2">
                                                    <label for="name" class="form-label">Social Name:</label>
                                                    <select class="form-select" id="name">
                                                        <option value="">Select</option>
                                                        <option value="whatsapp">Whatsapp</option>
                                                        <option value="twitter">Twitter</option>
                                                        <option value="linkedin">Linkedin</option>
                                                        <option value="instagram">Instagram</option>
                                                        <option value="google-plus">Google-Plus</option>
                                                        <option value="facebook">Facebook</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="mb-4">
                                                    <label for="category" class="form-label">Link:</label>
                                                    <input class="form-control form-control-lg" type="text" id="social_link">
                                                </div>
                                                <div>
                                                    <button class="btn btn-outline-success" type="submit" id="social_submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <!-- Table for Category -->
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Links</h4>
                                        </p>

                                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Social Name</th>
                                                    <th>Link</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_id = $_SESSION['id'];
                                                $sql = "SELECT * FROM social_links WHERE user_id = :user_id";
                                                $stmt = $database->prepare($sql);
                                                $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
                                                $stmt->execute();
                                                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($data as $result) {
                                                ?>

                                                        <tr>
                                                            <td><b><?php echo htmlentities($cnt); ?></b></td>
                                                            <td><?php echo htmlentities(ucfirst($result->name)); ?></td>
                                                            <td><?php echo htmlentities($result->social_link); ?></td>
                                                            <td>
                                                                <a class="btn btn-primary waves-effect waves-light edit_link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?php echo htmlentities($result->id); ?>">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <a class="btn btn-outline-danger btn-sm delete_link" href="" link_id="<?php echo htmlentities($result->id); ?>" title="Delete">
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



                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Social Link </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" id="edit-form">
                                            <input type="hidden" id="link_id" name="id">
                                            <div class="modal-body">
                                                <div>
                                                    <div class="mb-4 pt-2">
                                                        <label for="name" class="form-label">Social Name:</label>
                                                        <select class="form-select" id="name_update" name="name">
                                                            <option value="">Select</option>
                                                            <option value="whatsapp">Whatsapp</option>
                                                            <option value="twitter">Twitter</option>
                                                            <option value="linkedin">Linkedin</option>
                                                            <option value="instagram">Instagram</option>
                                                            <option value="google-plus">Google-Plus</option>
                                                            <option value="facebook">Facebook</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="mb-4">
                                                        <label for="category" class="form-label">Link:</label>
                                                        <input class="form-control form-control-lg" type="text" id="social_links" name="social_link">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-outline-success waves-effect waves-light" type="submit" id="social_update">Update</button>
                                            </div>
                                        </form>
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