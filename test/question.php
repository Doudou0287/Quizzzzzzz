<?php include 'connection.php';?>
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
    $i = $_SESSION['i'];
    $_SESSION['i'] = $i+1;
    $score = $_SESSION['score'];

?>
<html>
<head>

<!-- Content Type Meta tag -->
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
        
<!--Responsive Viewport Meta tag-->
     <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        
        
<title>QUIZ-lette</title>

<!-- FONT -->
	<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="try.css">
</head>
<body>
<div class="container">
    <div class="current">Question <?php echo $_SESSION['i']; ?> of <?php echo $total; ?></div>
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
    <script src="script.js"></script>
</body>
</html>