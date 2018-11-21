<?php include 'header.php' ?>
<?php startblock('body') ?>
<?php
if(isset($_POST['submit'])){
  $fname= $_POST["e_fname"];
  $lname= $_POST["e_lname"];
  $username= $_POST["username"];
  $password= $_POST['password'];
  $gender= $_POST['gender'];
  $blood_group= $_POST['blood_group'];
  $permanent_address= $_POST["permanent_address"];
  $present_address= $_POST["present_address"];
  $marital_status = $_POST["marital_status"];
  $mobile= $_POST["mobile"];
  $email = $_POST["email"];

  $sql1="UPDATE employee SET e_fname='$fname',e_lname='$lname',username='$username',password='$password',gender='$gender',blood_group='$blood_group', present_address='$present_address',permanent_address='$permanent_address',marital_status='$marital_status',mobile='$mobile',email='$email' WHERE e_id=$id";

  $sql="UPDATE employee SET e_fname='$fname' WHERE e_id=1";
  $result1= mysqli_query($conn, $sql1);

  if($result1){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/profile.php");
  }else{
    $message="Hello";
  }
}

?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" id="add_emp_container">
      <div class="container">
        <h1 class="header center orange-text">Update Profile</h1>
      </div>
      
      <div class="row">
        <form class="col s12" action="profile_update.php" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" value="<?php echo $fname; ?>" name="e_fname">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" value="<?php echo $lname; ?>" name="e_lname">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="username" type="text" class="validate" value="<?php echo $username; ?>" name="username">
              <label for="username">username</label>
            </div>
            <div class="input-field col s6">
              <input id="password" type="text" class="validate" value="<?php echo $password; ?>" name="password">
              <label for="password">password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <select name="gender">
              <option value="" disabled selected>Choose your option</option>
              <option value="Male" >Male</option>
              <option value="Female" >Female</option>
              <option value="Other" >Other</option>
              </select>
              <label for="gender">Gender</label>
            </div>
            <div class="input-field col s6">
              <input id="blood_group" type="text" class="validate" value="<?php echo $blood_group; ?>" name="blood_group">
              <label for="blood_group">Blood Group</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="present_address" type="text" class="validate" value="<?php echo $present_address; ?>" name="present_address">
              <label for="present_address">Present Address</label>
            </div>
            <div class="input-field col s6">
              <input id="permanent_address" type="text" class="validate" value="<?php echo $permanent_address; ?>" name="permanent_address">
              <label for="permanent_address">Permanent Address</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <select name="marital_status">
              <option value="" disabled selected>Choose your option</option>
              <option value="Unmarried" >Unmarried</option>
              <option value="Married" >Married</option>              
              </select>
              <label for="marital_status">Marital Status</label>
            </div>
            <div class="input-field col s6">
              <input id="mobile" type="text" class="validate" value="<?php echo $mobile; ?>" name="mobile">
              <label for="mobile">Mobile Number</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" value="<?php echo $email; ?>" name="email">
              <label for="email">Email</label>
            </div>
          </div>
          <button class="center btn waves-effect waves-light" type="submit" name="submit">Submit
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>

    </div> 
  </div>
</main>
<?php endblock() ?>