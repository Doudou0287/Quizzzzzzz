<?php 
session_start();
include("connection.php");
include("functions.php");
$err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $email = $_POST['email'];


    if(!empty($username) && !empty($password) && !is_numeric($username) ){ 

        //read
        $query1 = "SELECT * from users where username = '$username' limit 1" ;
        $query2 = "SELECT * from users where email = '$username' limit 1" ;
        $result1 =  mysqli_query($con,$query1);
        $result2 =  mysqli_query($con,$query2);
        // var_dump($result2);
        if($result1 || $result2){
            if(($result1) && mysqli_num_rows($result1) > 0 ){
                $_SESSION['username'] = $username;
			    // $_SESSION['success'] = "$ln";
                $user_data = mysqli_fetch_assoc($result1);
                if($user_data['password'] === $password){
                    $_SESSION['id'] = $user_data['id'];
                     header("Location: account.php");
                     die;
                }
                $err = "pass no good";
            }
            else if(($result2) && mysqli_num_rows($result2) > 0 ){
                $user_data = mysqli_fetch_assoc($result2);
                if($user_data['password'] === $password){
                    $_SESSION['id'] = $user_data['id'];
                     header("Location: account.php");
                     die;
                }
                $err = "pass no good";
            }
        }
        $err = "username no good";
        
    }   
    
    else{
        $err = "please enter valid information";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>QUIZ-Me</title>

        <!-- <title>Form-Me</title> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

<body>
    <canvas  style="display:none"></canvas>

    <div class="container">
        <form method="POST">
            <p><span>Log in</span>   <span>to view your category</span> </p>
            <!-- <p> </p> -->
            <input id="username" name="username" type="text" placeholder="Username or email"><br>
            <input id="password" name="password" type="password" placeholder="Password"><br>
            <input  type="submit" value="Connexion"><br>
            <a href="Sign.php"> Not signed-up yet ? Sign up here.</a><br><br>
            <a href="reset.php"> Forgot Password ?</a>
            <p class="error"><?php echo $err ?></p>
        </form>
      
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div  onclick="history.back()" class="drop drop-4"> X </div>
        <div class="drop drop-5"></div>

    </div>

      <script src="../js/myscript.js"></script>     
</body>
</html>