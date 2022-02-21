  <?php
$firstname = "";
$lastname   = "";
$phoneno  = "";
$email = "";
$rank   = "";
$idno = "";
$assault    = "";


$errors = array(); 

$link = mysqli_connect("localhost", "root", "", "epolice"); 
if (isset($_POST['submit'])) {
  // receive all input values from the form
 $firstname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
  $lastname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
  $phoneno = mysqli_real_escape_string($link, $_REQUEST['phoneno']); 
  $email= mysqli_real_escape_string($link, $_REQUEST['email']);
  $rank= mysqli_real_escape_string($link, $_REQUEST['rank']);
  $idno = mysqli_real_escape_string($link, $_REQUEST['idno']);
  $assault = mysqli_real_escape_string($link, $_REQUEST['assault']);
  

  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname are required"); }
  if (empty($lastname)) { array_push($errors, "lastname is required"); }
  if (empty($phoneno)) { array_push($errors, "PhoneNo is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($rank)) { array_push($errors, "Rank is required"); }
   if (empty($idno)) { array_push($errors, "IdNo is required"); }
    if (empty($assault)) { array_push($errors, "Type of assault is required"); }
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {	

  $sql = "INSERT INTO assignofficer(firstname,lastname, phoneno,email,rank,idno,assault) VALUES ('$firstname', '$lastname', '$phoneno','$email', '$rank', '$idno','$assault')"; 
 if(mysqli_query($link, $sql)){
     echo "<script>alert('Police Officer Successfully Assigned.Click Ok button to view!!!'); window.location='policeviewassignedofficer.php'</script>";} 
      else{ echo "<script>alert('ERROR: Could not file the complaint  $sql.!!!');window.location='policeassignofficer.php'</script>". mysqli_error($link); 
  } // Close connection mysqli_close($link); 
}
         if(isset($_POST['update'])) {
             $firstname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
  $lastname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
  $phoneno = mysqli_real_escape_string($link, $_REQUEST['phoneno']); 
  $email= mysqli_real_escape_string($link, $_REQUEST['email']);
  $rank= mysqli_real_escape_string($link, $_REQUEST['rank']);
  $idno = mysqli_real_escape_string($link, $_REQUEST['idno']);
  

  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname are required"); }
  if (empty($lastname)) { array_push($errors, "lastname is required"); }
  if (empty($phoneno)) { array_push($errors, "PhoneNo is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($rank)) { array_push($errors, "Rank is required"); }
   if (empty($idno)) { array_push($errors, "IdNo is required"); }
              if (count($errors) == 0) {  
            $sql = "UPDATE assignofficer (firstname,lastname, phoneno,email,rank,idno) VALUES ('$firstname', '$lastname', '$phoneno','$email', '$rank', '$idno')"; 
            mysql_select_db('employee');
            $retval = mysql_query( $sql, $link );
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            
            mysql_close($link);
         }else {
           echo "Could not update\n";

         }
}}
?>



