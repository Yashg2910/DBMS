<?php 
include_once 'connect_db.php';
$message="";
if(isset($_POST['submit'])){

$username=$_POST['username'];
$password=$_POST['password'];
$role= $_POST['role'];
switch($role){
case 'Employee':
$sql = "SELECT e_id,e_fname,e_lname,username FROM employee WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

$row=mysqli_fetch_array($result);
$message="";
if($row>0){
session_start();
$_SESSION['e_id']=$row[0];
$_SESSION['e_fname']=$row[1];
$_SESSION['e_lname']=$row[2];
$_SESSION['e_username']=$row[3];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/profile.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Admin':
$sql = "SELECT E.e_fname, E.e_lname, E.e_id,M.m_id FROM manager M,employee E WHERE M.m_username='$username' AND M.m_password='$password' AND E.e_id= M.m_id";
$result = mysqli_query($conn, $sql);

$row=mysqli_fetch_array($result);
$message="";
if($row>0){
session_start();
$_SESSION['admin']="logged in";
$_SESSION['m_id']=$row[3];
$_SESSION['m_fname']=$row[0];
$_SESSION['m_lname']=$row[1];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home_admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>HRMS</title>

  <!-- CSS  -->
  <link href="css/login1.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<section class="login-block">
    <div class="container">
  <div class="row">
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Login Now</h2>
        <form class="login-form">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div>
    </div>
    <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>  
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>  
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>  
    </div>
  </div>
            </div>     
        
    </div>
  </div>
</div>
</section>
</body>
</html>