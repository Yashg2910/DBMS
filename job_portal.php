<?php
include_once('connect_db.php');

$sql="SELECT J.job_id, J.job_title, J.job_description, D.dept_name FROM jobs_offers J, department D WHERE J.dept_id = D.dept_id";
$result = mysqli_query($conn, $sql);
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

  <main style="padding-left: 0px !important;padding-bottom: 100px;">
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <h1 class="header center green-text">Open Jobs</h1>
      </div>
      <div class="container">
        <ul class="collection">
        <?php 
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li class="collection-item avatar">
          <span class="title"><b><a href=""><?php echo $row["job_title"]; ?></a></b></span>
          <p>Department: <?php echo $row["dept_name"]; ?><br>
          </p>
          <p><?php echo $row["job_description"]; ?><br>
          </p>
          <a href="job_portal_apply.php?jobid=<?php echo $row['job_id']; ?>"><button class="btn waves-effect waves-light secondary-content" type="submit" name="apply">Apply
            <i class="material-icons right">send</i>
          </button></a>
        </li>
        <?php
          }
        }
        ?>
      </ul>
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
