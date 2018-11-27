<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php

if(isset($_GET['department_id'])){
$departmentid=$_GET['department_id'];
}

if(isset($_POST['remove_emp'])){

  $eid = $_POST['e_id'];

  $sqldelete= "DELETE FROM employee WHERE e_id = $eid";
  $result= mysqli_query($conn,$sqldelete);

}
$sql = "SELECT E.e_id, E.e_fname, E.designation, E.e_lname, D.dept_name          
FROM employee E, department D
WHERE E.dept_id = '$departmentid' AND D.dept_id = '$departmentid'";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT D.dept_name FROM department D WHERE D.dept_id='$departmentid'";
$result2 = mysqli_query($conn, $sql2);
$row =mysqli_fetch_assoc($result2);
$department = $row["dept_name"];
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <div class="col s8 m8">
        <h1 class="right header orange-text"><?php echo $department; ?> Department</h1>
        </div>
        <div class="col s4 m4">
        <h1 id="admin-add-dept-btn"><a class="right waves-effect waves-light btn-large" href="add_emp.php?department_id=<?php echo $departmentid; ?>"><i class="material-icons right">add</i>Add New Employee</a></h1>
        </div>
      </div>
    </div>
     
     <div class="container">
      <ul class="collection">
        <?php 
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li class="collection-item avatar">
          <img src="images/yash.jpg" alt="" class="circle">
          <span class="title"><b><a href="profileinfo_admin.php?eid=<?php echo $row["e_id"]; ?>"><?php echo $row["e_fname"]; ?></a></b></span>
          <p><?php echo $row["designation"]; ?><br>
          </p>
          <form action="departmentinfo_admin.php?department_id=<?php echo $departmentid ?>" method="post">
          <input type="" name="e_id" value="<?php echo $row['e_id'] ?>" hidden>
          <button type="submit" name="remove_emp" class="waves-effect waves-light btn red secondary-content">Remove Employee</a>
          </form>
        </li>
        <?php
          }
        }
        ?>
      </ul>
     </div>
  </div>
  </main>
<?php endblock() ?>