<?php
session_start();

include("connection.php");

if(isset($_POST['pass_reset'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $token = md5(rand());
    $check_email = "SELECT email FROM users where email = '$email' LIMIT 1 ";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0){
        $row = mysqli_fetch_array($check_email_run);
        $get_user = $row['username'];
        $get_email = $row['email'];
        $update_token = "UPDATE users SET pass_reset = '$token' where email = '$get_email' limit 1";
        $update_token_run = mysqli_query($con, $update_token);
        
    }

}
?>