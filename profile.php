<?php
session_start();

if(!isset($_SESSION['myValue'])){
		header("location: index.php");
	}
$email = $_SESSION['myValue'];
/*echo $email;*/


include "config.php";
$displayProfile = "SELECT * from `user` WHERE `email` = '".$email."'";

if(!$displayProfileCheck = mysqli_query($conn,$displayProfile)){

	die("0");
}
$count = mysqli_num_rows($displayProfileCheck);
if($count == 0){
	
  
  die("1");
 }
$getProfile = mysqli_fetch_assoc($displayProfileCheck);

//Exercise recommendation
if($getProfile['bmi'] < 15.0){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Jogging | Lunges And Squats | Bench Press | Deadlifts | Yoga | Pull-Ups | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']> 15.0 && $getProfile['bmi']< 15.5	){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Jogging | Lunges And Squats | Bench Press | Deadlifts | Yoga | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'15.5' && $getProfile['bmi']<'16.0'){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Jogging | Lunges And Squats | Bench Press | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'16.0' && $getProfile['bmi']<'16.5'){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Jogging | Lunges And Squats | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'16.5' && $getProfile['bmi']<'17.0'){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Jogging | Lunges And Squats | Bench Press | Deadlifts | Yoga | Pull-Ups | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'17.0' && $getProfile['bmi']<'17.5'){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Jogging | Lunges And Squats | Bench Press | Deadlifts | Yoga | Pull-Ups | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'17.0' && $getProfile['bmi']<'17.5'){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Lunges And Squats | Bench Press | Deadlifts | Yoga | Pull-Ups | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'17.5' && $getProfile['bmi']<'18.0'){
	$bmi15= "Push Ups | Low Intensity Aerobic Workout | Swimming | Jogging | Lunges And Squats | Yoga | Pull-Ups | Avoid Cardio to gain weight";
}
elseif($getProfile['bmi']>'18.0' && $getProfile['bmi']<'18.5'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'18.5' && $getProfile['bmi']<'19.0'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'19.0' && $getProfile['bmi']<'19.5'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'19.5' && $getProfile['bmi']<'20.0'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'20.0' && $getProfile['bmi']<'20.5'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'20.5' && $getProfile['bmi']<'21.0'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'21.0' && $getProfile['bmi']<'21.5'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'21.5' && $getProfile['bmi']<'22.0'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'22.0' && $getProfile['bmi']<'22.5'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'22.5' && $getProfile['bmi']<'23.0'){
	$bmi15= "<div style='font-weight: bold;font-size: 1.5rem;text-align: justify;'>Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.</div>";
}
elseif($getProfile['bmi']>'23.0' && $getProfile['bmi']<'23.5'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'23.5' && $getProfile['bmi']<'24.0'){
	$bmi15= "Based on your BMI you have low health risks and a good height to weight ratio. Keep it up! We suggest you to continue to stay healthy and on tracks follow light cardio activites like a 30 minute walk everyday, swimming, cycling, etc.";
}
elseif($getProfile['bmi']>'24.0' && $getProfile['bmi']<'24.5'){
	$bmi15= "Plank| Jumping Jacks | Skipping";
}
elseif($getProfile['bmi']>'24.5' && $getProfile['bmi']<'25.0'){
	$bmi15= "Hip Twists | Bridge | Plank | Jumping Jacks | Skipping";
}
elseif($getProfile['bmi']>'25.0' && $getProfile['bmi']<'25.5'){
	$bmi15= "Squat Jumps| Deadlifts | Bicycle Crunches | Triceps Dips | Plank| Jumping Jacks | Skipping";
}
elseif($getProfile['bmi']>'25.5' && $getProfile['bmi']<'30.0'){
	$bmi15= " Burpees | Knee High | Grinding | Kapalbhati | Overhead Press | Lunge | Jackknife Sit-ups | Plank| Jumping Jacks | Skipping";
}
elseif ($getProfile['bmi']>'30.0') {
	$bmi15= " Burpees | Knee High | Grinding | Kapalbhati | Overhead Press | Lunge | Jackknife Sit-ups | Plank| Jumping Jacks | Skipping";
}
else{
	$bmi15= "You are either too underweight or obess and need to contact a dietition or gym trainer Immediately!";
}


?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
    		<title>FoodPal</title>
    		<link rel="icon" href="img/title-logo.png" type="image/gif" sizes="16x16">
    		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    		<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    		<!-- Compiled and minified CSS -->
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    		<!-- Compiled and minified JavaScript -->
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    		<!--Let browser know website is optimized for mobile-->
    		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body style="background-color: white;">
	<?php 
		include ('nav.php');
	?>
	<br/>
	<div class="container">
		

		<div class="card">

