<?php include 'connection.php';?>
<?php session_start();?>
<?php
    

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
    // while($i < $rowCount) {
    //     // $row = mysqli_fetch_array($res,MYSQLI_BOTH);
    //     $array[$i] = $row['idQuestion']; 
    //     $i++;
    // }
    // var_dump($aa);
    shuffle($aa);
    
    // print_r($ids);
    // echo "brrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr";
    // echo $rowCount ;
    // var_dump($aa);
    // function randomGen($min, $max, $quantity) {
    //     $numbers = range($min, $max);
    //     shuffle($numbers);
    //     return array_slice($numbers, 0, $quantity);
    //     // return $numbers;
    // }  

    // var_dump($ids);
    $_SESSION['total'] = $res->num_rows;
    $_SESSION['score'] = 0;
    $_SESSION['number'] = $aa;
    $_SESSION['i'] = 0;
    $total = $_SESSION['total'];
    $j = $_SESSION['i'];
    $number = $_SESSION['number'];

    // var_dump($number);
session_destroy();
?>

<div class="container">
    <h1>test your math knowledge</h1>
    <ul>
        <li><strong>Number of Question : </strong><?php echo $total; ?></li>
        <li><strong>Estimated time : </strong><?php echo $total * .5; ?></li>
    </ul>
    <?php var_dump($number);?>

    <?php echo "j" .$j;?>
    <?php echo $number[$j];?>
    <a href="question.php?n=<?php echo $number[$j];?>" class="start">start</a>
</div>