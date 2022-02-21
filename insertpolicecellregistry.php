  <?php


$fullnames = "";
$age    = "";
$idno = "";
$gender  = "";
$occupation   = "";
$offense = "";
$location   = "";
$wanted    = "";
$dates = "";
$tim = "";
$errors = array(); 

$link = mysqli_connect("localhost", "root", "", "epolice"); 
if (isset($_POST['submit'])) {
  // receive all input values from the form
 $fullnames = mysqli_real_escape_string($link, $_REQUEST['fullnames']);
  $age = mysqli_real_escape_string($link, $_REQUEST['age']);
  $idno = mysqli_real_escape_string($link, $_REQUEST['idno']); 
  $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
  $occupation = mysqli_real_escape_string($link, $_REQUEST['occupation']);
  $offense = mysqli_real_escape_string($link, $_REQUEST['offense']);
  $location = mysqli_real_escape_string($link, $_REQUEST['location']); 
  $wanted = mysqli_real_escape_string($link, $_REQUEST['wanted']);
  $dates = mysqli_real_escape_string($link, $_REQUEST['dates']);
  $tim = mysqli_real_escape_string($link, $_REQUEST['tim']); 

  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullnames)) { array_push($errors, "Fullnames are required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($idno)) { array_push($errors, "Idno is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($occupation)) { array_push($errors, "Occupation is required"); }
   if (empty($offense)) { array_push($errors, "Offense is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }
  if (empty($wanted)) { array_push($errors, "Most wanted is required"); }
   if (empty($dates)) { array_push($errors, "Date is required"); }
   if (empty($tim)) { array_push($errors, "Time is required"); }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {	

  $sql = "INSERT INTO cellregistry(fullnames,age, idno,gender,occupation,offense,location,wanted,dates,tim) VALUES ('$fullnames', '$age', '$idno','$gender', '$occupation', '$offense','$location', '$wanted', '$dates', '$tim')"; 
 if(mysqli_query($link, $sql)){
     echo "<script>alert('Successfully Uploaded.Click Ok button to view!!!'); window.location='policeviewcellregistry.php'</script>";} 
      else{ echo "<script>alert('ERROR: Could not file the complaint  $sql.!!!');window.location='policecellregistry.php'</script>". mysqli_error($link); 
  } // Close connection mysqli_close($link); 
}
}
?>



