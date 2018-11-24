<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php
$message="";
if(isset($_GET['status'])){
  $leave_id= $_GET['l_id'];
  $status= $_GET['status'];

  $sqlupdate= "UPDATE leaves SET status='$status' WHERE l_id=$leave_id";
  $result= mysqli_query($conn, $sqlupdate);
  if($result){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/leave_app_admin.php");
  }
}

$sqlleave="SELECT L.l_id, L.reason, L.start_date, L.end_date, L.status,E.e_id, E.e_fname, E.e_lname FROM leaves L, employee E WHERE L.m_id='$mid' AND E.e_id=L.e_id ";
$resultleave= mysqli_query($conn,$sqlleave);

?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" id="add_emp_container">
      <div class="container">
        <h1 class="header center orange-text">Leave Applications<span class="large badge"></span></h1>
      </div>

      <table class="highlight">
        <thead>
          <tr>
              <th>Employee ID</th>
              <th>Employee Name</th>
              <th>Reason</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Approve/Reject</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          if (mysqli_num_rows($resultleave) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($resultleave)) {
          ?>
          <tr>
            <td><?php echo $row['e_id']; ?></td>
            <td><?php echo $row['e_fname']." ".$row['e_lname']; ?></td>
            <td><?php echo $row['reason']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td>
              <?php if($row['status']=='NIL'){ 
                ?>
              <a class="waves-effect waves-light btn green" href="leave_app_admin.php?l_id=<?php echo $row['l_id']; ?>&status=Accepted">Accept</a> <a class="waves-effect waves-light btn red" href="leave_app_admin.php?l_id=<?php echo $row['l_id']; ?>&status=Rejected">Reject</a>
              <?php
                }
              ?>
              <?php if($row['status']=='Accepted'){ 
                ?>
              <a class="waves-effect waves-light btn green">Accepted</a>
              <?php
                }
              ?>
              <?php if($row['status']=='Rejected'){ 
                ?>
              <a class="waves-effect waves-light btn red">Rejected</a>
              <?php
                }
              ?>
            </td>
          </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div> 
  </div>

</main>
<?php endblock() ?>