<?php
session_start();
include("config.php");
  // REGISTER USER DETAILS
  if (isset($_POST['register'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  //$password = mysqli_real_escape_string($conn, $_POST['password']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  $daily_activity = mysqli_real_escape_string($conn, $_POST['daily_activity']);
  $medical = mysqli_real_escape_string($conn, $_POST['medical']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $bmi= $weight/(($height/100)*($height/100));
  $ideal_weight = 21.5*($height/100)*($height/100);
  $ideal_cal = 666.5+(13.8*$weight)+(5*$height);

  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      echo "email already exists";
    }
  }
  
    $query = "INSERT INTO user (name, email, gender, age, weight, height, daily_activity, medical_conditions, location, bmi, ideal_weight, ideal_cal) VALUES('$name', '$email', '$gender', '$age', '$weight', '$height', '$daily_activity','$medical','$location','$bmi', '$ideal_weight', '$ideal_cal')";
    $result = mysqli_query($conn, $query);
    $_SESSION['myValue'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: profile.php');
  
    
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


 /*  
     echo $_FILES["uploadedimage"]["name"];

  if (!empty($_FILES["uploadedimage"]["name"])) {
    echo "insidefiles";
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time().$ext;
    $target_path = "img/".$imagename;

    if(move_uploaded_file($temp_name, $target_path)) {
    $query_upload="INSERT INTO image_table (img_name,img_path,img_time) VALUES ('$imagename','$target_path','".date("Y-m-d")."')";
    echo $query_upload;
    mysqli_query($conn,$query_upload) or die("error in $query_upload == ----> ".mysql_error()); 
  }
  else{
    exit("Error While uploading image on the server");
  }
  }
  */
 }
 


?>