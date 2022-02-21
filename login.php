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
		<div class="logo">
			<img src="img/banner.jpg" class="logo" width="100%">
		</div>

<div id="loginbox">  
<div class="form-group">
  	<h2><center>Login</center></h2>
  </div>
      <?php include('errors.php'); ?>
  <form method="post" class="form-vertical" action="login.php" >
  	<div class="form-group">
  		<label>Email</label>
  		<input type="text" class="form-control" name="email" required>
  	</div>
  	<div class="form-group">
  		<label>Password</label>
  		<input type="password" class="form-control" name="password" autocomplete="off" required>
  	</div>
  	<div class="form-group" style="float: right;">
  		<button type="submit" class="btn btn-success" name="login_user">Login</button>
  		  <button type="reset" class="btn btn-info" value="Reset">Reset</button>
  	</div>
  	<h5>
  		<a href="index.html" title="homepage"> <img src="img/icons/homepage.png" width="25px"></a>  Not yet a member? <a href="register.php">Sign up</a>
  	</h5>
  </form>
  </div>
  <br><br>
<footer>
<p ><center>&copy; 2020 E-Police System</center></p>
</footer>
  </div>
   </div>
</body></html>