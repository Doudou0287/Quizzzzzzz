
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$answerErr = "";
$answer = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["answer"])) {
    $answerErr = "answer is required";
  } else {
    $answer = test_input($_POST["answer"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 id = 'question'></h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="radio" name="answer" <?php if (isset($answer) && $answer=="a") echo "checked";?> value="a"><p id = 'an1'></p>
  <input type="radio" name="answer" <?php if (isset($answer) && $answer=="b") echo "checked";?> value="b"><p id = 'an2'></p>
  <input type="radio" name="answer" <?php if (isset($answer) && $answer=="c") echo "checked";?> value="c"><p id = 'an3'></p>
  <input type="radio" name="answer" <?php if (isset($answer) && $answer=="d") echo "checked";?> value="d"><p id = 'an4'></p> 
  <span class="error">* <?php echo $answerErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";

echo $answer;
?>


<script  src="js.js"></script>
</body>
</html>
