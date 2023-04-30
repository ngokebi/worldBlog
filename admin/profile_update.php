<?php
session_start();
include 'classes/Database.php';
include 'classes/User.php';
include 'classes/Log.php';


$database = new Database();
$user = new User($database);
$log = new Log($database);

$name = $_POST['name'];
$id = $_POST['id'];
$email = $_POST['email'];
$username = $_POST['username'];
$name = $_POST['name'];
$old_image = $_POST['old_image'];
$role = $_SESSION['role'];

// echo "<script>alert('$old_image')</script>";

if (isset($_FILES['profile_image'])) {

    $file_name = $_FILES['profile_image']['name'];
    $file_size = $_FILES['profile_image']['size'];
    $file_tmp = $_FILES['profile_image']['tmp_name'];
    $file_type = $_FILES['profile_image']['type'];


    $extension = substr($file_name, strlen($file_name) - 4, strlen($file_name));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

    if (!in_array($extension, $allowed_extensions)) {
        echo "Invalid format. Only jpg / jpeg/ png /gif format allowed";
    } else {

        if ($old_image != 'default-image.jpg') {
            unlink("assets/images/users/" . $old_image);
        }
        $imgnewfile = md5($file_name) . $extension;
        move_uploaded_file($file_tmp, "assets/images/users/" . $imgnewfile);

        $log->logActivity($username, $username . ' - Profile was Updated');
        $result = $user->update($name, $username, $email, $imgnewfile, $role, $id);
        if ($result) {
            echo "Profile Updated Successfully";
        } else {
            echo "Error Updating Profile";
        }
    }
}
