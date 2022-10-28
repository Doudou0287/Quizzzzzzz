<?php include '../connection.php';?>
<?php session_start();
    
    // $i = 0;
    // $_SESSION['score'] = 0;
    if($_POST){
        // echo "hi";
        $j = $_SESSION['j'];
        $numberStu = $_SESSION['numberStu'];
        $score = $_SESSION['score'];

        // var_dump($number);
        $selected_choice = $_POST['choice'];

        //  echo "question id is: " . $number[$i-1] . "   answer chosen is:   " . $selected_choice;
        // $i+1;
        $originalStu = $numberStu;
        $check = $originalStu[$j-1];
        $next = $numberStu[$j];
        // echo "<br/>i" . $i;
            // echo "<br/>next" . $next;
        //    var_dump($number[1]);
        $query = "SELECT * FROM reponses where Question_idQuestion = $check AND etat = 1";
        $result = $con->query($query) or die($mysqli->error.__LINE__);
        $row =$result->fetch_assoc();

        $correct = $row['idReponses'];
        $totalStupid = $_SESSION['totalStupid'];

        if($correct == $selected_choice){
            // $score++;
            $_SESSION['score'] = $_SESSION['score']+1;
        }
        echo "<br/>the id you selected is " . $selected_choice  . "<br/>the correct id is" .  $correct . "<br/>your score now is" . $_SESSION['score'];
        if($j==$totalStupid-1){
            // header("refresh:10; url=final.php");
            header("Location:final.php");
            exit();
        }
        else {
            // header("refresh:5; url=question.php?n=".$next);
            header("Location: stupid.php?n=".$next);
        }


    }
 ?>
