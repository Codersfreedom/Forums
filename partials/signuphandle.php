<?php

require 'dbconnect.php';
$signup = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['user'];
    $nickname =$_POST['username'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    

    // checking for duplicate username

    $existsql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $existresult = mysqli_query($conn, $existsql);
    $num = mysqli_num_rows($existresult);
    if ($num > 0) {
        $signup = "Duplicate Username";
        header("location: /forums/index.php?success=' .$signup. '");

    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`( `username`, `password`,`neckname`) VALUES ('$username','$hash','$nickname')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $signup = true;
                header("location: /forums/index.php?success=true");
                exit;
            }
        } else {
            $signup = "Password Doesn't match";
            header("location: /forums/index.php?success=' .$signup. '");
        }


        



    }
}


?>