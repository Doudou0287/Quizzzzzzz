<?php 
include 'connection.php';
session_start();
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);


    $query = "SELECT * from question WHERE Categorie_idCategorie = 6";
    $res = $con->query($query) or die($con->error.__LINE__);
    $rowCount = mysqli_num_rows($res);
    
    $i=0;
    while($i < $rowCount) {
        $row = mysqli_fetch_array($res,MYSQLI_BOTH);
        $array[$i] = $row['idQuestion']; 
        $aa[$i] = intval($array[$i]);

        $i++;
    }
    shuffle($aa);
    $_SESSION['totalStupid'] = $res->num_rows;
    $_SESSION['score'] = 0;
    $_SESSION['j'] = 0;
    $totalStupid = $_SESSION['totalStupid'];
    $_SESSION['numberStu'] = $aa;
    $j = $_SESSION['j'];

    $numberStu = $_SESSION['numberStu'];
    // echo "random";
    // var_dump($numberStu) ;


   ////////////////////////////////////////////////////////////////////////
    
    $query = "SELECT * from question WHERE Categorie_idCategorie = 1";
    $res = $con->query($query) or die($con->error.__LINE__);
    $rowCount1 = mysqli_num_rows($res);
    
    $i=0;
    while($i < $rowCount1) {
        $row = mysqli_fetch_array($res,MYSQLI_BOTH);
        $array[$i] = $row['idQuestion']; 
        $his[$i] = intval($array[$i]);

        $i++;
    }
    shuffle($his);
    $_SESSION['totalHistory'] = $res->num_rows;
   
    $totalHistory = $_SESSION['totalHistory'];
    $_SESSION['numberHis'] =$his;
    $numberHis = $_SESSION['numberHis'];
    // echo "history";
    // var_dump($numberHis) ;

    ///////////////////////////////////////////////////////////////////////////

    $query = "SELECT * from question WHERE Categorie_idCategorie = 2";
    $res = $con->query($query) or die($con->error.__LINE__);
    $rowCount2 = mysqli_num_rows($res);

    $i=0;
    while($i < $rowCount2) {
        $row =  mysqli_fetch_array($res,MYSQLI_BOTH);
        $array[$i] = $row['idQuestion']; 
        $spo[$i] = intval($array[$i]);

        $i++;
    }
    shuffle($spo);

    $_SESSION['totalsport'] = $res->num_rows;

    $totalsport = $_SESSION['totalsport'];
    $_SESSION['numberspo'] = $spo;
    $numberspo = $_SESSION['numberspo'];
    // echo "sport";
    // var_dump($numberspo) ;

    ////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////

    $query = "SELECT * from question WHERE Categorie_idCategorie = 3";
    $res = $con->query($query) or die($con->error.__LINE__);
    $rowCount3 = mysqli_num_rows($res);

    $i=0;
    while($i < $rowCount3) {
        $row = mysqli_fetch_array($res,MYSQLI_BOTH);
        $array[$i] = $row['idQuestion']; 
        $sci[$i] = intval($array[$i]);

        $i++;
    }
    shuffle($sci);

    $_SESSION['totalscience'] = $res->num_rows;

    $totalscience = $_SESSION['totalscience'];
    $_SESSION['numbersci'] = $sci;
    $numbersci = $_SESSION['numbersci'];
    // // echo $i;
    // echo "science";
    // var_dump($numbersci) ;
    // // var_dump(array_rand($sci,$totalscience)) ;
    ////////////////////////////////////////////////////////////



    $query = "SELECT * from question WHERE Categorie_idCategorie = 4";
    $res = $con->query($query) or die($con->error.__LINE__);
    $rowCount4 = mysqli_num_rows($res);

    $i=0;
    while($i < $rowCount4) {
        $row = mysqli_fetch_array($res,MYSQLI_BOTH);
        $array[$i] = $row['idQuestion']; 
        $art[$i] = intval($array[$i]);
        // // echo $i;
        $i++;
        
    }
    shuffle($art);

    $_SESSION['totalart'] = $rowCount4;

    $totalart = $_SESSION['totalart'];
    $_SESSION['art'] = $art;
    $numberart = $_SESSION['art'];
    // echo "art";
    // var_dump($numberart) ;


