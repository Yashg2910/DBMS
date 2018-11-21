<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php
if(isset($_GET['department_id'])){
$departmentid = $_GET['department_id'];
}
if(isset($_POST['submit'])){
  $department_name= $_POST['department_name'];
  $manager_id= $_POST['manager_id'];
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $dept_id = $_POST['dept_id'];
  $dob = $_POST['dob'];
  $doj = $_POST['doj'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $reporting_manager = $_POST['reporting_manager'];

  $sql = "INSERT INTO employee(e_fname, e_lname, dept_id, e_bdate, Doj, username, password, reporting_manager ) VALUES ('".$fname."','".$lname."','".$dept_id."','".$dob."','".$doj."','".$username."','".$password."','".$reporting_manager."')";
  $result = mysqli_query($conn, $sql);

  if($result){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/departmentinfo_admin.php?department_id=$dept_id");
  }
}

$sql = "SELECT D.dept_name,D.dept_manager FROM department D WHERE D.dept_id='$departmentid'";
$result = mysqli_query($conn, $sql);
$row =mysqli_fetch_assoc($result);
$department_name = $row["dept_name"];
$department_manager= $row["dept_manager"];

$sql = "SELECT E.e_id, E.e_fname FROM employee E";
$result = mysqli_query($conn, $sql);
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" id="add_emp_container">
      <div class="container">
        <h1 class="header center orange-text">Add Employee</h1>
      </div>
      <div class="row">
        <form class="col s12" action="add_emp.php?" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" name="first_name">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" name="last_name">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input disabled value="<?php echo $department_name; ?>" id="disabled" type="text" class="validate">
              <label for="disabled">Department</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input type="text"  name="dob" >
              <label for="dob">Date of Birth</label>
            </div>
            <div class="input-field col m6 s12">
              <input type="text"  name="doj" >
              <label for="doj">Date of Joining</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password" type="password" class="validate" name="password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" name="username">
              <label for="email">username</label>
            </div>
          </div>
          <input type="text" name="dept_id" value="<?php echo $departmentid; ?>" hidden>
          <input type="text" name="reporting_manager" value="<?php echo $department_manager; ?>" hidden>
          <button class="center btn waves-effect waves-light" type="submit" name="submit">Submit
            <i class="material-icons right">send</i>
          </button>
        </form>
        
      </div>
      
    </div> 
  </div>
</main>
<?php endblock() ?>