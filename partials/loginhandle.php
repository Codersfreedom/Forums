<?php

require 'dbconnect.php';
$login = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['user'];
    $password = $_POST['pass'];
    
   

    // checking for duplicate username

    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $result = mysqli_query($conn,$sql);
if(!$login){
    while($row=mysqli_fetch_assoc($result)){
           
        if(password_verify($password,$row['password']))  {
            $login = true;
            session_start();
            $_SESSION['logedin']=true;
            $_SESSION['user'] = $username;
            $_SESSION['neckname'] = $row['neckname'];
            header('location: /forums/index.php?Loginsuccess=true');
            
        }
        else{
          
            header("location: /forums/index.php?error=true");
        }

    
        



    }
}
}

?>