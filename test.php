<?php 
session_start();
include_once('connect_db.php');

$job_title="Finance Employee";
  $department_id="3";
  $job_description="Finance Intern. Staring salary 10000/month";

$sqljob = "SELECT O.job_title, O.job_description, A.applicant_fname, A.applicant_lname, A.applicant_email, A.application_date, D.dept_name FROM jobs_offers O, job_applications A, department D WHERE O.dept_id= D.dept_id ";
$resultjob= mysqli_query($conn,$sqljob);


if (mysqli_num_rows($resultjob) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($resultjob)) { 
                  echo "Hello";
                  }
 }
  if($resultjob){
    echo "Query Done";
  }else{
    echo "Query not done";
  }