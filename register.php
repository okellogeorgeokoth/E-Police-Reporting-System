<?php include('server.php')?>
<html>
<head>
    <title>E-Police System</title>
   <link rel="stylesheet" type="text/css" href="css/styles.css">
	 <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
<div id="outer">

<div id="wrapper">
    <div id="container">
        <div class="logo">
            <img src="img/banner.jpg" class="logo" width="100%">
        </div>
<div class="form-group">
    <h2><center>Register</center></h2>
  </div>
    <?php include('errors.php'); ?>
 <form  method="POST" action="" enctype="multipart/form-data" class="needs-validation"  >
    <div class="col-md-4 mb-3 md-form">
       <br>
  <label for="sel1">Firstname:*</label>
    <input class="form-control input-sm" name="firstname" type="text" autocomplete="off"  required>
    </div>
     <div class="col-md-4 mb-3 md-form">
       <br>
  <label for="sel1">MiddleName:*</label>
    <input class="form-control input-sm" name="middlename" type="text" autocomplete="off"   required>
    </div>
    <div class="col-md-4 mb-3 md-form">
  <br>
    <label for="inputsm">LastName:*</label>
     <input type="text" class="form-control input-sm" name="lastname" autocomplete="off"  required>
  </div>
      
      <div class="col-md-4 mb-2 md-form">
         <br>
  <label for="sel1">PhoneNo:*</label>
   <input type="text" class="form-control input-sm" name="phoneno" type="text" autocomplete="off"  required   onkeypress="return this.value.length <10;" oninput="if(this.value.length>=10) { this.value = this.value.slice(0,10); }" />
    </div>
  <div class="col-md-4 mb-2 md-form">
  <br>
  <label for="sel1">Age:*</label>
   <input type="text" class="form-control input-sm" name="age" type="text" autocomplete="off" required   onkeypress="return this.value.length <3;" oninput="if(this.value.length>=3) { this.value = this.value.slice(0,3); }" />
    </div>
    <div class="col-md-4 mb-3 md-form">
  <br>
  <label for="sel1">Gender:*</label>
  <select class="form-control" name="gender" autocomplete="off"  required >
    <option></option>
    <option>Male</option>
    <option>Female</option>
  </select>
</div>
<div class="col-md-4 mb-3 md-form">
            <br>
  <label for="sel1">IDNO:*</label>
  <input type="text" autocomplete="off" class="form-control input-sm" required name="idno"  onkeypress="return this.value.length < 8;" oninput="if(this.value.length>=8) { this.value = this.value.slice(0,8); }" />
  </div>
 <div class="col-md-4 mb-3 md-form">
    <br>
    <label for="inputsm">Address*</label>
    <input class="form-control input-sm" name="address" id="inputsm" type="text" autocomplete="off"  required  onkeypress="return this.value.length < 8;" oninput="if(this.value.length>=8) { this.value = this.value.slice(0,8); }">
  </div>
    <div class="col-md-4 mb-3 md-form">
      <br>
  <label for="sel1">Residence:*</label>
  
   <input class="form-control input-sm" name="residence" id="inputsm" type="text" autocomplete="off"  required>
</div>
 <div class="col-md-4 mb-3 md-form">
<br>
    <label for="inputsm">Email:*</label>
     <input type="email" class="form-control input-sm" name="email"  value="<?php echo $email; ?>" autocomplete="off" required>
  </div>
  <div class="col-md-4 mb-3 md-form">
  <br>
    <label for="inputsm">Password:*</label>
     <input type="password" class="form-control input-sm" name="password_1" autocomplete="off"  required>
  </div>
    <div class="col-md-4 mb-3 md-form">
      <br>
    <label for="inputsm">Confirm Password:*</label>
     <input type="password" class="form-control input-sm" name="password_2"  autocomplete="off"  required>
  </div>
 <div  class="col-md-12" >
  <br>  <br>
   <a href="index.html" title="homepage"> <img src="img/icons/homepage.png" width="25px"></a> Already a member? <a href="login.php">Sign in</a>
      <button type="submit" class="btn btn-success" name="reg_user" style="float: right;">Register</button>
    </div>
    
 </form>
 

 <div  class="col-md-12" >
<footer>
<p ><center>&copy; 2020 E-Police System</center></p>
</footer>
</div>
</div>
</div>
</body></html>