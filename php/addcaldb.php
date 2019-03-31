<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "foodcal";
ini_set('max_execution_time', 300); 
	session_start();
$email = $_SESSION['myValue'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$food_name = $_GET['name'];
$calories =  $_GET['Energ_Kcal'];
$protien =  $_GET['Protein'];
$carbs =  $_GET['Carbohydrt'];
$fibre =  $_GET['Fiber_TD'];
$fats =  $_GET['Lipid_Tot'];
echo $fats;
$time_now=mktime(date('h')+4,date('i')+30,date('s'));
$query = "INSERT INTO foodlog (email, time1, date1, food_name, calories, protien, carbs, fibre, fats) VALUES ('".$email."','".date('H:i:s', $time_now)."','".date("Y-m-d")."','".$food_name."','".$calories."','".$protien."', '".$carbs."', '".$fibre."', '".$fats."')";
$ins_res = mysqli_query($conn,$query);
    	if(!$ins_res){
    		echo "failed to insert";
    	}


header("location: ../dailyintake.php");

  ?>