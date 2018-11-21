<?php include 'header.php' ?>
<?php startblock('body') ?>
<?php

  $sql = "SELECT E.e_id, E.e_fname, E.designation, E.e_lname, D.dept_name          
FROM employee E, department D
WHERE E.dept_id = '$departmentid' AND D.dept_id = '$departmentid'";

$result = mysqli_query($conn, $sql);
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center orange-text"><?php echo $department; ?> Department</h1>
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
          <span class="title"><b><a href="profileinfo.php?eid=<?php echo $row["e_id"]; ?>"><?php echo $row["e_fname"]; ?></a></b></span>
          <p><?php echo $row["designation"]; ?><br>
          </p>
          <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
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