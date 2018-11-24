<?php require_once 'ti.php' ?>
<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['admin'])){
$mid=$_SESSION['m_id'];
$fname=$_SESSION['m_fname'];
$lname=$_SESSION['m_lname'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
exit();
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
  <header>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">HRMS</a>

      <ul class="right hide-on-med-and-down">
        <li>
        <form>
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
        </li>
        <li><a href="logout.php">LOG OUT</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <!--Side Navigation bar-->
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="center"><div class="user-view">
      <div class="background">
        <img src="images/nav-back.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/yash.jpg" style="width: 100px; height: 100px;margin: auto;"></a>
      <a href="#name"><span class="white-text name"><?php echo $fname." ".$lname; ?></span></a>
      <a href="#email"><span class="white-text email">admin</span></a>
    </div></li>
    <li><a class="waves-effect" href="home_admin.php"><i class="material-icons">person</i>Home</a></li>
    <li><a class="waves-effect" href="departments_admin.php"><i class="material-icons">group</i>Departments</a></li>
    <li><a class="waves-effect" href="leave_app_admin.php"><i class="material-icons">book</i>Leave Applications</a></li>
    <li><a class="waves-effect" href="recruit_admin.php"><i class="material-icons">person_pin</i>Recruitment Section</a></li>
    
  </ul>
  </header>

  <?php startblock('body') ?>
  <?php endblock() ?>
  
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
