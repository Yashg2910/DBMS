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
  <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container" style="margin-left: 0px !important; margin-top: 200px; ">

  <h1 style="color: white;margin-left: 100px; font-size: 45px;"><b>HUMAN RESOURCE MANAGEMENT SYSTEM</b></h1>
  <form class="form-signin" action="login.php" method="post">
    <h1>
    <h1 class="form-signin-heading">Sign In</h1>
    <input type="email" class="form-control" placeholder="Email address" required="" autofocus="" name="username">
    <br>
    <input type="password" class="form-control" placeholder="password" required="" name="password">
    <p><select name="role">
    <option>--Select role--</option>
      <option>Admin</option>
      <option>Employee</option>
      </select></p>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
      Sign In
    </button>
  </form>
  <?php echo $message ?>

</div>
</body>
</html>