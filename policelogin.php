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
    <h2><center>Police Login</center></h2>
  </div> 
  <form method="post" class="form"  action="policelogin.php" >
    <div class="form-group">
      <label for="username" class="text-info">PoliceName:</label><br>
      <input type="text" class="form-control" name="username" placeholder="PoliceName"  required>
    </div>
    <div class="form-group">
       <label for="username" class="text-info">Password:</label><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" style="float: right;">Login</button>
    </div>
  </form>
  </div>
  <br><br>
<footer>
<p ><center><a href="index.html" title="homepage"><img src="img/icons/homepage.png" width="25px"></a> &copy; 2020 E-Police System</center></p>
</footer>
  </div>
   </div>
</body></html>