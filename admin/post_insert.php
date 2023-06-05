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



    $extension=pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    if (!in_array($extension, $allowed_extensions)) {
        echo "Invalid format. Only jpg / jpeg/ png /gif format allowed";
    } else {

        // $sourceProperties=getimagesize($file_tmp);
        // $newFileName=time();
        $dirPath="assets/images/post_images/";
        // $imageType=$sourceProperties[2];
 
        // $imgnewfile = md5($newFileName).".".$extension;
        $imgnewfile = md5($file_name).".".$extension;

        // switch ($imageType) {

        //     case IMAGETYPE_PNG:

        //         $imageSrc= imagecreatefrompng($file_tmp); 
        //         $tmp= imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
        //         imagepng($tmp,$dirPath.$imgnewfile);
        //         break;           

        //     case IMAGETYPE_JPEG:

        //         $imageSrc= imagecreatefromjpeg($file_tmp); 
        //         $tmp= imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
        //         imagejpeg($tmp,$dirPath.$imgnewfile);
        //         break;

        //     case IMAGETYPE_GIF:

        //         $imageSrc= imagecreatefromgif($file_tmp); 
        //         $tmp= imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
        //         imagegif($tmp,$dirPath.$imgnewfile);
        //         break;

        //     default:
        //         echo"Invalid Image type.";
        //         exit;
        //         break;
        // }

        $log->logActivity($username, $username . ' - Post was Inserted');

        $result = $post->create_posts($title, $slug, $short_desc, $long_desc, $author, $imgnewfile, $cat_id, $uploaded_by);

        if ($result) {
            echo "Post Inserted Successfully";
        } else {
            echo "Error Inserting Post";
        }
    }
}

// function imageResize($imageSrc,$imageWidth,$imageHeight) {

//     $newImageWidth = 1920;
//     $newImageHeight = 720;
//     $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
//     imagecopyresampled($newImageLayer,$imageSrc,0, 0, 0, 0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
//     return$newImageLayer;
// }

?>

