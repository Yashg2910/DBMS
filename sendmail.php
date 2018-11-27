<?php

  header("Location: http://localhost/Project/recruit_admin.php");

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  if(isset($_POST['submit'])){
  $date= $_POST['int_date'];
  $time= $_POST['int_time'];
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $email= $_POST['email'];
  $job_title= $_POST['job_title'];

  $msg= "Hello $fname $lname.<br>Congratulations, your job application has been accpeted. You are invited for interview round.<br>Job Title: $job_title<br> Date: $date<br>Time: $time <br> All The Best. -HR";
  }
  $mail = new PHPMailer(true);
  try {
      //Server settings
      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'yashguptaspark@gmail.com';                 // SMTP username
      $mail->Password = 'sssya2998';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('yash@example.com', 'Manager at HRMS');
      $mail->addAddress($email, $fname);     // Add a recipient
      // Name is optional
      $mail->addReplyTo('info@example.com', 'Information');

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Interview Schedule';
      $mail->Body    = $msg;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
    
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }

?>