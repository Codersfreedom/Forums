<?php
session_start();

echo '


<nav class=" sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Tech Forum</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Forums</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Topics
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
  </ul>';

if (isset($_SESSION['logedin'])) {
  echo '
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0 mr-2" name="signupbtn" type="submit">Search</button>
  <p class="text-light my-2 mx-2">Welcome ' .$_SESSION['user']. ' </p>
<button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="button" name ="logoutbtn"class="btn btn-primary" data-toggle="modal" data-target="#logoutbtn">
  <a href="partials/logout.php" class="text-decoration-none text-light">Logout</a>
</button>

</form>
</div>
</nav>';

} else {
  echo '
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-success my-2 my-sm-0 mr-2" name="signupbtn" type="submit">Search</button>
<button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="button" name ="signupbtn"class="btn btn-primary" data-toggle="modal" data-target="#signupbtn">
Signup
</button>
<button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="button" name ="signinbtn"class="btn btn-primary" data-toggle="modal" data-target="#loginbtn">
Login
</button>

  </form>

  
</div>
</nav>';
}

include 'partials/signup.php';
include 'partials/signin.php';

if (isset($_GET['success']) == 'true') {

  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Successfully Registered!</strong> You have been registered.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
} else if (isset($_GET['Loginsuccess'])) {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Login Succcessfull!</strong> You are loged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
} else if (isset($_GET['error'])) {
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Login Failed!</strong> Invalid Credentials.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';


}

?>