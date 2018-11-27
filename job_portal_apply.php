<?php
include_once('connect_db.php');

if (isset($_GET['jobid'])) {
  $jobid= $_GET['jobid'];
  $sql="SELECT J.job_id, J.job_title, J.job_description, D.dept_name FROM jobs_offers J, department D WHERE J.dept_id=D.dept_id AND J.job_id='$jobid' ";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $job_id= $row['job_id'];
        $job_title= $row['job_title'];
        $job_description= $row['job_description'];
        $dept_name= $row['dept_name'];
      }
  } else {
      echo "0 results";
  }
}

if(isset($_POST['submit'])){

  $jobid= $_POST['job_id'];
  $fname= $_POST['app_fname'];
  $lname= $_POST['app_lname'];
  $email= $_POST['app_email'];
  $dateofapp = $_POST['app_date'];
  $targetfolder = "documents/";

  $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

  $ok=1;

  $file_type=$_FILES['file']['type'];


  $resumeurl=$targetfolder;

  if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
   if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
   {
   echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
   }
   else {
   echo "Problem uploading file";
   }
  }
  else {
   echo "You may only upload PDFs, JPEGs or GIF files.<br>";
  }


  //$job_title="Finance Employee";
  //$department_id="3";
  //$job_description="Finance Intern. Staring salary 10000/month";

  $sql = "INSERT INTO job_applications(application_id, job_id, applicant_fname, applicant_lname, applicant_email, application_date, resume) VALUES ('','$jobid','$fname','$lname','$email','$dateofapp','$resumeurl')";
  $result = mysqli_query($conn, $sql);

  if($result){
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/job_portal.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>HRMS</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header style="padding-left: 0px !important;">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Human Resource Management System</a>
    </div>
  </nav>
  </header>

  <main style="padding-left: 0px !important;padding-bottom: 50px;">
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" id="add_emp_container">
      <div class="container">
        <h1 class="header center orange-text">Apply For The Job</h1>
      </div>
      <div class="container">
        <ul class="collection">
           <li class="collection-item avatar">
            <span class="title"><b><a href=""><?php echo $job_title; ?></a></b></span>
            <p>Department: <?php echo $dept_name; ?><br>
          </p>
          <p><?php echo $job_description; ?><br>
          </p>
        </ul>
      </div>
      <div class="row">
        <form class="col s12" action="job_portal_apply.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" name="app_fname">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" name="app_lname">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input type="text"  name="app_date" value="<?php echo date("Y-m-d"); ?>" readonly>
              <label for="dob">Date of application</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" name="app_email">
              <label for="email">E-mail</label>
            </div>
          </div>
          <!--<div class="row">
            <div class="file-field input-field">
              <div class="btn">
                <span>Browse</span>
                <input type="file" name="app_resume">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>-->
          <input type="" name="job_id" value="<?php echo $jobid; ?>" hidden>
          <div class="file-field input-field">
            <div class="btn">
              <span>Browse</span>
              <input type="file" name="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
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

  <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="#">Yash & Puja</a>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
 
  </body>
</html>
