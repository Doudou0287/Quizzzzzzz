<?php

require_once('../connection.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>QUIZ-Me</title>

  <!-- <title>Form-Me</title> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../css/drops.css">

  <!-- <link rel="stylesheet" type="text/css" href="../../css/newCartes.css"> -->
</head>
<body>

<canvas  style="display:none"></canvas>

<div class="container">
  <form action="traitement.php?creation" method="post">
  <h1 class="title">Insert Questions</h1> 

    <label for="category">Choose a category:</label>
    <select id="category" name="category">
      <option value="h">Histoire</option>
      <option value="s">Sport</option>
      <option value="n">Sciences_Nature</option>
      <option value="c">Art_Culture</option>
      <option value="g">Géographie</option>
    </select><br>
    

    
    <br><br>
    <label for="question">Question</label><br>
    <input type="text" id="question" name="question" ><br><br>
    <label for="choix">Answers</label><br>
    <input type="text" id="achoix" name="a"><br><br>
    <input type="text" id="bchoix" name="b" ><br><br>
    <input type="text" id="cchoix" name="c"><br><br>
    <input type="text" id="dchoix" name="d"><br><br>
    
    <p>Choose the right answer</p>

        <input type="radio" id="a" name="right_answer" value="a">
        <label for="a">A</label><br>
        <input type="radio" id="b" name="right_answer" value="b">
        <label for="b">B</label><br>
        <input type="radio" id="c" name="right_answer" value="c">
        <label for="c">C</label><br>
        <input type="radio" id="d" name="right_answer" value="d">
        <label for="d">D</label><br>
        <br><br>
    <input type="submit" value="Submit">
  </form> 
  <?php
    include("../drops.php");
  ?>
</div>


<script src="../../js/myscript.js"></script>    

</body>
</html>