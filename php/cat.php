<?php



session_start();
require_once('connection.php');
include('functions.php');
   
$user_data = check_login($con);
$err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['nameCat'];

    
    if(!empty($name) && !is_numeric($name) ){ 

    //read bdd
        $query1 = "SELECT * from categorie where nom = '$name' limit 1" ;
        $result1 =  mysqli_query($con,$query1);
        var_dump($result1);
        var_dump(mysqli_num_rows($result1));
        if(mysqli_num_rows($result1) <= 0){
            $username = $user_data['username'];
            $id = $user_data['id'];
            $code = $name.$username;
            $query = "insert into categorie (code,nom,Joueur_idJoueur) values ('$code','$name','$id')";
            mysqli_query($con,$query);

            header("Location: questions.php");
            die;
        }
        else{
            $err = "this cat exist already, create a new one";
        }
    }   
    
    else{
        $err = "please enter valid information";
    }
}







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
            <p><span>Create Category</span> </p>
            <!-- <p> </p> -->
            <input type="nameCat" id="nameCat" name="nameCat" placeholder="Name of category"><br>
            <p class="error"><?php echo $err ?></p>
            <input  type="submit" name="cat" value="Enter"><br>
            <!-- <a href="Sign.php"> Not signed-up yet ? Sign up here.</a><br><br> -->
            
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