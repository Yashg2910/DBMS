<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php

if(isset($_GET['status'])){
  $app_id= $_GET['app_id'];
  $status= $_GET['status'];

  $sqlupdate= "UPDATE job_applications SET application_status='$status' WHERE application_id=$app_id";
  $result= mysqli_query($conn, $sqlupdate);
  
  if($status=='Rejected'){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/recruit_admin.php");
  }
}

//Query for Applicant details
$sql= "SELECT A.applicant_fname,A.applicant_lname, A.applicant_email, J.job_title FROM job_applications A, jobs_offers J WHERE A.application_id= $app_id AND A.job_id = J.job_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $fname= $row['applicant_fname'];
    $lname= $row['applicant_lname'];
    $email= $row['applicant_email'];
    $job_title= $row['job_title'];
  }
}
else{
  echo "0 results";
}



?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="container">
        <h1 class="header center orange-text">Schedule Interview</h1>
      </div>
      <div class="container">
        <ul class="collection">
           <li class="collection-item avatar">
            <span class="title"><b><?php echo $fname." ".$lname?></b></span>
            <p>Job Title: <?php echo $job_title ?><br></p>
            <p><?php echo $email ?><br></p>
        </ul>
      </div>
    <div class="row">
      <form class="col s12" action="sendmail.php"  method="post">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="int_date">
            <label for="department_name">Interview Date</label>
          </div>
          <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="int_time">
            <label for="department_name">Interview Time</label>
          </div>
        </div>
        <input type="" name="fname" value="<?php echo $fname ?>" hidden>
        <input type="" name="lname" value="<?php echo $lname ?>" hidden>
        <input type="" name="email" value="<?php echo $email ?>" hidden>
        <input type="" name="job_title" value="<?php echo $job_title ?>" hidden>

        <button class="center btn waves-effect waves-light" type="submit" name="submit">Submit
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>   
    </div> 
  </div>
</main>
<?php endblock() ?>