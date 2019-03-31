
<!-- grantaccess555 -->
<?php
session_start();

if(isset($_SESSION['myValue'])){
	header("location: upload.php");
}
error_reporting(E_ALL ^ E_NOTICE); 

include("config.php");
include("server.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
	$mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

	$sql = "SELECT id FROM login WHERE email = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

	if($count == 1) {
		echo "string";
         //session_register("myusername");
		$_SESSION['myValue'] = $myusername;

		header("location: upload.php");
	}else {
		$error = "Your Login Name or Password is invalid";
	}
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>FoodPal</title>
	<link rel="icon" href="img/title-logo.png" type="image/gif" sizes="16x16">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
	<link rel="stylesheet" href="css/style.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
	<?php 
	include ('nav.php');
	?>
	
	<div class=" white  hide-on-large-only">
		<ul class="tabs" style="background-color: #e62739;">
			<li class="tab col s3 l3"><a class="white-text active" href="#login">login</a></li>
			<li class="tab col s3 l3"><a class="white-text" href="#register">register</a></li>
		</ul>
		<div id="login" class="col s12 l3 m3">
			<form action = "" method = "post" class="col s12 l3 m3">
				<div class="form-container">
					<img src="img/logo.png" height="40"  style="display: block;margin-left: auto;margin-right: auto;width: 160px;" />
					<div class="row">
						
						
						<div class="input-field col s12">
							<i class="material-icons prefix">mail_outline</i>
							<input id="email" type="email" class="validate" name = "username">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input id="password" type="password" class="validate" name = "password">
							<label for="password">Password</label>
						</div>
					</div>
					<br>
					<center>
						<button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="login">Connect</button>
						<br>
						<br>
						<a href="" style="color: #e62739;">Forgotten password?</a>
					</center>
				</div>
			</form>
		</div>
		<div id="register" class="col s12 l3 m3">
			<form method="post" action="server.php" class="col s12 l3 m3">
				<?php include('errors.php'); ?>
				<div class="form-container">
					<img src="img/logo.png" height="40"  style="display: block;margin-left: auto;margin-right: auto;width: 160px;">
					<div class="row">
						<div class="input-field col s12 ">
							<input id="email" type="email" class="validate" name = "username">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate" name = "password">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password-confirm" type="password" class="validate" name="c_password">
							<label for="password-confirm">Password Confirmation</label>
						</div>
					</div>
					<center>
						<button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="register">Submit</button>
					</center>
				</div>
			</form>
		</div>
	</div>
	
	<div class="container white z-depth-2 show-on-large hide-on-med-and-down" style="width: 400px;min-height: 400px;">
		<ul class="tabs" style="background-color: #e62739;">
			<li class="tab col s3 l3"><a class="white-text active" href="#login1">login</a></li>
			<li class="tab col s3 l3"><a class="white-text" href="#register1">register</a></li>
		</ul>
		<div id="login1" class="col s12 l3 m3">
			<form action = "" method = "post" class="col s12 l3 m3">
				<div class="form-container">
					<img src="img/logo.png" height="40"  style="display: block;margin-left: auto;margin-right: auto;width: 160px;">
					<div class="row">
						
						
						<div class="input-field col s12">
							<i class="material-icons prefix">mail_outline</i>
							<input id="email" type="email" class="validate" name = "username">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input id="password" type="password" class="validate" name = "password">
							<label for="password">Password</label>
						</div>
					</div>
					<br>
					<center>
						<button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="login">Connect</button>
						<br>
						<br>
						<a href="" style="color: #e62739;">Forgotten password?</a>
					</center>
				</div>
			</form>
		</div>
		<div id="register1" class="col s12 l3 m3">
			<form method="post" action="server.php" class="col s12 l3 m3">
				<?php include('errors.php'); ?>
				<div class="form-container">
					<img src="img/logo.png" height="40"  style="display: block;margin-left: auto;margin-right: auto;width: 160px;">
					<div class="row">
						<div class="input-field col s12 ">
							<input id="email" type="email" class="validate" name = "username">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate" name = "password">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password-confirm" type="password" class="validate" name = "c_password">
							<label for="password-confirm">Password Confirmation</label>
						</div>
					</div>
					<center>
						<button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="register">Submit</button>
					</center>
				</div>
			</form>

		</div>
	</div>
	<script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>








</body>

</html>
