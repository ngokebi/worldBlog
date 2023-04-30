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
        <title>Category | Blogry - Admin Dashboard</title>
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
                                    <h4 class="mb-sm-0">Notification</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Notification</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <section id="cd-timeline" class="cd-container">
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-success">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->
        
                                                <div class="cd-timeline-content">
                                                    <h3>Timeline Event One</h3>
                                                    <p class="mb-0 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                                    <span class="cd-date">May 23</span>
                                                </div> <!-- cd-timeline-content -->
                                            </div> <!-- cd-timeline-block -->
        
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-danger">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->
        
                                                <div class="cd-timeline-content">
                                                    <h3>Timeline Event Two</h3>
                                                    <p class="m-b-20 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
                                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light m-t-5">See more detail</button>
        
                                                    <span class="cd-date">May 30</span>
                                                </div> <!-- cd-timeline-content -->
                                            </div> <!-- cd-timeline-block -->
        
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-info">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->
        
                                                <div class="cd-timeline-content">
                                                    <h3>Timeline Event Three</h3>
                                                    <p class="mb-0 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat ... <a href="#">Read more</a></p>
                                                    <span class="cd-date">Jun 05</span>
                                                </div> <!-- cd-timeline-content -->
                                            </div> <!-- cd-timeline-block -->
        
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-pink">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->
        
                                                <div class="cd-timeline-content">
                                                    <h3>Timeline Event Four</h3>
                                                    <p class="m-b-20 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                                    <img src="assets/images/small/img-1.jpg" alt="" class="rounded" style="width: 120px;">
                                                    <img src="assets/images/small/img-2.jpg" alt="" class="rounded" style="width: 120px;">
                                                    <span class="cd-date">Jun 14</span>
                                                </div> <!-- cd-timeline-content -->
                                            </div> <!-- cd-timeline-block -->
        
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-warning">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->
        
                                                <div class="cd-timeline-content">
                                                    <h3>Timeline Event Five</h3>
                                                    <p class="m-b-20 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">See more detail</button>
                                                    <span class="cd-date">Jun 18</span>
                                                </div> <!-- cd-timeline-content -->
                                            </div> <!-- cd-timeline-block -->
        
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-primary">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->
        
                                                <div class="cd-timeline-content">
                                                    <h3>Timeline Event End</h3>
                                                    <p class="mb-0 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
                                                    <span class="cd-date">Jun 30</span>
                                                </div> <!-- cd-timeline-content -->
                                            </div> <!-- cd-timeline-block -->
                                        </section> <!-- cd-timeline -->
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