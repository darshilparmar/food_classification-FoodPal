<?php  
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'foodcal');


// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['c_password']);
  $_SESSION['myValue']=$username;
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { 
    echo "Username is required"; 
  }
  if (empty($password_1)) { 
    echo "Password is required";
  }
  if ($password_1 != $password_2) {
	  echo "The two passwords do not match";
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM login WHERE email='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $username) {
      echo "Username already exists";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database
  	$query = "INSERT INTO login (email, password) VALUES('$username', '$password')";
  	$result = mysqli_query($db, $query);
  	$_SESSION['myValue'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: register-profile.php');
  }
}