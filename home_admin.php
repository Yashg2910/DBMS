<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php 

$sqlcountemp = "SELECT COUNT(e_id) as total FROM employee";
$resultemp = mysqli_query($conn,$sqlcountemp);
$row=mysqli_fetch_assoc($resultemp);
$numberofemp=$row['total'];

$sqlcountmgr = "SELECT COUNT(m_id) as mgr_total FROM manager";
$resultemp = mysqli_query($conn,$sqlcountmgr);
$row=mysqli_fetch_assoc($resultemp);
$numberofmgr=$row['mgr_total'];
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="row">
      <div class="col s12 m12 l4">
        <div class="card center">
          <div class="card-content blue darken-1">
            <span class="white-text">
              <div class="row ">
                <div class="col m6 s6">
                  <i class="large material-icons center-vertical">person</i>
                  <p>Employees</p>
                </div>
                <div class="col m6 s6">
                  <h2><?php echo $numberofemp ?></h2>
                </div>
              </div>
            </span>
          </div>
          <!--<div class="card-content">
            <p>"Welcome to ISE Department"</p>
          </div>-->
        </div>
      </div>

      <div class="col s12 m12 l4">
        <div class="card center">
          <div class="card-content yellow darken-1">
            <span class="white-text">
              <div class="row ">
                <div class="col m6 s6">
                  <i class="large material-icons center-vertical">person</i>
                  <p>Managers</p>
                </div>
                <div class="col m6 s6">
                  <h2><?php echo $numberofmgr ?></h2>
                </div>
              </div>
            </span>
          </div>
          <!--<div class="card-content">
            <p>"Welcome to ISE Department"</p>
          </div>-->
        </div>
      </div>

    </div>
  </div>
</main>
<?php endblock() ?>