<?php
session_start();
include("connection.php");



$err = "";


if (isset($_POST['register'])){
    
    // if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(!empty($username) && !empty($password) && !empty($email) && !is_numeric($username) ){

    
        $query = "insert into users (username,email,password) values ('$username','$email','$password')";
        mysqli_query($con,$query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header("Location: account.php");
        // die;
    }
    else{
        $err =  "please enter valid information";
    }
    // }
}