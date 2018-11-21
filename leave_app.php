<?php include 'header.php' ?>
<?php startblock('body') ?>
<?php
$message="";
if(isset($_POST['submit'])){
  $reason= $_POST["reason"];
  $start_date= $_POST["start_date"];
  $end_date= $_POST["end_date"];
  $e_id= $id;
  $m_id= $reporting_manager;
  
  $sql1="INSERT INTO leaves(reason, e_id, m_id, start_date, end_date) VALUES ('".$reason."','".$e_id."','".$m_id."','".$start_date."','".$end_date."')";
  $result1= mysqli_query($conn, $sql1);

  if($result1){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/profile.php?");
  }else{

  }
}

$sqlleave="SELECT reason, start_date, end_date, status FROM leaves WHERE e_id='$id' ";
$resultleave= mysqli_query($conn,$sqlleave);
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" id="add_emp_container">
      <div class="container">
        <h1 class="header center orange-text">Apply For Leave</h1>
      </div>
      
      <div class="row">
        <form class="col s12" action="leave_app.php" method="post">
          <div class="row">
              <div class="input-field col s12">
                <input id="reason" type="text" class="" value="" name="reason">
                <label for="leave">Leave Reason</label>
              </div>
            <div class="input-field col s6">
              <input id="start_date" type="text" class="validate" value="" name="start_date">
              <label for="start_date">Start Date</label>
            </div>
            <div class="input-field col s6">
              <input id="end_date" type="text" class="validate" value="" name="end_date">
              <label for="end_date">End Date</label>
            </div>
          </div>
          <button class="center btn waves-effect waves-light" type="submit" name="submit">Submit
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>

      <table class="highlight">
        <thead>
          <tr>
              <th>Reason</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          if (mysqli_num_rows($resultleave) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($resultleave)) {
          ?>
          <tr>
            <td><?php echo $row['reason']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
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