<?php session_start();
$totalStupid = $_SESSION['totalStupid'];
$score = $_SESSION['score'];
$_SESSION['j'] = 0;
$j = $_SESSION['j'];
$numberStu = $_SESSION['numberStu'];
?>
<div class="container">
    <h1>done</h1>
    <h2>good job, or bad job, up to u, u got a <?php echo $score; ?> out of <?php echo $totalStupid; ?></h2>
    
    <a href="question.php?n=<?php echo $numberStu[$j];?>" class="start">take another</a>
</div>