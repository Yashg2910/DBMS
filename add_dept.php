<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php

if(isset($_POST['submit'])){

$department_name= $_POST['department_name'];
$manager_id= $_POST['manager_id'];
$sql = "INSERT INTO department(dept_id, dept_name, dept_manager) VALUES ('','".$department_name."','".$manager_id."')";
$result = mysqli_query($conn, $sql);

$sql="SELECT dept_id FROM department WHERE dept_name='$department_name'";
$result = mysqli_query($conn, $sql);
$row =mysqli_fetch_assoc($result);
$dept_id = $row["dept_id"];

$sql = "UPDATE employee SET reporting_manager='$manager_id',dept_id='$dept_id' WHERE e_id='$manager_id'";
$result = mysqli_query($conn, $sql);

if($result){
  header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/departments_admin.php");
}
}
$sql = "SELECT E.e_id, E.e_fname FROM employee E";
$result = mysqli_query($conn, $sql);
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="container">
        <h1 class="header center orange-text">Add New Department</h1>
      </div>
    <div class="row">
      <form class="col s12" action="add_dept.php"  method="post">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="department_name">
            <label for="department_name">Department Name</label>
          </div>
          <div class="input-field col s6">
            <select name="manager_id">
              <option value="" disabled selected>Choose your option</option>
              <?php
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) { 
              ?>
              <option value="<?php echo $row['e_id']; ?>"><?php echo $row['e_id']." ".$row['e_fname']; ?></option>
              <?php
                  }
              } 
              ?>
            </select>
            <label>Select Department Manager </label>
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