<br/>
			<div class="row">
				<div class="col s9 offset-s2 l4 offset-l1">
					<img src="img/anonymous.png" style="width:200px;height:200px;border: 5px solid #e1e8f0; border-radius: 50%;text-align: center; display: block;
					margin-left: auto;
					margin-right: auto;
					">
					<br/>	
				</div>

				<div class="col s9 offset-s2 l6" style="font-family: 'Alfa Slab One', cursive;color: #658588;">
					<div class="row">
						<div class="col s12" style="font-size: 2rem;padding-bottom: 0px;">
							<?php echo $getProfile['name']; ?>
							<hr/ style="margin-bottom: 0px;">
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">mail_outline</i> Email: 
						</div>
						<div class="col s6">
							<?php echo $getProfile['email']; ?>
						</div>
					</div>
					<div class="row">
						
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">accessible_forward</i> Age:: 
						</div>
						<div class="col s6">
							<?php echo $getProfile['age'] .' years'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">wc</i>
							Gender:
						</div>
						<div class="col s6">
							<?php echo $getProfile['gender']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">vertical_split</i>
							Height:
						</div>
						<div class="col s6">
							<?php echo $getProfile['height']. ' cms'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">accessibility</i>
							Current Weight:
						</div>
						<div class="col s6">
							<?php echo $getProfile['weight']. ' kgs'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">directions_run</i>
							Daily Activity:
						</div>
						<div class="col s6">
							<?php echo $getProfile['daily_activity']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">local_hospital</i>
							Medical Conditions:
						</div>
						<div class="col s6">
							<?php echo $getProfile['medical_conditions']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">location_on</i>
							Location:
						</div>
						<div class="col s6">
							<?php echo $getProfile['location']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">transfer_within_a_station</i>
							BMI:
						</div>
						<div class="col s6">
							<?php echo round($getProfile['bmi'],2); ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">done_all</i>
							Goal Weight:
						</div>
						<div class="col s6">
							<?php echo round($getProfile['ideal_weight'],2).' kgs'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">done_all</i>
							Ideal Calories for Daily Intake:
						</div>
						<div class="col s6">
							<?php echo $getProfile['ideal_cal'].' kgs'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row center-align" style="height: auto;width: 100%;background-color: #e62739;padding: 15px;color: white;">
			<div style="font-size: 1rem;text-align: justify;">
				Based on your Height, Weight, Age and BMI your some recommended work-out routines to maintain a healthy lifestyle are:
			</div>
			<?php echo $bmi15 ?>
				
			</div>
			<div class="row">
			<div>
				<table class="centered" style="border: solid 1px black;">
					<thead style="border-bottom: solid 1px black;">
						<tr>
							<th>BMI</th>
							<th>CATEGORY</th>
							<th>Health Risk Based Solely On BMI</th>
							<th>Risk Adjusted for the Presence of Co-morbid Conditions and/or Risk Factors</th>
						</tr>
					</thead>

					<tbody>
						<tr style="background-color: #eeff41;">
							<td style="border-right:solid 1px black;">Below 18.5</td>
							<td style="border-right:solid 1px black;">Underweight</td>
							<td style="border-right:solid 1px black;" style="border-right:solid 1px grey;">Low</td>
							<td style="border-right:solid 1px black;">Moderate</td>
						</tr>
						<tr style="background-color: #76ff03;">
							<td style="border-right:solid 1px black;">18.5-24.9</td>
							<td style="border-right:solid 1px black;">Healthy Weight</td>
							<td style="border-right:solid 1px black;">Minimal</td>
							<td style="border-right:solid 1px black;">Low</td>
						</tr>
						<tr style="background-color: #ff8a80  ;">
							<td style="border-right:solid 1px black;">25-29.9</td>
							<td style="border-right:solid 1px black;">Overweight</td>
							<td style="border-right:solid 1px black;">Moderate</td>
							<td style="border-right:solid 1px black;">High</td>
						</tr>
						<tr style="background-color: #ff5252  ;">
							<td style="border-right:solid 1px black;">30-34.9</td>
							<td style="border-right:solid 1px black;">Obese</td>
							<td style="border-right:solid 1px black;">High</td>
							<td style="border-right:solid 1px black;">Very High</td>
						</tr>
						<tr style="background-color: #ff1744 ;">
							<td style="border-right:solid 1px black;">35-39.9</td>
							<td style="border-right:solid 1px black;">Very Obese</td>
							<td style="border-right:solid 1px black;">Very High</td>
							<td style="border-right:solid 1px black;">Extremely High</td>
						</tr>
						<tr style="background-color: #d50000 ;">
							<td style="border-right:solid 1px black;">40+</td>
							<td style="border-right:solid 1px black;">Morbid Obesity</td>
							<td style="border-right:solid 1px black;">Extremely High</td>
							<td style="border-right:solid 1px black;">Extremely High</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="">
				<p style="text-align: justify;">
					On the BMI table above, find your score and the health risk for which it is assessed. For example, a BMI score of 18.5 - 25 is associated with the lowest health risk based solely on BMI scores. If your score is 25 - 30, you are considered to be at increased risk for health problems that are negatively impacted by obesity, such as diabetes, heart disease, high cholesterol or hypertension. BMI above 30 places you at higher health risks. Exceptions to a high BMI score include competitive athletes and body builders, whose BMI is high due to increased muscle mass, and women who are pregnant or lactating. The BMI is also not intended for use in measuring growing children or frail, elderly individuals.
				</p>
				<hr/>
				<center><img src="img/bmichart.gif"></center>
				<hr/>
				<center><h4 style="font-weight: bold;">Why is BMI Important?</h4></center>
				<p>If your BMI is high, you may have an increased risk of developing certain diseases, including:</p>
				<ul style="list-style-type:circle !important;color: black;font-weight: bold;">
					<li><i class="material-icons">arrow_right</i>High blood pressure</li>
					<li><i class="material-icons">arrow_right</i>Heart disease</li>
					<li><i class="material-icons">arrow_right</i>High blood cholesterol</li>
					<li><i class="material-icons">arrow_right</i>Diabetes</li>
					<li><i class="material-icons">arrow_right</i>Stroke</li>
					<li><i class="material-icons">arrow_right</i>Certain types of cancer</li>
					<li><i class="material-icons">arrow_right</i>Arthritis</li>
					<li><i class="material-icons">arrow_right</i>Breathing problems</li>
				</ul>
				<hr/>
				<center><h4 style="color:#e62739;font-weight: bold;font-size: 1.4rem; ">Prevention of further weight gain is important and weight reduction is desirable.</h4></center>
				<hr/>
			</div>
		</div>
	</div>
	


	

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
</script>
</body>
</html>
