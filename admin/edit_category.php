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
        <title>Category | Blogry - Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                    <h4 class="mb-sm-0">Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                                            <li class="breadcrumb-item active">Edit Category</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <!-- Edit Category -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Category</h4>
                                        <br>
                                        <form class="needs-validation" method="POST">
                                            <?php
                                            $cat_id = intval($_GET['cat_id']);
                                            $sql = "SELECT * FROM category WHERE id = :cat_id";
                                            $query = $database->prepare($sql);
                                            $query->bindParam(':cat_id', $cat_id, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                            ?>
                                                    <div class="row">
                                                        <input type="hidden" name="id" id="cat_id" value="<?php echo $cat_id ?>">
                                                        <div class="col-md-10">
                                                            <div class="mb-4">
                                                                <label for="category" class="form-label">Category Name</label>
                                                                <input type="text" class="form-control" id="category_name" value="<?php echo $result->category_name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="float:right;">
                                                        <button class="btn btn-outline-success" type="submit" id="cat_edit">Update</button>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a class="btn btn-outline-secondary" href="category.php">Back</a>
                                                    </div>
                                            <?php }
                                            } ?>
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

        <!-- toastr plugin -->
        <script src="assets/libs/toastr/build/toastr.min.js"></script>

        <!-- toastr init -->
        <script src="assets/js/pages/toastr.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="action.js"></script>

    </body>

    </html>

<?php } ?>