<?php
session_start();

if(!isset($_SESSION['myValue'])){
	header("location: index.php");
}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FoodPal</title>
	<link rel="icon" href="img/title-logo.png" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
	<?php 
	include ('nav.php');
	?>
	<div class="row" style="font-weight: bold;font-family: 'Fjalla One', sans-serif;height: 50px;background-color: #e62739;padding: 15px;color: white;">
		<div class="col l12 s12 m12">
			<center>UPLOAD IMAGE</center>	
		</div>
	</div>
	<div class="row">
		<form id="upload_form" action="php/image.php" method="post" enctype="multipart/form-data">
			<div class="col  offset-s3 s6">
				<div class="file-field input-field">
					<div class="btn" style="background-color: #e62739;font-weight: bold;font-family: 'Fjalla One', sans-serif;">
						<span>Upload Image</span>
						<i class="material-icons left">get_app</i><input type="file" name="uploadedimage" id="uploadedimage" style="background-color: #e62739;" >
					</div>
					<br/>
					<!--<div class="file-path-wrapper">
						<input class="file-path validate" type="text" style="color: black;">
					</div>-->
				</div>
			</div>			
			<div class="row">
				<div class="col s12" style="padding: 40px;">
					<img src="" id="uploadedimage-tag"  height="400" style="border: 1px dashed red; width: 100%;" />
				</div>
			</div>
			<div class="row">
				<div class="col offset-s4 s8">
					<input type="submit" class="btn" style="background-color: #e62739;font-weight: bold;font-family: 'Fjalla One', sans-serif;" name="submit" value="Submit">
				</div>
			</div>
		</form>
	</div>



	<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#uploadedimage-tag').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#uploadedimage").change(function(){
			readURL(this);
		});

	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });



	</script>


</body>
</html>