<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "foodcal";
ini_set('max_execution_time', 300); 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

function GetImageExtension($imagetype)
{
 if(empty($imagetype)) return false;
 switch($imagetype)
 {
   case 'image/bmp': return '.bmp';
   case 'image/gif': return '.gif';
   case 'image/jpeg': return '.jpg';
   case 'image/png': return '.png';
   default: return false;
 }
}

if (!empty($_FILES["uploadedimage"]["name"])) {
  $file_name=$_FILES["uploadedimage"]["name"];
  $temp_name=$_FILES["uploadedimage"]["tmp_name"];
  $imgtype=$_FILES["uploadedimage"]["type"];
  $ext= GetImageExtension($imgtype);
  $imagename=date("d-m-Y")."-".time().$ext;
  $target_path2 = "C:/xampp/htdocs/foodpal/upload/".$imagename;
  $target_path = "C:\\xampp\\htdocs\\foodpal\\upload\\".$imagename;


  if(move_uploaded_file($temp_name, $target_path)) {

   $time_now=mktime(date('h')+4,date('i')+30,date('s'));

   $query_upload="INSERT into image_table (img_name,img_path,img_date,img_time) VALUES ('".$imagename."','".$target_path."','".date("Y-m-d")."','".date('H:i:s', $time_now)."')";
   /*  echo $query_upload;*/
   mysqli_query($conn,$query_upload) or die("error in $query_upload == ----> ".mysql_error()); 

   $ch = curl_init();

   //Set the URL that you want to GET by using the CURLOPT_URL option.
   curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:5000/image?img='.$target_path);

   //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

   //Execute the request.
   $data = curl_exec($ch);

   //Close the cURL handle.
   curl_close($ch);

   //Print the data out onto the page.
 }
 else
 {
  exit("Error While uploading image on the server");
}
}


if (!empty($_FILES["uploadedimage1"]["name"])) {
  $file_name=$_FILES["uploadedimage1"]["name"];
  $temp_name=$_FILES["uploadedimage1"]["tmp_name"];
  $imgtype=$_FILES["uploadedimage1"]["type"];
  $ext= GetImageExtension($imgtype);
  $imagename=date("d-m-Y")."-".time().$ext;
  $target_path2 = "C:/xampp/htdocs/foodpal/upload/".$imagename;
  $target_path = "C:\\xampp\\htdocs\\foodpal\\upload\\".$imagename;

  if(move_uploaded_file($temp_name, $target_path)) {
   $time_now=mktime(date('h')+4,date('i')+30,date('s'));

   $query_upload="INSERT into image_table (img_name,img_path,img_date,img_time) VALUES ('".$imagename."','".$target_path."','".date("Y-m-d")."','".date('H:i:s', $time_now)."')";
   mysqli_query($conn,$query_upload) or die("error in $query_upload == ----> ".mysql_error()); 


   $ch = curl_init();

   //Set the URL that you want to GET by using the CURLOPT_URL option.
   curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:5000/image?img='.$target_path);

   //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

   //Execute the request.
   $data = curl_exec($ch);

   //Close the cURL handle.
   curl_close($ch);

   //Print the data out onto the page.
 }
 else
 {
  exit("Error While uploading image on the server");
}
}


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>FoodPal</title>
  <link rel="icon" href="../img/title-logo.png" type="image/gif" sizes="16x16">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
 <nav style="background-color: WHITE;">
  <div class="nav-wrapper" style="color: #e62739">
    <a href="index.php" class="brand-logo"><img src="../img/logo.png" height="60" width="180" style="padding: 10px;"></a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger" style="color:red;"><i class="material-icons">menu</i></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li ><a  href="../profile.php" style="color: #e62739" >Profile</a></li>
      <li><a href="../upload.php" style="color: #e62739" >Upload</a></li>
      <li><a href="../dailyintake.php" style="color: #e62739" >Daily Intake</a></li>
      <li><a href="php/logout.php" style="color: #e62739" >Logout</a></li>
    </ul>
  </div>
</nav>
<ul class="sidenav" id="mobile-demo">
  <li ><a  href="../profile.php" style="color: #e62739" >Profile</a></li>
  <li><a href="../upload.php" style="color: #e62739" >Upload</a></li>
  <li><a href="../dailyintake.php" style="color: #e62739" >Daily Intake</a></li>
  <li><a href="php/logout.php" style="color: #e62739" >Logout</a></li>
</ul>
<br/><br/>


<div id="photo_main" class="col s12 l3 m3" >
  <div class="row">
    <div class="s12 l12 ">
      <center><img src="../python/images/xyz.jpg" style="border: 1px dashed #e62739;"></center>
    </div>
  </div>
  <div class="row">
    <div class="col l12 s12" style="background-color: #e62739;text-align: center;color: white;border: 2px dashed white;" >
      <br/>
      Result:
      <h1><b><?=$data?></b></h1> 
    </div>
  </div>
  <center>
    <div class="row">
      <?php if($data=="Food"){ ?>
        <form class="col s12 l3 m3" action="../description.php"> 

            <!-- <div class="col offset-s1 s5 ">
              <button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="action">Add to diet</button>
            </div> -->
            <div class="col s12">
              <center><button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="action" >More Info</button></center>
            </div>
          </form>
        <?php }else{ ?>
          <div class="col s12">
            <center><a class="btn waves-effect waves-light" style="background-color: #e62739;" href="../upload.php" ><i class="material-icons">thumb_up</i></a></center>
          </div>
          <br/><br/>
          <form class="col s12 l12 m12" action="../check_no_food.php"> 

            <!-- <div class="col offset-s1 s5 ">
              <button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="action">Add to diet</button>
            </div> -->

            <div class="col s12">
              <center><button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="action" >Not Satisfied? Think we can do better?</button></center>
            </div>
          </form>
          
          <br/>

        <?php } ?>

      </div>            
    </center>
  </div>


  <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });
  </script>
</body>
</html>
