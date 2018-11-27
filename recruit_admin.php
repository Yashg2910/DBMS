<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php
$message="";

if(isset($_POST['submit'])){

  $job_title= $_POST['job_title'];
  $department_id= $_POST['dept_id'];
  $job_description= $_POST['job_description'];

  //$job_title="Finance Employee";
  //$department_id="3";
  //$job_description="Finance Intern. Staring salary 10000/month";

 $sql = "INSERT INTO jobs_offers(job_id, job_title, dept_id, job_description) VALUES ('','".$job_title."','".$department_id."','".$job_description."')";
  $result = mysqli_query($conn, $sql);

  if($result){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home_admin.php");
  }
}


$sql = "SELECT D.dept_id, D.dept_name FROM department D";
$result = mysqli_query($conn, $sql);

$sqljob = "SELECT O.job_title, O.job_description,A.application_id, A.applicant_fname, A.applicant_lname, A.applicant_email, A.application_date,A.application_status,A.resume, D.dept_name FROM jobs_offers O, job_applications A, department D WHERE O.dept_id= D.dept_id AND O.job_id = A.job_id ";
$resultjob= mysqli_query($conn,$sqljob);

?>
<main>
  <div class="section no-pad-bot" id="index-banner" style="padding-bottom: 50px;">
    <div class="" id="add_emp_container" style="padding: 50px;">
      <div class="container">
        <h1 class="header center orange-text">New Job Posting<span class="large badge"></span></h1>
      </div>
      <div class="row">
      <form class="col s12" action="recruit_admin.php"  method="post">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="job_title">
            <label for="department_name">Job Title</label>
          </div>
          <div class="input-field col s6">
            <select name="dept_id">
              <option value="" disabled selected>Choose your option</option>
              <?php
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) { 
              ?>
              <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></option>
              <?php
                  }
              } 
              ?>
            </select>
            <label>Select Department</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <textarea id="textarea1" class="materialize-textarea" name="job_description"></textarea>
            <label for="department_name">Job Description</label>
          </div>
        </div>
        <button class="center btn waves-effect waves-light" type="submit" name="submit">Submit
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
      <div class="container">
        <h1 class="header center orange-text">Job Applications<span class="large badge"></span></h1>
      </div>

      <table class="highlight">
        <thead>
          <tr>
              <th>Applicant Name</th>
              <th>Job Title</th>
              <th style="width: 200px;">Job Description</th>
              <th>Applicant Email</th>
              <th>Application Date</th>
              <th>Resume</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          if (mysqli_num_rows($resultjob) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($resultjob)) {
          ?>
          <tr>
          <td><?php echo $row['applicant_fname']." ".$row['applicant_lname'] ;?></td>
          <td><?php echo $row['job_title'] ;?></td>
          <td><?php echo $row['job_description']; ?></td>
          <td><?php echo $row['applicant_email'] ;?></td>
          <td><?php echo $row['application_date'] ;?></td>
          <td><a class="waves-effect waves-light btn green" href="./<?php echo $row['resume'];?>" download><i class="material-icons right">get_app</i>Download</a></td>
          <td>
             <?php if($row['application_status']=='NIL'){ 
                ?>
              <a class="waves-effect waves-light btn blue" href="schedule_interview_admin.php?app_id=<?php echo $row['application_id']; ?>&status=Accepted">Accept</a> <a class="waves-effect waves-light btn red" href="schedule_interview_admin.php?app_id=<?php echo $row['application_id']; ?>&status=Rejected">Reject</a>
              <?php
                }
              ?>
              <?php if($row['application_status']=='Accepted'){ 
                ?>
              <a class="waves-effect waves-light btn blue">Interview</a>
              <?php
                }
              ?>
              <?php if($row['application_status']=='Rejected'){ 
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