<?php 
//start sesion
error_reporting(E_ALL ^ E_NOTICE); 
session_start();
$email = $_SESSION['myValue'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>FoodPal</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
  <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'>
  <link rel='stylesheet' href='https://unpkg.com/filepond/dist/filepond.min.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <style type="text/css">
    .caret
    {
      display: none;
    }
    .select .input-field .prefix ~ input, .input-field .prefix ~ textarea , .input-field .prefix ~ div.select-wrapper 
    {
      margin-left: 3rem !important;
      width: 92% !important;
      width: calc(100% - 3rem) !important; 
    }
    .filepond--drop-label {
      color: #4c4e53;
    }

    .filepond--label-action {
      text-decoration-color: #babdc0;
    }

    .filepond--panel-root {
      background-color: #edf0f4;
    }


/**
 * Page Styles
 */
 html {
  padding:  0 0;
 }

 .filepond--root {
  width:170px;
  margin: 0 auto;
 }
  </style>
</head>
<body>
  <?php 
    include ('nav.php');
  ?>
  <div class="row center-align" style="height: 50px;width: 100%;background-color: #e62739;padding: 15px;color: white;">REGISTER PROFILE</div>
  <div class="container">
    <div id="register-profile" class="col s12 l3 m3">
      <form action = "profile-details.php" method = "POST" class="col s12 l3 m3 " enctype="multipart/form-data">
        <?php include('errors.php'); ?>
        <div class="form-container">
          <div class="row">
            <div class="col s12">
              <input type="file" id="uploadedimage" name="uploadedimage">
            </div>            
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">person_outline</i>
              <input id="name" type="text" class="validate" name = "name">
              <label for="name">Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">person_outline</i>
              <input id="email" type="email" class="validate" name = "email" value="<?=$email?>" >
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            
             <div class="input-field col s6 select">
            <i class="material-icons prefix">wc</i>
            <select name="gender">
              <option value="" disabled selected>Choose your option</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <label>Gender</label>
          </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">accessible_forward</i>
              <input id="age" type="text" class="validate" name = "age">
              <label for="age">Age</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">vertical_split</i>
              <input id="height" type="text" class="validate" name = "height">
              <label for="height">Height in cms</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">accessibility</i>
              <input id="weight" type="text" class="validate" name="weight">
              <label for="weight">Weight in kgs</label>
            </div>
          </div>
          
          <div class="input-field col s12 select">
            <i class="material-icons prefix">directions_run</i>
            <select name="daily_activity">
              <option value="" disabled selected>Choose your option</option>
              <option value="Low Exercise">Low Exercise</option>
              <option value="Moderate Exercise">Moderate Exercise</option>
              <option value="High Exercise">High Exercise</option>
            </select>
            <label>Daily Activity</label>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">local_hospital</i>
              <input id="medical" type="text" class="validate" name = "medical">
              <label for="medical">Medical Conditions</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">location_on</i>
              <input id="location" type="text" class="validate" name = "location">
              <label for="location">Location</label>
            </div>
          </div>
          <!--
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">transfer_within_a_station</i>
              <input id="bmi" type="text" class="validate" name = "bmi">
              <label for="bmi">BMI</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">done_all</i>
              <input id="goal" type="text" class="validate" name="goal">
              <label for="goal">Goal</label>
            </div>
          </div>
          -->
          <br>
          <center>
            <input class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="register"></input>
            <br>
            <br>
            
          </center>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script type="text/javascript">

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
  $(document).ready(function(){
    $('select').formSelect();
  });
/*
We need to register the required plugins to do image manipulation and previewing.
*/
FilePond.registerPlugin(
  // encodes the file as base64 data
  FilePondPluginFileEncode,
  
  // validates files based on input type
  FilePondPluginFileValidateType,
  
  // corrects mobile image orientation
  FilePondPluginImageExifOrientation,
  
  // previews the image
  FilePondPluginImagePreview,
  
  // crops the image to a certain aspect ratio
  FilePondPluginImageCrop,
  
  // resizes the image to fit a certain size
  FilePondPluginImageResize,
  
  // applies crop and resize information on the client
  FilePondPluginImageTransform
);

// Select the file input and use create() to turn it into a pond
// in this example we pass properties along with the create method
// we could have also put these on the file input element itself
FilePond.create(
  document.querySelector('input'),
  {
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom'
  }
);
</script>

</body>
</html>