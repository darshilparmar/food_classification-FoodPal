<?php
session_start();

if(!isset($_SESSION['myValue'])){
	header("location: index.php");

}
define('MYSQL_BOTH',MYSQLI_BOTH);
define('MYSQL_NUM',MYSQLI_NUM);
define('MYSQL_ASSOC',MYSQLI_ASSOC);
include("config.php");
$email = $_SESSION['myValue'];
	/*$food_name = "pizza";
	$calories = 100;
	$protien = 15;
	$carbs = 12;
	$fibre = 20;
	$fats = 110;*/
	$total_cal = 0;
	$curr_date = date("Y-m-d");
	include("config.php");
	/*$food_name = $_SESSION['food_name'];
	$calories = $_SESSION['calories'];
	$protien = $_SESSION['protien'];
	$carbs = $_SESSION['carbs'];
	$fibre = $_SESSION['fibre'];
	$fats = $_SESSION['fats'];
    include("config.php");
    */
    //if (isset($_POST['register'])) {
    /*	$time_now=mktime(date('h')+4,date('i')+30,date('s'));
    	$query = "INSERT INTO foodlog (email, time1, date1, food_name, calories, protien, carbs, fibre, fats) VALUES
    	('".$email."','".date('H:i:s', $time_now)."','".date("Y-m-d")."','".$food_name."','".$calories."','".$protien."', '".$carbs."', '".$fibre."', '".$fats."')";*/

    	
    	/*$query = "INSERT INTO foodlog (email, time1, date1, food_name, calories, protien, carbs, fibre, fats) VALUES
    	('".$email."','".date('H:i:s', $time_now)."',,'".date("Y-m-d")."','pizza','450','10','300','15','150'");*/

    	//fetch food items and calories


    	//fetch total calories
    	$sql = "SELECT * FROM foodlog WHERE email = '$email' and date1 = '$curr_date'";
    	$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
		    // output data of each row
    		while($row = $result->fetch_assoc()) {
    			$total_cal += $row['calories'];
    			/*echo "food: " . $row["food_name"]. " - Calories: " . $row["calories"]. " Protein" . $row["protien"]. " Carbs" . $row["carbs"]. " Fiber" . $row["fibre"]. " Fats" . $row["fats"]. "<br>";*/
    		}
    	} else {
    		echo "0 results";
    	}
    	
    	//fetch ideal calories
    	$displayProfile = "SELECT * from `user` WHERE `email` = '".$email."'";
    	/*echo "$displayProfile";*/

    	if(!$displayProfileCheck = mysqli_query($conn,$displayProfile)){

    		die("0");
    	}
    	$count = mysqli_num_rows($displayProfileCheck);

    	if($count == 0){


    		die("1");
    	}
    	$getProfile = mysqli_fetch_assoc($displayProfileCheck);

    	$ideal_cal = $getProfile['ideal_cal'];
    	$left_cal = $ideal_cal - $total_cal;

    	$ar = array($getProfile['ideal_weight'], $getProfile['weight'], $total_cal , $left_cal);


?>

