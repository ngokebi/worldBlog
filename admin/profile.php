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
        <title>Profile | Blogry - Admin Dashboard</title>
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
                                    <h4 class="mb-sm-0">Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">ProfIle</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row" data-masonry='{"percentPosition": true }'>

                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card">
                                        <?php
                                                    $admin_id = intval($_SESSION['id']);
                                                    $sql = "SELECT *, DATE_FORMAT(updated_at, '%M %d, %Y') as DateUpdated FROM users WHERE id = :admin_id";
                                                    $query = $database->prepare($sql);
                                                    $query->bindParam(':admin_id', $admin_id, PDO::PARAM_STR);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result_admin) {
                                                    ?>
                                            <img src="assets/images/users/<?php echo $result_admin->profile_image; ?>" class="card-img-top" alt="admin image">
                                            <div class="card-body">
                                                <h5 class="card-title" style="padding-bottom: 5px;">Name: <?php echo $result_admin->name; ?></h5>
                                                <p class="card-text">Email: <?php echo $result_admin->email; ?></p>
                                                <p class="card-text"><small class="text-muted">Last updated - <i><?php echo $result_admin->DateUpdated; ?></i></small></p>
                                            </div>
                                        </div>
                                        <?php }
                                                    } ?>
                                    </div>

                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                    <!-- Edit Profile -->
                                    <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-body" style="padding-left: 50px;">
                                                <h4 class="card-title">Edit Profile</h4>
                                                <br>
                                                <form class="needs-validation" method="POST" enctype="multipart/form-data">
                                                    <?php
                                                    $admin_id = intval($_SESSION['id']);
                                                    $sql = "SELECT * FROM users WHERE id = :admin_id";
                                                    $query = $database->prepare($sql);
                                                    $query->bindParam(':admin_id', $admin_id, PDO::PARAM_STR);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {
                                                    ?>
                                                            <div class="row">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $result->id;?>">
                                                                <input type="hidden" name="profile_image" id="old_image" value="<?php echo $result->profile_image;?>">
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Name:</label>
                                                                        <input type="text" class="form-control" id="name" value="<?php echo $result->name;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Email:</label>
                                                                        <input type="text" class="form-control" id="email" value="<?php echo $result->email;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Username:</label>
                                                                        <input type="text" class="form-control" id="username" value="<?php echo $result->username;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label for="category" class="form-label">Profile Picture:</label>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control" id="profile_image" onchange="mainthumbUrl(this)">
                                                                    </div>
                                                                    <br>
                                                                    <img src="assets/images/users/<?php echo $result->profile_image;?>" id="mainThumb" width="40%" style="margin-bottom: 5px" />
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div style="float: right; padding-right:100px;">
                                                                <button class="btn btn-outline-success" type="submit" id="profile_edit">Submit</button>
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->

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

        <script type="text/javascript">
            function mainthumbUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainThumb').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            };
        </script>

    </body>

    </html>

<?php } ?>