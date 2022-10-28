<?php 
$query1 = "SELECT * from categorie where code = '$code' limit 1" ;
// $query2 = "SELECT * from users where email = '$username' limit 1" ;
$result1 =  mysqli_query($con,$query1);

$mysqli = new mysqli("localhost","root","","quiz-me");

if($result1 && mysqli_num_rows($result1) > 0){
    //  
    $questions =  "SELECT * from question LEFT JOIN categorie ON 
    question.Categorie_idCategorie = categorie.idCategorie where categorie.code = '$code'";
    $resultFin =  $mysqli -> query($questions);
    $resultFin -> fetch_all(MYSQLI_ASSOC);
    var_dump($resultFin);
    die;
    // if($resultFin){
    //     $cat_question = mysqli_fetch_assoc($resultFin);
    //     var_dump($cat_question);
    //     die;
    // } 

    
    // header("Location: cat_friends.php");
    // die;
    
}