<script type="text/javascript">
// pass PHP variable declared above to JavaScript variable
var ar = <?php echo json_encode($ar) ?>;
//alert (ar[0])
//alert (ar[1])
//alert (ar[2])
//alert (ar[3])
</script>

    	

    
    	
    	<!DOCTYPE html>
    	<html>
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

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.3/ui-bootstrap-tpls.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>


	<style type="text/css">
		.app-wrapper {
			margin: 10px 10px;
			border-radius: 3px;
			overflow: auto;
			padding: 0px 5px;
			.chartWrap {
				float: left;
				position: relative;
				width: 25%;
				background: white;
				height: 330px;
				border: 1px solid silver;
				margin: 0 4%;
				#photoUploadChart {
					height: 100%;
				}
				.highcharts-container {
					max-height: 300px;
				}
			}
		}
	</style>

    		<!--Let browser know website is optimized for mobile-->
    		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    	</head>
    	<body>
    		<?php
    		include("nav.php")
    		?>
	<!--<div class="fixed-action-btn">
		<a class="btn-floating btn-large red modal-trigger" href="#modal1">
			<i class="large material-icons" >mode_edit</i>
		</a>


		
		<div id="modal1" class="modal modal-fixed-footer">
			<div class="modal-content">
				<h4>Modal Header</h4>
				<p>A bunch of text</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		
	</div>-->
	<div class="row center-align" style="font-family: 'Fjalla One', sans-serif;height: 50px;width: 100%;background-color: #e62739;padding: 15px;color: white;">DAILY INTAKE</div>
	<div class="container">
		<table class="responsive-table">
			<thead>
				<tr>
					<th>Food Item</th>
					<th>Calories (Kcal)</th>
					<th>Protein</th>
					<th>Carbohydrates</th>
					<th>Fiber</th>
				</tr>
			</thead>
			<?php 
			$sql1 = "SELECT * FROM foodlog WHERE email = '$email' and date1 = '$curr_date'";
			$result1 = $conn->query($sql1);
			?>


			<tbody>
				<?php	while($row1 = $result1->fetch_assoc()) { ?>
					<tr>
						<td><?=$row1['food_name']?></td>
						<td><?=$row1['calories']?></td>
						<td><?=$row1['protien']?></td>
						<td><?=$row1['carbs']?></td>
						<td><?=$row1['fibre']?></td>

					</tr>
				<?php } ?>
			</tbody>
			
		</table>

		<br/>

		<div class="row " style="font-family: 'Fjalla One', sans-serif;font-weight:bold; height: auto;width: 100%;border: red dashed 1px;padding: 15px;color: white;">
			<div class="col s12" style="color: #424242;font-size: 1.5rem;">
				<i class="material-icons">arrow_upward</i>Total Calories Consumed: <?php echo "$total_cal" ?>

			</div>
			<br/><br/>	
			<div class="col s12" style="color: #76ff03;font-size: 1.5rem;">
				<i class="material-icons">arrow_right_alt</i>Goal Calorie Consumption: <?php echo "$ideal_cal" ?>
				<br/>
			</div>	
			<br/><br/>
			<div class="col s12" style="color: #d50000;font-size: 1.5rem;">
				<i class="material-icons">arrow_downward</i>Calories left to consume: <?php echo "$left_cal" ?>
				<br/>
			</div>	
		</div>

		<div ng-app="app">
				<div class="app-wrapper" ng-controller="ctrl">
					<div class="chartWrap">
						<div id="photoUploadChart"></div>
					</div>
				</div>
			</div>
			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

			<table id="datatable">
				<thead>
					<tr>
						<th></th>
						<th>Current Weight</th>
						<th>Ideal Weight</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Weight</th>
						<td>
							<?php 
							echo $getProfile['weight']; 
							?>
							</td>
						<td>
							<?php
						     echo $getProfile['ideal_weight'] 
						     ?>
						     	
						     </td>
					</tr>

				</tbody>
			</table>
		
	</div>




<script type="text/javascript">
var a = 10;
		var app = angular.module('app', ['ui.bootstrap'])
		app.controller('ctrl', function($scope, $timeout) {
	// On Feed CHART
	$(function() {
		// PHOTO CHART
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: 'photoUploadChart',
				type: 'pie'
			},
			title: {
				text: 'Calorie Goal Chart'
			},
			credits: {                                 
				enabled:  false                          
			},
			plotOptions: {
				pie: {
					dataLabels: {
						enabled: false
					},
					size: 200,
					innerSize: '50%',
					center: ['50%', '40%']
				}
			},
			series: [{
				data: [{
					name: 'Calories Consumed',
					color: 'rgba(155, 89, 182,1.0)',
					y: ar[2]
				}, {
					name: 'Calories Consumption Due',
					color: 'rgba(155, 89, 182, .5)',
					y: ar[3]
				}]
			}]
		},
			// using 
			function(chart) { // on complete
				var xpos = '50%';
				var ypos = '50%';
				var circleradius = 102;
				// Render the circle
				chart.renderer.circle(xpos, ypos, circleradius).attr({
					fill: '#ffffff',
				}).add();
			});
	});
});






		Highcharts.chart('container', {
			data: {
				table: 'datatable'
			},
			chart: {
				type: 'column'
			},
			yAxis: {
				allowDecimals: false,
				title: {
					text: 'Kilogram'
				}
			}
		});



	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.js"></script>

