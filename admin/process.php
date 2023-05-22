<?php
session_start();
include 'classes/Database.php';
include 'classes/User.php';
include 'classes/Log.php';
include 'classes/Category.php';
include 'classes/Comment.php';
include 'classes/Post.php';
include 'classes/Image.php';
include 'classes/NewsLetter.php';

$database = new Database();
$user = new User($database);
$log = new Log($database);
$category = new Category($database);
$comment = new Comment($database);
$post = new Post($database);
$image = new Image($database);
$newsletter = new NewsLetter($database);

// users
function registerUser($username, $name, $email, $password)
{
  global $user;

  $myResp = $user->register($username, $name, $email, $password);
  return $myResp;
}

function loginUser($username, $password)
{
  global $user, $log;
  $log->logActivity($username, 'Successful Login');
  $myResp = $user->login($username, $password);
  return $myResp;
}


// check username
function checkUsername($username)
{
  global $user;

  $myResp = $user->usernameAvailable($username);
  return $myResp;
}


// changes password
function changePassword($username, $password, $oldpassword)
{
  global $log, $user;

  $log->logActivity($username, '- Password Changed Successful');
  $myResp = $user->changePassword($username, $password, $oldpassword);
  return $myResp;
}


// admin
function registerAdmin($username, $name, $email, $password)
{
  global $user;

  $myResp = $user->registerAdmin($username, $name, $email, $password);
  return $myResp;
}

function loginAdmin($username, $password)
{
  global $user, $log;
  $log->logActivity($username, 'Admin Successful Login');
  $myResp = $user->loginAdmin($username, $password);
  return $myResp;
}


// authors
function registerAuthor($username, $name, $email)
{
  global $user;

  $myResp = $user->registerAuthor($username, $name, $email);
  return $myResp;
}

function loginAuthor($username, $password)
{
  global $user, $log;
  $log->logActivity($username, 'Author Successful Login');
  $myResp = $user->loginAuthor($username, $password);
  return $myResp;
}

function deleteAuthor($id, $username)
{
  global $user, $log;
  $log->logActivity($username, 'Author Deleted Successfully');
  $myResp = $user->deleteAuthor($id);
  return $myResp;
}


// socails
function social_links($name, $social_link, $id)
{
  global $user;

  $myResp = $user->social_links($name, $social_link, $id);
  return $myResp;
}

function getLinks($id)
{
  global $user;

  $myResp = $user->getLinks($id);
  return $myResp;
}

function update_Links($name, $social_link, $id)
{
  global $user;

  $myResp = $user->update_Links($name, $social_link, $id);
  return $myResp;
}

function delete_link($id)
{
  global $user;

  $myResp = $user->delete_link($id);
  return $myResp;
}



// category
function createCategory($category_name, $username)
{
  global $category, $log;
  $log->logActivity($username, 'Category ' . $category_name . ' was Created');
  $myResp = $category->create_category($category_name);
  return $myResp;
}

function deleteCategory($id, $username)
{
  global $category, $log;
  $log->logActivity($username, 'Category with id ' . $id . ' was Deleted');
  $myResp = $category->delete_category($id);
  return $myResp;
}

function ActiveCategory($id, $username)
{
  global $category, $log;
  $log->logActivity($username, 'Category with id ' . $id . ' Status was changed to Active');
  $myResp = $category->active_category($id);
  return $myResp;
}

function InactiveCategory($id, $username)
{
  global $category, $log;
  $log->logActivity($username, 'Category with id ' . $id . ' Status was changed to Inactive');
  $myResp = $category->inactive_category($id);
  return $myResp;
}

function updateCategory($category_name, $id, $username)
{
  global $category, $log;
  $log->logActivity($username, 'Category with id ' . $id . ' was Updated');
  $myResp = $category->update_category($category_name, $id);
  return $myResp;
}


// comment
function deleteComment($id, $username)
{
  global $comment, $log;
  $log->logActivity($username, 'Comment with id ' . $id . ' was Deleted');
  $myResp = $comment->delete_comment($id);
  return $myResp;
}

function ApproveComment($id, $username)
{
  global $comment, $log;
  $log->logActivity($username, 'Comment with id ' . $id . ' Status was changed to Approved');
  $myResp = $comment->approve_comment($id);
  return $myResp;
}

function DisapproveComment($id, $username)
{
  global $comment, $log;
  $log->logActivity($username, 'Comment with id ' . $id . ' Status was changed to Disapproved');
  $myResp = $comment->disapprove_comment($id);
  return $myResp;
}



