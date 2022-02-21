<?php
 session_start();
 require('includes/config.php');
?>
<?php include('includes/header.php');  ?>
<div class="main-content">

    <?php
    if(isset($_REQUEST['edit']))
      {
    $id=intval($_GET['edit']);

$sql="SELECT* FROM assignofficer
WHERE id=$id";

    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);

    if ($resultCheck > 0) {
    foreach($results as $result)
    {     
    ?>  
  <div class="title">
<h3><center>Update  [<?php echo $result["firstname"]?>  <?php echo $result["lastname"] ?>]</center></h3>
  </div>


<!-- FORM SECTION    -->
<div class="col-md-12">
<form method="post" action="policeviewassignedofficer.php" class="form-horizontal">
<input type="hidden" name="id" value='<?php echo $result["id"]?>'>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">First Name*</label>
      <input class="form-control input-sm" name="firstname" type="text" autocomplete="off" required value='<?php echo $result["firstname"]  ?>' required autofocus>
  </div>
   <div class="form-group col-md-6">
      <label for="name">Last Name*</label>
      <input class="form-control input-sm" name="lastname" type="text" autocomplete="off" required value='<?php echo $result["lastname"]  ?>'required autofocus>
  </div>
<div class="form-group col-md-6">
    <label for="inputlg">PhoneNo*</label>
    <input type="text" class="form-control input-sm" name="phoneno"  autocomplete="off"  required   onkeypress="return this.value.length <10;" oninput="if(this.value.length>=10) { this.value = this.value.slice(0,10); }" / value='<?php echo $result["phoneno"]  ?>' required autofocus>
  </div>
  <div class="form-group col-md-6">
      <label>Email</label>
      <input type="email" class="form-control" name="email" autocomplete="off" required value='<?php echo $result["email"]  ?>' required autofocus>
    </div>
 <div class="form-group col-md-6">
  <label for="sel1">Rank:*</label>
  <select class="form-control" name="rank" autocomplete="off"  required autofocus>
   <option></option>
    <option>Police</option>
    <option>DCI</option>
    <option>Corporal</option>
    <option>Seargent</option>

</select>
</div>
    <div class="form-group col-md-6">
    <label for="inputsm">IdNo*</label>
    <input type="text" autocomplete="off" class="form-control input-sm" required name="idno"  onkeypress="return this.value.length < 8;" oninput="if(this.value.length>=8) { this.value = this.value.slice(0,8); }" value='<?php echo $result["idno"]  ?>' required autofocus/>
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
   <button type="submit" class="btn btn-success submitButton"  name="update">update</button>
       </div>
  </div>
 </form>

<?php  }}}?>
</div>
   </div>
</div>
   </div>
<?php include('includes/footer.php');?>




