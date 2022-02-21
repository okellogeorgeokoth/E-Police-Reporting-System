<?php include('insertpoliceassignofficer.php')?>
 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
 include('includes/header.php');
?>
<?php 
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM assignofficer WHERE ID=$ID");

    if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $name = $n['name'];
      $address = $n['address'];
    }
  }
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
         <h2><center><strong>Assign Officer</strong></center></h2><hr/>
  <form  method="POST" action=""> 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">First Name*</label>
      <input class="form-control input-sm" name="firstname" type="text" autocomplete="off" required >
  </div>
   <div class="form-group col-md-6">
      <label for="name">Last Name*</label>
      <input class="form-control input-sm" name="lastname" type="text" autocomplete="off" required>
  </div>
<div class="form-group col-md-6">
    <label for="inputlg">PhoneNo*</label>
    <input type="text" class="form-control input-sm" name="phoneno"  autocomplete="off"  required   onkeypress="return this.value.length <10;" oninput="if(this.value.length>=10) { this.value = this.value.slice(0,10); }" />
  </div>
  <div class="form-group col-md-6">
      <label>Email</label>
      <input type="email" class="form-control" name="email" autocomplete="off" required>
    </div>
   <div class="form-group col-md-6">
  <label for="sel1">Rank:*</label>
  <select class="form-control" name="rank" autocomplete="off" required>
    <option></option>
    <option>Police</option>
    <option>DCI</option>
    <option>Corporal</option>
    <option>Seargent</option>
  </select>
</div>
 <div class="form-group col-md-6">
    <label for="inputsm">IdNo*</label>
    <input type="text" autocomplete="off" class="form-control input-sm" required name="idno"  onkeypress="return this.value.length < 8;" oninput="if(this.value.length>=8) { this.value = this.value.slice(0,8); }" />
  </div>
   <div class="col-md-12">
  <label for="sel1">Type of Assault:*</label>
  <select class="form-control" name="assault" autocomplete="off"  required>
    <option></option>
   <option>Robery</option>
    <option>Rape</option>
    <option>Insault</option>
    <option>Others</option>
  </select>
</div>
  <div class="form-group col-md-12">
   <button type="submit" class="btn btn-success submitButton"  name="submit">Assign</button>
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