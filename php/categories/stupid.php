<?php include '../connection.php';?>
<?php session_start();?>

<?php 
   
    $number = (int) $_GET['n'];
    $query =  "SELECT * from question 
    LEFT JOIN categorie ON question.Categorie_idCategorie = categorie.idCategorie
    where categorie.code = 'stupid' and question.idQuestion = $number";
    $res = $con->query($query) or die($con->error.__LINE__);
    $question = $res->fetch_assoc();
    
    $questionID = $question['idQuestion'];
    // var_dump($questionID);

    $query2 =  "SELECT * from reponses where Question_idQuestion = $questionID";
    $choix = $con->query($query2) or die($con->error.__LINE__);
    // $question = $res->fetch_assoc();
    // var_dump($question);
    
    $total = $_SESSION['total'];
    $j = $_SESSION['j'];
    $_SESSION['j'] = $j+1;
    $score = $_SESSION['score'];

?>
<!DOCTYPE html>
<html>
    <head>

        <title>QUIZ-Me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../css/style_me.css">
        <link rel="stylesheet" href="../../css/clock.css">

    </head>

<body>
    <canvas  style="display:none"></canvas>
    <div class="container">
    <div class="current">Question <?php echo $_SESSION['j']; ?> of <?php echo $total; ?></div>
        <p class="ques"><?php echo $question['description'];?></p>
        <form method="POST" action="proc.php">
            <ul class="choix">
                <?php while($row = $choix->fetch_assoc()):?>
                    <li><input name="choice" type="radio" value="<?php echo $row['idReponses'];?>" /><?php echo $row['descriptions'];?></li>
                <?php endwhile;?>
            </ul>
            <input type="submit" value="submit" />
        
            
        </form>
    </div>


    <div class="main-container righty">
        <!-- indecator -->
        <div class="circle-container center">
            <div class="semicircle"></div>
            <div class="semicircle"></div>
            <div class="semicircle"></div>
            <div class="outercircle"></div>
        </div>
        <!-- timer -->
        <div class="timer-container right">
            <div class="timer right"></div>
        </div>

    </div>






    <script src="../../js/script.js"></script>    

    <script src="../../js/myscript.js"></script>    
    
    


</body>
</html>

