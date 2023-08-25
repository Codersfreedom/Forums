<?php
require 'partials/dbconnect.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  <title>Tech Forums</title>
</head>

<body>
  <?php include "partials/_header.php"; ?>


<div class="container">
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = $_GET['catid'];
$title = $_POST['disTitle'];
$des = $_POST['disDesc'];
$userid = $_SESSION['user'];
$sql1 = "SELECT `sno` from `user` WHERE `username` = '$userid'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$sno = $row1['sno'];
 $sql = "INSERT INTO `thread`( `thread_title`, `thread_des`, `thread_cat`,`user_id`) VALUES ('$title','$des','$id','$sno')";
 $result = mysqli_query($conn,$sql);
 if($result){

 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>Post added!</strong> You have successfully added your post.
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>';
 }
 else{
  echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed to post!</strong> Type something in description.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
 }




}
?>
<?php
$id = $_GET['catid'];

$sql = "SELECT * FROM `forum` WHERE `cat_id` = $id";
$result = mysqli_query($conn, $sql);



while ($row = mysqli_fetch_assoc($result)) {
 
  $category_name = $row['cat_name'];
  $category_desc = $row['cat_des'];
  

  echo '
  <div class="jumbotron my-4">
  <h1 class="display-4">' .$category_name. '</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p>' .$category_desc. '</p>
  <p class="lead">
    <b>Posted by- </b>
  </p>
</div>';

}
?>



<!-- Displaying threads -->
<?php


$empty = true;
$sql = "SELECT * FROM `thread` WHERE `thread_cat` = $id";
$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)) {
  $empty = false;
  $thread_title = $row['thread_title'];
  $thread_desc = $row['thread_des'];
  $thread_id = $row['thread_id'];
  $thread_user_id = $row['user_id']; 
  $sql2 = "SELECT `neckname` FROM `user` WHERE `sno` = '$thread_user_id'";
  $result2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $user = $row2['neckname'];
  

  echo '<div class="container">
<div class="media my-4">

  <img class="mr-3" width="35px"  src="img/userimg.png" alt="Generic placeholder image">

  <div class="media-body">
    <p>' .$user. '</p>
    <a class="text-dark" href="thread.php?id=' .$thread_id. '"><h5 class="mt-0">' .$thread_title. '</h5></a>
   ' .$thread_desc. '
  </div>
</div> </div>';
}
?>
<?php
if($empty){


  echo '<div class="jumbotron jumbotron-fluid my-3 rounded">
  <div class="container ">
    <h1 class="display-4">No Question Found</h1>
    <p class="lead">Be the first one to start a discussion.</p>
  </div>
</div>';
}
?>


 <?php 
 if(isset($_SESSION['logedin'])){

  echo'
  <div class="container rounded pb-5">
  <form action="threadlist.php?catid='. $id. '" method="post">
  <div class="form-group">
    <label for="disTitle">Discussion Title</label>
    <input type="text" class="form-control" id="disTitle" name="disTitle" aria-describedby="emailHelp" placeholder="Enter your question">
    <small id="emailHelp" class="form-text text-muted">Make the title as short as possible.</small>
  </div>
  <div class="form-group">
    <label for="disDesc">Description</label>
    <textarea class="form-control" id="disDesc" name="disDesc" rows="3"></textarea>
    
  </div>
<button type="submit" class="btn btn-success">Add Question</button>

  </form>
</div>';

 }
 
else{

  echo ' <div class="container ">
  <div class="jumbotron jumbotron-fluid my-3 rounded">
  <div class="container ">
    <h1 class="display-4">You are not logged in</h1>
    <p class="lead">Signup to start a discuss.</p>
  </div>
</div>
</div>';

}

?>









  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>




</html>