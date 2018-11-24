<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php

$sql = "SELECT D.dept_id,D.dept_name, M.m_fname, M.m_lname FROM department D,manager M where D.dept_manager= M.m_id";
$result = mysqli_query($conn, $sql);

?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <div class="col s8 m8">
        <h1 class="right header orange-text">Departments</h1>
        </div>
        <div class="col s4 m4">
        <h1 id="admin-add-dept-btn"><a class="right waves-effect waves-light btn-large" href="add_dept.php"><i class="material-icons right">add</i>Add New Department</a></h1>
        </div>
      </div>
    </div>
     
    <div class="row">
      <?php
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) { 
      ?>
      <div class="col s12 m4">
        <a href="departmentinfo_admin.php?department_id=<?php echo $row['dept_id']; ?>">
        <div class="card center">
          <div class="card-content red darken-1">
            <span class="card-title white-text">
              <h1><?php echo $row['dept_name']; ?></h1>
            </span>
          </div>
          <div class="card-content">
            <p>Head- <?php echo $row['m_fname']." ".$row['m_lname']; ?></p>
          </div>
        </div>
        </a>
      </div>
      <?php
          }
        }

      ?>
    </div>         
  </div>


  
  </main>
<?php endblock() ?>