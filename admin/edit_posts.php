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
        <title>Posts | Blogry - Admin Dashboard</title>
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
        <script src="https://cdn.tiny.cloud/1/96mnsk10pkg2eoqov5j9uvwckxdsvqkplraribk3dkypc1fi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    </head>

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Loader -->



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
                                    <h4 class="mb-sm-0">Posts</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Edit Post</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row" data-masonry='{"percentPosition": true }'>

                                    <!-- Edit Profile -->
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-body" style="padding-left: 50px;">
                                                <h4 class="card-title">Edit Posts</h4>
                                                <br>
                                                <form class="needs-validation" method="POST" enctype="multipart/form-data">
                                                    <?php
                                                    $post_id = intval($_GET['post_id']);
                                                    $sql = "SELECT a.title, a.main_image, a.slug, b.category_name, a.short_desc, a.uploaded_by, a.main_image, a.long_desc, b.id as category_id, b.category_name, c.id as user_id, c.name,
                                                            a.id as a_id, a.author, a.status as post_status, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at FROM posts a 
                                                            INNER JOIN category b ON a.cat_id = b.id
                                                            INNER JOIN users c ON a.uploaded_by = c.id
                                                            WHERE a.id = :post_id";
                                                    $stmt = $database->prepare($sql);
                                                    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
                                                    $stmt->execute();
                                                    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                    if ($stmt->rowCount() > 0) {
                                                        foreach ($data as $result) {
                                                    ?>
                                                            <input type="hidden" name="id" id="post_id" value="<?php echo $post_id ?>">
                                                            <input type="hidden" name="old_image" id="old_image" value="<?php echo $result->main_image; ?>">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Title:</label>
                                                                        <input type="text" class="form-control" id="title" value="<?php echo $result->title; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Slug:</label>
                                                                        <input type="text" class="form-control" id="slug" value="<?php echo $result->slug; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Short Description:</label>
                                                                        <input type="text" class="form-control" id="short_desc" value="<?php echo $result->short_desc; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Long Description:</label>
                                                                        <textarea rows="5" id="long_desc"><?php echo $result->long_desc; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Category:</label>
                                                                        <select class="form-select" id="cat_id">
                                                                            <option value="<?php echo htmlentities($result->category_id); ?>"><?php echo htmlentities($result->category_name); ?></option>
                                                                            <?php
                                                                            $status = "Active";
                                                                            $sql = "SELECT * FROM category WHERE status = :status";
                                                                            $query = $database->prepare($sql);
                                                                            $query->bindParam(':status', $status, PDO::PARAM_STR);
                                                                            $query->execute();
                                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                            if ($query->rowCount() > 0) {
                                                                                foreach ($results as $category) {
                                                                            ?>
                                                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Uploaded By:</label>
                                                                        <select class="form-select" id="uploaded_by">
                                                                            <option value="<?php echo htmlentities($result->user_id); ?>"><?php echo htmlentities($result->name); ?></option>
                                                                            <?php
                                                                            $id = $_SESSION["id"];
                                                                            $sql = "SELECT * FROM users WHERE id = :id";
                                                                            $query = $database->prepare($sql);
                                                                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                                                                            $query->execute();
                                                                            $result_1 = $query->fetchAll(PDO::FETCH_OBJ);
                                                                            if ($query->rowCount() > 0) {
                                                                                foreach ($result_1 as $users) {
                                                                            ?>
                                                                                    <option value="<?php echo $users->id; ?>"><?php echo $users->name; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="mb-4">
                                                                        <label for="category" class="form-label">Author:</label>
                                                                        <input type="text" class="form-control" id="author" value="<?php echo $result->author; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label for="category" class="form-label">Image:</label>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control" id="main_image" onchange="mainImage(this)">
                                                                    </div>
                                                                    <br>
                                                                    <img src="assets/images/post_images/<?php echo $result->main_image; ?>" id="mainThumb" width="40%" style="margin-bottom: 5px" />
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div style="float: right; padding-right:100px;">
                                                                <a class="btn btn-outline-warning" href="posts.php">Back</a>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <button class="btn btn-outline-success" type="submit" id="post_update">Update</button>
                                                            </div>
                                                    <?php
                                                        }
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
        <script>
            tinymce.init({
                selector: 'textarea#long_desc',
                setup: function(editor) {
                    editor.on('init change', function() {
                        editor.save();
                    });
                },
                plugins: 'image code preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons',
                toolbar: 'undo redo | link image | code | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile media anchor codesample | ltr rtl',
                image_title: true,
                images_upload_url: 'post_upload.php',
                automatic_uploads: true,
                image_advtab: true,
                skin: "oxide-dark",
                content_css: "dark",
                relative_urls: false,
                convert_urls: false,
                document_base_url: 'http://127.0.0.1/worldBlog/admin/assets/images/post_images/multi_post_image/',
                file_picker_types: 'image',
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function() {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
            });

            function mainImage(input) {
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