?>

<!DOCTYPE html>
<html>
    <head>

        <title>QUIZ-Me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" type="text/css" href="../css/mystyle.css"> -->
        <link rel="stylesheet" type="text/css" href="../css/newCartes.css">
        <link rel="stylesheet" type="text/css" href="../css/newDrops.css">

    </head>

<body>
    <canvas  style="display:none"></canvas>
    <script src="../js/myscript.js"></script>

    <div class="container">
        <form action="">
            <h1><span>Flip a Card</span>   <span>to reveal Category</span> </h1>
            <div class="card-container">
                <div class="card-wrapper">
                    <div class="cards">
                        <div class="front">
                            <div class="categ">
                                <span class="btn">
                                    Friends
                                </span>
                            </div>
                        </div>
                        <div class="back" style="display: flex;">
                            
                            <a href="categories/friends.php" class="btn">
                                Enter Code
                            </a>
                        </div>
                    </div>
                </div>
               
                <div class="card-wrapper">
                    <div class="cards">
                        <div class="front">
                            <div class="categ">
                                <span class="btn">
                                    Random
                                </span>
                            </div>
                            
                        </div>
                        <div class="back">
                            <p></p>
                            <!-- <p> Test your Random knowledge </p>  -->
                            <p>   Number of Question : <?php echo $totalStupid; ?></p>
                            <p> Estimated time : <?php echo $totalStupid * .5; ?></p>
                            
                            <a href="categories/stupid.php?n=<?php echo $numberStu[$j];?>" class="btn">Start</a>
                        </div>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="cards">
                        <div class="front">
                            <div class="categ">
                                <span class="btn">
                                    History
                                </span>
                            </div>
                        </div>
                        <div class="back">
                            <p></p>
                            <!-- <p> Test your History knowledge </p>  -->
                            <p>   Number of Question : <?php echo $totalHistory; ?></p>
                            <p> Estimated time : <?php echo $totalHistory * .5; ?></p>
                            
                            <a href="../test/question.php?n=<?php echo $numberHis[$j];?>" class="btn">Start</a>
                        
                        </div>
                    </div>
                </div>

                <div class="card-wrapper">
                    <div class="cards">
                        <div class="front">
                            <div class="categ">
                                <span class="btn">
                                    Sport
                                </span>
                            </div>
                        </div>
                        <div class="back">
                            <p></p>
                            <!-- <p> Test your Sport knowledge </p>  -->
                            <p>   Number of Question : <?php echo $totalsport; ?></p>
                            <p> Estimated time : <?php echo $totalsport * .5; ?></p>
                            <a href="../test/question.php?n=<?php echo $numberspo[$j];?>" class="btn">Start</a>
                        
                        </div>
                    </div>
                </div>

                <div class="card-wrapper">
                    <div class="cards">
                        <div class="front">
                            <div class="categ">
                                <span class="btn">
                                    Science
                                </span>
                            </div> 
                        </div>
                        <div class="back">
                            <p></p>
                        <!-- <p> Test your Science knowledge </p>  -->
                            <p>   Number of Question : <?php echo $totalscience; ?></p>
                            <p> Estimated time : <?php echo $totalscience * .5; ?></p>
                            
                            <a href="../test/question.php?n=<?php echo $numbersci[$j];?>" class="btn">Start</a>
                        
                        </div>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="cards">
                        <div class="front">
                            <div class="categ">
                                <span class="btn">
                                    Art
                                </span>
                            </div>                     
                        </div>
                        <div class="back">
                            <p></p>
                            <p>   Number of Question : <?php echo $totalart; ?></p>
                            <p> Estimated time : <?php echo $totalart * .5; ?></p>
                            
                            <a href="test/question.php?n=<?php echo $numberart[$j];?>" class="btn">Start</a>
                        
                        </div>
                    </div>
                </div>

            </div>
        </form>
        
        <?php
            include("drops.php");
        ?>
    </div>   
</body>
</html>