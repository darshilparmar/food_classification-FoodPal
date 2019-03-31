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

$ch = curl_init();

   //Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:5000/getname');

   //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

   //Execute the request.
$data = curl_exec($ch);

   //Close the cURL handle.
curl_close($ch);
/*echo $data;*/
$myArray = explode(',', $data);





// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT * FROM nutrition WHERE Shrt_Desc LIKE '%$myArray[0]%' LIMIT 1";


$retval = mysqli_query($conn,$sql);

if(! $retval ) {
	die('Could not get data: ' . mysql_error());
}


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);



?>






<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>FoodPal</title>
	<link rel="icon" href="img/title-logo.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>
	<?php 
	include ('nav.php');
	?>
	<div class="row" style="font-family: 'Fjalla One', sans-serif;height: 50px;background-color: #e62739;padding: 15px;color: white;">
		<div class="col l12 s12 m12">
			<center>FOOD INFO</center>	
		</div>
	</div>
	<br/><br/><br/>
	<div class="row">
		<div class="col s12 l12">
			<center><img src="python/images/xyz.jpg" style="height: 400px;width: 90%;border: 1px dashed grey 90%;"></center>

		</div>
		<div class="col s12 l6 ">
			<table>
				<tbody>
					<tr>
						<th style="text-align: right;padding-right: 0px !important;font-family: 'Fjalla One', sans-serif;height: auto;background-color: #e62739;color: white;">
							FOOD INFO & &nbsp;	 
						</th>
						<th style="padding-left: 0px !important;font-family: 'Fjalla One', sans-serif;height: auto;background-color: #e62739;color: white;">
							NUTRITIONAL FACTS
						</th>
					</tr>
					<tr style="padding: 0px;">
						<th style="padding: 5px;"> Name</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/diet.png" alt="Name"><?=$myArray[0]?></div></td>
					</tr>
					<tr>
						<th style="padding: 5px;"> Protein</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/protein.png" alt="Name"><?=$row['Protein']?></div></td>
					</tr>
					<tr>
						<th style="padding: 5px;"> Carbohydrates</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/carbohydrates.png" alt="Name"><?=$row['Carbohydrt']?></div></td>
					</tr>
					<tr>
						<th style="padding: 5px;"> Fats</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/fat.png" alt="Name"><?=$row['Lipid_Tot']?></div></td>
					</tr>
					<tr>
						<th style="padding: 5px;"> Sugar</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/candy.png" alt="Name"><?=$row['Sugar_Tot']?></div></td>
					</tr>
					<tr>
						<th style="padding: 5px;"> Fiber</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/fiber.png" alt="Name"><?=$row['Lipid_Tot']?></div></td>
					</tr>
					<tr>
						<th style="padding: 5px;"> Calories (Kcal)</th>
						<td style="padding: 5px;"> <div class="chip"><img src="img/calories.png" alt="Name"><?=$row['Energ_Kcal']?></div></td>
					</tr>


				</tbody>
			</table>
			<hr/>
			<div style="font-size: 1.5rem;font-family: 'Fjalla One', sans-serif;height: auto;background-color: #e62739;padding: 15px;color: white;text-align: center; ">
				SUB-CATEGORIES
			</div>
			<br/>
			<div>
				<center><div class="chip"><img src="img/diet.png" alt="Name">
					<?=$myArray[1]?>
				</div> &nbsp;&nbsp;&nbsp;
				<div class="chip"><img src="img/diet.png" alt="Name">
					<?=$myArray[2]?>
				</div>&nbsp;&nbsp;&nbsp;
				<div class="chip"><img src="img/diet.png" alt="Name">
					<?=$myArray[3]?>
				</div></center>
			</div>
			
			
		</div>
	</div>
	<div class="row">
		<div class="col s12 l12" style="padding-top: 40px;">
			<center>
				<a href="php/addcaldb.php?name=<?=$myArray[0]?>&Energ_Kcal=<?=$row['Energ_Kcal']?>&Protein=<?=$row['Protein']?>&Carbohydrt=<?=$row['Carbohydrt']?>&Fiber_TD=<?=$row['Fiber_TD']?>&Lipid_Tot=<?=$row['Lipid_Tot']?>" class="btn waves-effect waves-light " style="background-color: #e62739;width: 150px;" >Add to diet</a>
			</center>
		</div>
		<br/><br/>
		<div class="col s12 l12">
			<center><a class="btn waves-effect waves-light"><i class="material-icons">thumb_down</i> Classify it as a new food?</a></center>
		</div>
		
	</div>
	<script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('.chips').chips();
		});
	</script>
</body>
</html>
