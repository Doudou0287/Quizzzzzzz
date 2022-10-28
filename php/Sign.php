<?php
session_start();
include("connection.php");
include("functions.php");

$err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(!empty($username) && !empty($password) && !empty($email) && !is_numeric($username) ){

       
        $query = "insert into users (username,email,password) values ('$username','$email','$password')";
        mysqli_query($con,$query);
        $_SESSION['username'] = $username;
        // $_SESSION['success'] = "You are now logged in";
        header("Location: account.php");
        die;
    }
    else{
        $err =  "please enter valid information";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Quiz-Me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

<body>
    <canvas  style="display:none"></canvas>

    <div class="container">
        <form method="POST" id="registeration">
            <p><span>Sign up</span>   <span>to create your own category and your own questions</span> </p>
            <input type="username" id="username" name="username" placeholder="Username"><br>

            <input type="email" id="email" name="email" placeholder="Email"><br>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <p id="erreur1"></p>            
            <p class="error"><?php echo $err ?></p>

            <input id="register" name="register" type="submit" value="Sign-Up"><br>
            

            <a href="login.php"> Already signed-up ? connect here.</a><br><br>
        </form>
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div  onclick="history.back()" class="drop drop-4"> X </div>
        <div class="drop drop-5"></div>

        

    </div>
    <script src="../js/myscript.js"></script> 
    <script src="../js/err.js"></script>     
    
</body>
</html>