<?php

require_once('../connection.php');

$nom = $_POST['category'];

function functionname($sql1,$conn1){  
    $result = $conn1->query($sql1);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row["idCategorie"];
        }
    } else {
        echo "0 results";
    }
    return $id;
}  

if ($nom === 'h'){
    $sql = "SELECT idCategorie,nom FROM categorie WHERE nom='h'";
    $idCat = functionname($sql,$con);
}

else if ($nom === 's'){
    $sql = "SELECT idCategorie,nom FROM categorie WHERE nom='s'";
    $idCat = functionname($sql,$con);
}

else if ($nom === 'n'){
    $sql = "SELECT idCategorie,nom FROM categorie WHERE nom='n'";
    $idCat = functionname($sql,$con);
}  

else if ($nom === 'c'){
    $sql = "SELECT idCategorie,nom FROM categorie WHERE nom='c'";
    $idCat = functionname($sql,$con);
}  

else if ($nom === 'g'){
    $sql = "SELECT idCategorie,nom FROM categorie WHERE nom='g'";
    $idCat = functionname($sql,$con);
}  
else if ($nom === 'a'){
    $sql = "SELECT idCategorie,nom FROM categorie WHERE nom='a'";
    $idCat = functionname($sql,$con);
}  


if(isset($_GET['creation'])){
    $stmt = $con->prepare("INSERT INTO question (description, lang, Categorie_idCategorie) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $desc, $lang, $category);

    // set parameters and execute
    $desc = $_POST['question'];
    $lang = "fr";
    $category = $idCat;
    $stmt->execute();
    $dernierId = $stmt->insert_id;
    

    $etat = $_POST['right_answer'];
    $e  = true;
    // svar_dump($dernierId);
    $reponseA = $con->prepare('INSERT INTO reponses (description, etat, Question_idQuestion) VALUES (?, ?, ?)');
    $reponseA->bind_param("sss", $a, $e, $dernierId);
    $a = $_POST['a'];
 

    if ($etat == 'a'){
        $e  = true;
    }
    else $e  = false;
    $reponseA->execute();

    $reponseB = $con->prepare('INSERT INTO reponses (description, etat, Question_idQuestion) VALUES (?, ?, ?)');
    $reponseB->bind_param("sss", $b, $e, $dernierId);
    $b = $_POST['b'];
 

    if ($etat == 'b'){
        $e  = true;
    }
    else $e  = false;
    $reponseB->execute();

    
    $reponseC = $con->prepare('INSERT INTO reponses (description, etat, Question_idQuestion) VALUES (?, ?, ?)');
    $reponseC->bind_param("sss", $c, $e, $dernierId);
    $c = $_POST['c'];
 

    if ($etat == 'c'){
        $e  = true;
    }
    else $e  = false;
    $reponseC->execute();


   
    $reponseD = $con->prepare('INSERT INTO reponses (description, etat, Question_idQuestion) VALUES (?, ?, ?)');
    $reponseD->bind_param("sss", $d, $e, $dernierId);
    $d = $_POST['d'];
 

    if ($etat == 'd'){
        $e  = true;
    }
    else $e  = false;
    $reponseD->execute();

    echo "New question added successfully";
    $stmt->close();
    

}

$con->close();
header("Refresh:10; url=http://localhost/questions/cat/");

