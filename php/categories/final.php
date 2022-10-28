<?php session_start();
$totalStupid = $_SESSION['totalStupid'];
$score = $_SESSION['score'];
$_SESSION['j'] = 0;
$j = $_SESSION['j'];
$numberStu = $_SESSION['numberStu'];
?>
<!DOCTYPE html>
<html>
    <head>

        <title>QUIZ-Me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../css/style_me.css">
    </head>

<body>
    <canvas  style="display:none"></canvas>
    <div class="container">
        <h1>done</h1>
        <h2>good job, or bad job, up to u, u got a <?php echo $score; ?> out of <?php echo $totalStupid; ?></h2>
        
        <a href="stupid.php?n=<?php echo $numberStu[$j];?>" class="start">take another</a>
    </div>
    <script src="../../js/myscript.js"></script>    
    
    


    </body>
    </html>
    
    