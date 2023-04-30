<?php
session_start();
include 'classes/Database.php';
include 'classes/Post.php';
include 'classes/Log.php';


$database = new Database();
$post = new Post($database);
$log = new Log($database);

$title = $_POST['title'];
$slug = $_POST['slug'];
$short_desc = $_POST['short_desc'];
$long_desc = $_POST['long_desc'];
$cat_id = $_POST['cat_id'];
$uploaded_by = $_POST['uploaded_by'];
$author = $_POST['author'];
$username = $_SESSION['username'];


if (isset($_FILES['main_image'])) {

    $file_name = $_FILES['main_image']['name'];
    $file_size = $_FILES['main_image']['size'];
    $file_tmp = $_FILES['main_image']['tmp_name'];
    $file_type = $_FILES['main_image']['type'];


    $extension = substr($file_name, strlen($file_name) - 4, strlen($file_name));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

    if (!in_array($extension, $allowed_extensions)) {
        echo "Invalid format. Only jpg / jpeg/ png /gif format allowed";
    } else {
        $imgnewfile = md5($file_name) . $extension;

        move_uploaded_file($file_tmp, "assets/images/post_images/" . $imgnewfile);

        $log->logActivity($username, $username . ' - Post was Inserted');

        $result = $post->create_posts($title, $slug, $short_desc, $long_desc, $author, $imgnewfile, $cat_id, $uploaded_by);

        if ($result) {
            echo "Post Inserted Successfully";
        } else {
            echo "Error Inserting Post";
        }
    }
}
