<?php

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
            <p><span>Reset Password</span> </p>
            <!-- <p> </p> -->
            <input type="email" id="email" name="email" placeholder="Email"><br>

            <input  type="submit" name="pass_reset" value="Enter"><br>
            <a href="Sign.php"> Not signed-up yet ? Sign up here.</a><br><br>
            
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