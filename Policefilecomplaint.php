<?php include('insertcomplaint.php')?>
 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
$sql = "SELECT* FROM users";
       $result = mysqli_query($conn, $sql);
       $users = mysqli_num_rows($result);

$sql1 = "SELECT* FROM complaint";
       $result1 = mysqli_query($conn, $sql1);
       $complaint = mysqli_num_rows($result1);

$sql2 = "SELECT* FROM missing";
       $result2 = mysqli_query($conn, $sql2);
       $missing = mysqli_num_rows($result2);

 $sql2 = "SELECT* FROM missing";
       $result2 = mysqli_query($conn, $sql2);
       $missing = mysqli_num_rows($result2);
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
<div class="main-content" style="background-color:#fff;">
          <h2><center><strong>File Complaints</strong></center></h2>
 <form  method="POST" action="" enctype="multipart/form-data" >
  
  <div class="form-group">
    <label for="inputsm">Full Names</label>
    <input class="form-control input-sm" name="fullnames" type="text" >
  </div>
  <div class="form-group">
    <label for="inputlg">PhoneNo</label>
    <input class="form-control input-sm" name="phoneno" type="text">
  </div>
    <div class="form-group">
    <label for="inputlg">IdNo</label>
    <input class="form-control input-sm" name="idno" type="text">
  </div>
   <div class="form-group">
    <label for="inputsm">Nationality</label>
    <input class="form-control input-sm" name="nationality" id="inputsm" type="text">
  </div>
  <div class="form-group">
    <label for="inputsm">Date of crime</label>
    <input type="date" name="date"class="form-control">
    </div>
  <div class="form-group">
    <label for="inputsm">Location of crime</label>
    <input class="form-control input-sm" name="location" type="text">
  </div>
    <div class="form-group">
  <label for="sel1">Gender:</label>
  <select class="form-control" name="gender" >
    <option></option>
    <option>Male</option>
    <option>Female</option>
  </select>
</div>
  <div class="form-group">
  <label for="sel1">Type of Assault:</label>
  <select class="form-control" name="assault" >
    <option></option>
   <option>Robery</option>
    <option>Rape</option>
    <option>Insault</option>
    <option>Others</option>
  </select>
</div>
  <div class="form-group">
  <label for="comment">Describe More about the assault:</label>
  <textarea class="form-control" name="description" rows="5" id="comment"></textarea>
</div>
   <button type="submit" class="btn btn-success" name="submit">Submit</button>
       <button type="reset" class="btn btn-info"  value="Reset">Reset</button>
</form>

            </div>
            <div class="col-lg-4"><br><br><br><br>
               <h2 style="color: red;"><center><strong>Errors in Filing Complaint</strong></center></h2>
               <h4><Marquee bgcolor="#000080" style="color: #FFFFFF; font-family: Book Antiqua" ><center>Incase there is any error while filling the complaints they will be displayed here</center></Marquee></h4><br><br>
              <center><?php include('errors.php'); ?></center>

  </div>
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>