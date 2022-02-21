<?php
session_start();

// initializing variables
$firstname = "";
$middlename = "";
$lastname   = "";
$phoneno = "";
$age    = "";
$residence = "";
$idno    = "";
$address   = "";
$gender = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'epolice');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
   $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
   $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
   $age = mysqli_real_escape_string($db, $_POST['age']);
  $residence = mysqli_real_escape_string($db, $_POST['residence']);
  $idno = mysqli_real_escape_string($db, $_POST['idno']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($middlename)) { array_push($errors, "Middlename is required"); }
    if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($phoneno)) { array_push($errors, "PhoneNo is required"); }
    if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($residence)) { array_push($errors, "Residence is required"); }
    if (empty($idno)) { array_push($errors, "IDNO is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE idno='$idno' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['idno'] === $idno) {
      array_push($errors, "IDNO already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (firstname, middlename, lastname,phoneno, age, residence,idno, address, gender,email,password) 
  			  VALUES('$firstname','$middlename', '$lastname', '$phoneno','$age', '$residence','$idno','$address', '$gender', '$email', '$password')";
  	mysqli_query($db, $query);
  	echo "<script>alert('Welcome You have successfully Registered.You can Sign in.!!!'); window.location='login.php'</script>";} 
}

// ... 
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "";
      header('location:Filecomplaint.php');
    }
  	else {
  		 echo "<script>alert('ERROR: Incorrect Email/Password!!!');window.location='login.php'</script>";
  }
}
}
//Police Login

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM police WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "";
      header('location: dashboard.php');
    }
    else {
       echo "<script>alert('ERROR: Incorrect Username/Password!!!');window.location='policelogin.php'</script>";
  }
}
?>



