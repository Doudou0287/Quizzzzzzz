<?php

    $host = "localhost";
    $user = "root";
    $mdp = "";
    $db = "quiz-me";

    if(!$con = mysqli_connect($host,$user,$mdp,$db)){
        die("failed");
    }