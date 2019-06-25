<?php
//index.php

$error = '';
$age = '';
$sex = '';
$cp = '';
$trestbps = '';
$chol = '';
$fbs = '';
$restecg = '';
$thalach = '';
$exang = '';
$oldpeak = '';
$slope = '';
$ca = '';
$thal = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 
  $age = clean_text($_POST["age"]);
  
  $sex = clean_text($_POST["sex"]);
  
  $cp = clean_text($_POST["cp"]);
 
  $trestbps = clean_text($_POST["trestbps"]);

  $chol = clean_text($_POST["chol"]);
  
  $fbs = clean_text($_POST["fbs"]);
  
  $restecg = clean_text($_POST["restecg"]);
 
  $thalach = clean_text($_POST["thalach"]);

  $exang = clean_text($_POST["exang"]);
  
  $oldpeak = clean_text($_POST["oldpeak"]);
  
  $slope = clean_text($_POST["slope"]);
 
  $ca = clean_text($_POST["ca"]);

  $thal = clean_text($_POST["thal"]);

 if($error == '')
 {
  $file_open = fopen("heart_data.csv", "a");
  $no_rows = count(file("heart_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'age'  => $age,
   'sex'  => $sex,
   'cp' => $cp,
   'trestbps' => $trestbps,
   'chol'  => $chol,
   'fbs'  => $fbs,
   'restecg' => $restecg,
   'thalach' => $thalach,
   'exang'  => $exang,
   'oldpeak'  => $oldpeak,
   'slope' => $slope,
   'ca' => $ca,
   'thal' => $thal
  );
  fputcsv($file_open, $form_data);
  
  
  $age = '';
  $sex = '';
  $cp = '';
  $trestbps = '';
  $chol = '';
  $fbs = '';
  $restecg = '';
  $thalach = '';
  $exang = '';
  $oldpeak = '';
  $slope = '';
  $ca = '';
  $thal = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>HEART ANALYSIS </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h1 align="center" style="color: red;">HEART ANALYSIS</h1>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center" style="color: blue;">Fill The Health Details</h3>
     <br />
     <?php echo $error; ?>

     <div class="form-group">
      <label>Enter Age</label>
      <input type="number" name="age" placeholder="Enter Age" class="form-control" value="<?php echo $age; ?>" />
     </div> 

     <div class="form-group">
      <label>Enter Sex</label>
      <input type="number" name="sex" class="form-control" placeholder="Enter Sex" value="<?php echo $sex; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Chest Pain Type</label>
      <input type="number" name="cp" class="form-control" placeholder="Enter CP" value="<?php echo $cp; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Trestbps</label>
      <input name="trestbps" class="form-control" placeholder="Enter Trestbps" value="<?php echo $trestbps; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Cholestrol</label>
      <input name="chol" class="form-control" placeholder="Enter chol mg/dl" value="<?php echo $chol; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Fasting Blood Sugar</label>
      <input name="fbs" class="form-control" placeholder="Enter fbs" value="<?php echo $fbs; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Rest ECG</label>
      <input name="restecg" class="form-control" placeholder="Enter restecg" value="<?php echo $cp; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Thalach</label>
      <input name="thalach" class="form-control" placeholder="Enter Thalach" value="<?php echo $thalach; ?>" />
     </div>

     <div class="form-group">
      <label>Enter exang</label>
      <input name="exang" class="form-control" placeholder="Enter exang" value="<?php echo $exang; ?>" />
     </div>

     <div class="form-group">
      <label>Enter oldpeak</label>
      <input name="oldpeak" class="form-control" placeholder="Enter oldpeak" value="<?php echo $oldpeak; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Slope</label>
      <input name="slope" class="form-control" placeholder="Enter slope" value="<?php echo $slope; ?>" />
     </div>

     <div class="form-group">
      <label>Enter ca</label>
      <input name="ca" class="form-control" placeholder="Enter ca" value="<?php echo $ca; ?>" />
     </div>

     <div class="form-group">
      <label>Enter Thal</label>
      <input name="thal" class="form-control" placeholder="Enter Thal" value="<?php echo $thal; ?>" />
     </div>
     
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>

    </form>
   </div>
  </div>
 </body>
</html>
