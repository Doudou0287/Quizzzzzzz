<?php
   session_start();
   include("connection.php");
   include("functions.php");
   
   $user_data = check_login($con);
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>QUIZ-Me</title>

        <!-- <title>Form-Me</title> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    </head>

<body>
    <canvas  style="display:none"></canvas>

    <h1 class="title"><?php echo $user_data['username']?> ^^ </h1> 
    <p class="desc">This is your Account</p>

    <!-- <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> -->
    <div class="center">
        <button id="btn1" class="open-button">            
            <a href="cartes.php" class="open-button1">Play</a> 
        </button>
    </div>
    <div class="center">
        <button class="btn1">
            <a href="cat.php" class="open-button1">Add Category</a> 
        </button>
        
    </div>
    <div class="center2">
        <button class="btn2">
            <a href="logout.php" class="open-button1">Logout</a>
        </button>
    </div>

    <script src="../js/myscript.js"></script>    


</body>
</html>