<?php 

$time_now=mktime(date('h')+3,date('i')+30,date('s'));

 $startTime = new DateTime(date('H:i:s', $time_now));
 $endTime = new DateTime('10:00:00 ');
 $endTime1= new DateTime('14:00:00 ');
 $endTime2 = new DateTime('18:00:00 ');
 $endTime3 = new DateTime('22:00:00 ');

$duration = $startTime->diff($endTime); 
$duration1 = $startTime->diff($endTime1); 
$duration2 = $startTime->diff($endTime2); 
$duration3 = $startTime->diff($endTime3); 
if($startTime->format("%H") < $endTime->format("%H") and  $startTime->format("%H") < $endTime1->format("%H") and $startTime->format("%H") < $endTime2->format("%H") and $startTime->format("%H") < $endTime3->format("%H")){
	echo "<script> $(document).ready(function(){
       Materialize.toast('You should have your breakfast at 10:00AM', 4000);
    }); </script>";

}elseif($startTime->format("%H") > $endTime->format("%H") and  $startTime->format("%H") < $endTime1->format("%H") and $startTime->format("%H") < $endTime2->format("%H")){
	echo "<script> $(document).ready(function(){
       Materialize.toast('You should have your lunch at 2:00PM', 4000);
    }); </script>";
}elseif($startTime->format("%H") > $endTime->format("%H") and  $startTime->format("%H") > $endTime1->format("%H") and $startTime->format("%H") < $endTime2->format("%H")){
	echo "<script> $(document).ready(function(){
       Materialize.toast('You should have your snacks at 6:00PM', 4000);
    }); </script>";

}elseif($startTime->format("%H") > $endTime->format("%H") and  $startTime->format("%H") > $endTime1->format("%H") and $startTime->format("%H") < $endTime2->format("%H")){
	echo "<script> $(document).ready(function(){
       Materialize.toast('You should have your dinner at 10:00PM', 4000);
    }); </script>";

}else{


	if($startTime->format("%H")=="%10"){
		echo "<script> $(document).ready(function(){
       Materialize.toast('Its breakfast time!', 10000);
    }); </script>";


	}elseif($startTime->format("%H")=="%14"){
		echo "<script> $(document).ready(function(){
       Materialize.toast('It's lunch time!!', 4000);
    }); </script>";


	}elseif($startTime->format("%H")=="%18"){
		echo "<script> $(document).ready(function(){
       Materialize.toast('It's snacks time!!', 4000);
    }); </script>";


	}elseif($startTime->format("%H")=="%22"){
		echo "<script> $(document).ready(function(){
       Materialize.toast('It's dinner time!!', 4000);
    }); </script>";


	}else{
		echo "<script> $(document).ready(function(){
       Materialize.toast('It's Sleep time!!', 4000);
    }); </script>";


	}
}

if($left_cal<0){
	echo "<script> $(document).ready(function(){
       Materialize.toast('You have been over your daily limit of calories!', 4000);
    }); </script>";
}


?>




	<!--<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.fixed-action-btn');
			var instances = M.FloatingActionButton.init(elems, {
				hoverEnabled: true
			});
		});
		$(document).ready(function(){
			$('.modal').modal();
		});

	</script>-->
</body>
</html>