// posts
function deletePost($id, $username)
{
  global $post, $log;
  $log->logActivity($username, 'Post with id ' . $id . ' was Deleted');
  $myResp = $post->delete_posts($id);
  return $myResp;
}

function viewPost($id)
{
  global $post;
  $myResp = $post->get_views($id);
  return $myResp;
}

function InactivePost($id, $username)
{
  global $post, $log;
  $log->logActivity($username, 'Post with id ' . $id . ' Status was changed to Inactive');
  $myResp = $post->inactive_post($id);
  return $myResp;
}

function ActivePost($id, $username)
{
  global $post, $log;
  $log->logActivity($username, 'Category with id ' . $id . ' Status was changed to Active');
  $myResp = $post->active_post($id);
  return $myResp;
}

function addView($views, $id)
{
  global $post;
  $myResp = $post->add_views($views, $id);
  return $myResp;
}

function newsletter_subscription($email)
{
  global $newsletter, $log;
  $log->logActivity('Local User',  $email . ' subscribed to the Newsletter Posts');
  $myResp = $newsletter->add_email($email);
  return $myResp;
}

function delete_newsletter($id, $username)
{
  global $newsletter, $log;
  $log->logActivity($username,  $id . ' deleted from Newsletter List');
  $myResp = $newsletter->delete_email($id);
  return $myResp;
}

switch ($_POST['action']) {

    // users
  case "registerUser": {
      echo registerUser($_POST['username'], $_POST['name'], $_POST['email'], $_POST['password']);
      break;
    }

  case "loginUser": {
      echo loginUser($_POST['username'], $_POST['password']);
      break;
    }


    // admin
  case "registerAdmin": {
      echo registerAdmin($_POST['username'], $_POST['name'], $_POST['email'], $_POST['password']);
      break;
    }

  case "loginAdmin": {
      echo loginAdmin($_POST['username'], $_POST['password']);
      break;
    }


    // author
  case "registerAuthor": {
      echo registerAuthor($_POST['username'], $_POST['name'], $_POST['email']);
      break;
    }

  case "loginAuthor": {
      echo loginAuthor($_POST['username'], $_POST['password']);
      break;
    }

  case "deleteAuthor": {
      echo deleteAuthor($_POST['id'], $_SESSION['username']);
      break;
    }


    // general
  case "checkUsername": {
      echo checkUsername($_POST['username']);
      break;
    }

  case "changePassword": {
      echo changePassword($_POST['username'], $_POST['password'], $_POST['oldpassword']);
      break;
    }


    // socails
  case "social_links": {
      echo social_links($_POST['name'], $_POST['social_link'], $_POST['user_id']);
      break;
    }

  case "getLinks": {
      echo getLinks($_POST['id']);
      break;
    }

  case "delete_link": {
      echo delete_link($_POST['id']);
      break;
    }

  case "update_Links": {
      echo update_Links($_POST['name'], $_POST['social_link'], $_POST['id']);
      break;
    }


    // category
  case "createCategory": {
      echo createCategory($_POST['category_name'], $_SESSION['username']);
      break;
    }

  case "deleteCategory": {
      echo deleteCategory($_POST['id'], $_SESSION['username']);
      break;
    }

  case "ActiveCategory": {
      echo ActiveCategory($_POST['id'], $_SESSION['username']);
      break;
    }

  case "InactiveCategory": {
      echo InactiveCategory($_POST['id'], $_SESSION['username']);
      break;
    }


  case "updateCategory": {
      echo updateCategory($_POST['category_name'], $_POST['id'], $_SESSION['username']);
      break;
    }


    // comments
  case "deleteComment": {
      echo deleteComment($_POST['id'], $_SESSION['username']);
      break;
    }

  case "ApproveComment": {
      echo ApproveComment($_POST['id'], $_SESSION['username']);
      break;
    }

  case "DisapproveComment": {
      echo DisapproveComment($_POST['id'], $_SESSION['username']);
      break;
    }


    // posts
  case "deletePost": {
      echo deletePost($_POST['id'], $_SESSION['username']);
      break;
    }

  case "ActivePost": {
      echo ActivePost($_POST['id'], $_SESSION['username']);
      break;
    }

  case "InactivePost": {
      echo InactivePost($_POST['id'], $_SESSION['username']);
      break;
    }

  case "newsletter_subscription": {
      echo newsletter_subscription($_POST['email']);
      break;
    }

  case "delete_newsletter": {
      echo delete_newsletter($_POST['id'], $_SESSION['username']);
      break;
    }

  case "viewPost": {
      echo viewPost($_POST['id'],);
      break;
    }

  case "addView": {
      echo addView($_POST['views'], $_POST['id']);
      break;
    }
}
