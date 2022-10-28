<?php 
session_start();
include("../connection.php");
include("../functions.php");
$err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $code = $_POST['code'];
    // $password = $_POST['password'];
    // $email = $_POST['email'];


    if(!empty($code) ){ 

        //read
        $query1 = "SELECT * from categorie where code = '$code' limit 1" ;
        // $query2 = "SELECT * from users where email = '$username' limit 1" ;
        $result1 =  mysqli_query($con,$query1);
        // $result2 =  mysqli_query($con,$query2);
        // var_dump($result2);
        if($result1 && mysqli_num_rows($result1) > 0){
            //  
            $questions =  "SELECT * from question 
            LEFT JOIN reponses ON reponses.Question_idQuestion = question.idQuestion
            LEFT JOIN categorie ON question.Categorie_idCategorie = categorie.idCategorie
            where categorie.code = '$code'";
            $resultFin =  mysqli_query($con,$questions);
            if($resultFin){
                $cat_question = mysqli_fetch_all($resultFin,MYSQLI_BOTH);
                var_dump($cat_question);
                die;
            } 
            var_dump('hi');
            die;

            
            // header("Location: cat_friends.php");
            // die;
            
        }
        $err = "wrong code, category does not exist";
        
    }   
    
    else{
        $err = "please enter valid information";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Friends</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>

<body>
    <canvas  style="display:none"></canvas>

    <div class="container">
        <form method="POST">
            <p><span>Enter a friend's Category</span> </p>
            <!-- <p> </p> -->
            <input type="code" id="code" name="code" placeholder="Enter code"><br>
            <p class="error"><?php echo $err ?></p>
            <input  type="submit" name="cat" value="Enter"><br>
            
        </form>
      
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div  onclick="history.back()" class="drop drop-4"> X </div>
        <div class="drop drop-5"></div>

    </div>
    <script src="../../js/myscript.js"></script>                
</body>
</html>