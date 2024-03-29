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

  <title>Tech Forums</title>
</head>

<body>
  <?php include "partials/_header.php";  ?>


  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?programmer,codding" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?programming,android" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?tech,laptop" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<h1 class="text-center">Welcome to Tech Forums</h1>
  <div class="container d-flex flex-wrap justify-content-center align-content-center">
  
  
  
  <?php
    $sql = "SELECT * FROM `forum`";
    $result = mysqli_query($conn, $sql);

    
    while ($row = mysqli_fetch_assoc($result)) {
      $category_name = $row['cat_name'];
      $category_desc = $row['cat_des'];
      $category_id = $row['cat_id'];
      
      echo
      '<div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
 <img class="card-img-top" src="https://source.unsplash.com/286x180/?' . $category_name . ',coding" alt="Card image cap">
 <div class="card-body">
 <h5 class="card-title">' . $category_name . '</h5>
 <p class="card-text">' . substr($category_desc,0,100) . '...</p>
 <a href="threadlist.php?catid=' .$category_id. '" class="btn btn-primary">View More</a>
 </div>
 </div>
 </div>';

    }
    ?>
  
  </div>




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

  <?php include 'partials/_footer.php' ?>


</html>