<?php
require 'partials/dbconnect.php';


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Thread</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $com = $_POST['comment'];

        $userid = $_SESSION['user'];
$sql1 = "SELECT `sno` from `user` WHERE `username` = '$userid'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$sno = $row1['sno'];

        $sql = "INSERT INTO `comments`( `comment`, `thread_id`,`user_id`) VALUES ('$com','$id','$sno')";
        $result = mysqli_query($conn, $sql);
        if ($result) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>Post added!</strong> You have successfully added your post.
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>';
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed to post!</strong> Type something in description.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }




    }
    ?>
    <div class="container">
        <?php


// Displaying thread 
        
$sql = "SELECT * FROM `thread` WHERE `thread_id` = $id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
           
             $thread_title = $row['thread_title'];
  $thread_desc = $row['thread_des'];


            echo '<div class="jumbotron my-4">
  <h1 class="display-4"> ' .$thread_title. ' </h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p>' . $thread_desc . '</p>
  <p class="lead">
    <b>Posted by-</b>
  </p>
</div>';
        }

        ?>
        

<!-- Form to add comments -->




<!-- Displaying comments -->

    <?php
    
    $id = $_GET['id'];
        $empty = true;
    $sql = "SELECT * FROM `comments` WHERE `thread_id` = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $empty =false;
        $time = $row['Timestamp'];
        $comments = $row['comment'];
        $comment_user_id = $row['user_id']; 
        $sql2 = "SELECT `neckname` FROM `user` WHERE `sno` = '$comment_user_id'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        
        $user = $row2['neckname'];



        echo '
        <div class="container">
        <div class="media my-4">
        
          <img class="mr-3" width="35px"  src="img/userimg.png" alt="Generic placeholder image">
          
      
          <div class="media-body">
          <p>'. $user. ' at '. $time .'</p>
            <a href="thread.php?id=' .$id. '"><h5 class="mt-0"></h5></a>
           ' .$comments. '
          </div>
        </div> </div>';

    }
    ?>
    <!-- Show if no comments -->
    </div>
<div class="container">
        <?php
        if ($empty) {
            echo '<div class="jumbotron jumbotron-fluid my-3 rounded">
    <div class="container ">
      <h1 class="display-4">No Comments Yet</h1>
      <p class="lead">Be the first one to comment.</p>
    </div>
  </div>';

        }

        ?>
</div>

<?php

if(isset($_SESSION['logedin'])){



    echo '
<div class="container rounded pb-5">
  <form action="thread.php?id=' . $id . '" method="post">
  
  <div class="form-group">
    <label for="comment">Add Comments</label>
    <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
    
  </div>
<button type="submit" class="btn btn-success">Post Comment</button>

  </form>
</div>';
}

else{

  echo '
  <div class="container">
  <div class="jumbotron jumbotron-fluid my-3 pd-3 rounded">
  <div class="container ">
    <h1 class="display-4">You are not logged in</h1>
    <p class="lead">Signup to post your comment.</p>
  </div>
</div>
</div>';
}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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