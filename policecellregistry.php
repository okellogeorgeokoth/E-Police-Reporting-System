<?php include('insertpolicecellregistry.php')?>
 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
 include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Police</title>
    <link href="lib/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="lib/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="lib/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="main-content"style="background-color:white;">
   <div class="container-fluid">
    <div class="col-lg-12">
         <h2><center><strong>Cell Registry</strong></center></h2><hr/>
  <form  method="POST" action="" enctype="multipart/form-data" >
  <div class="form-row">
 
    <div class="form-group col-md-6">
      <label for="name">Suspects Name*</label>
      <input class="form-control input-sm" name="fullnames" type="text" autocomplete="off" required >
  </div>
<div class="form-group col-md-6">
    <label for="inputlg">Age*</label>
    <input class="form-control input-sm" name="age" type="text" autocomplete="off" required>
  </div>
 <div class="form-group col-md-6">
    <label for="inputsm">IdNo*</label>
  <input type="text" autocomplete="off" class="form-control input-sm" required name="idno"  onkeypress="return this.value.length < 8;" oninput="if(this.value.length>=8) { this.value = this.value.slice(0,8); }" />
  </div>
   <div class="form-group col-md-6">
  <label for="sel1">Gender:*</label>
  <select class="form-control" name="gender"  autocomplete="off" required>
    <option></option>
    <option>Male</option>
    <option>Female</option>
  </select>
</div>
   
  <div class="form-group col-md-6">
    <label for="inputsm">Occupation*</label>
    <input class="form-control input-sm" name="occupation" id="inputsm" type="text" autocomplete="off" required>
  </div>
<div class="form-group col-md-6">
    <label for="inputsm">Offense*</label>
    <input class="form-control input-sm" name="offense" id="inputsm" type="text" autocomplete="off" required>
  </div>
 <div class="form-group col-md-6">
    <label for="inputsm">Location of Arrest*</label>
    <input class="form-control input-sm" name="location" type="text" autocomplete="off" required>
    </div>
  <div class="form-group col-md-6">
  <label for="sel1">Most wanted:*</label>
  <select class="form-control" name="wanted" autocomplete="off" required>
    <option></option>
    <option>Yes</option>
    <option>No</option>
  </select>
</div>
 <div class="form-group col-md-6">
    <label for="inputsm">Date of Arrest*</label>
    <input type="date" name="dates"class="form-control" autocomplete="off" required>
    </div>
<div class="form-group col-md-6">
    <label for="exampleFormControlFile1">Time:*</label>
   <input type="time"   name="tim" class="form-control input-sm" autocomplete="off" required/>
  </div>
  <div class="form-group col-md-12">
   <button type="submit" class="btn btn-success submitButton"  name="submit">SAVE</button>
       </div>
</form>
</div>
          </div>    
</div>
</div>
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>