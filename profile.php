<?php include 'header.php' ?>
<?php startblock('body') ?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center orange-text">Personal Details</h1>
    </div>
     <div class="row">
      <div class="col m12 s12">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <div class="row">
              <div class="col m6 s12">
                <table>
                  <tbody>
                    <tr>
                      <td><b>First Name<b></td>
                      <td><?php echo $fname; ?></td>
                    </tr>
                    <tr>
                      <td><b>Last Name</b></td>
                      <td><?php echo $lname ?></td>
                    </tr>
                    <tr>
                      <td><b>Department</b></td>
                      <td><?php echo $department; ?></td>
                    </tr>
                    <tr>
                      <td><b>Date Of Birth</b></td>
                      <td><?php echo $bdate; ?></td>
                    </tr>
                    <tr>
                      <td><b>Date of Joining</b></td>
                      <td><?php echo $doj; ?></td>
                    </tr>
                    
                    <tr>
                      <td><b>Gender</b></td>
                      <td><?php echo $gender; ?></td>
                    </tr>
                    <tr>
                      <td><b>Blood Group</b></td>
                      <td><?php echo $blood_group; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col m6 s12">
                <table>
                  <tbody>
                    <tr>
                      <td><b>Phone Number<b></td>
                      <td><?php echo $mobile; ?></td>
                    </tr>
                    <tr>
                      <td><b>Email</b></td>
                      <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                      <td><b>Designation</b></td>
                      <td><?php echo $designation; ?></td>
                    </tr>
                    <tr>
                      <td><b>Reporting Manager</b></td>
                      <td><?php echo $reporting_manager; ?></td>
                    </tr>
                    <tr>
                      <td><b>Permanent Address</b></td>
                      <td><?php echo $permanent_address; ?></td>
                    </tr>
                    <tr>
                      <td><b>Present Address</b></td>
                      <td><?php echo $present_address; ?></td>
                    </tr>
                    <tr>
                      <td><b>Location</b></td>
                      <td><?php echo $location; ?></td>
                    </tr>
                    <tr>
                      <td><b>Account Number</b></td>
                      <td><li><a href="#"><?php echo $account_number; ?></a></li></td>
                    </tr>
                    <tr>
                      <td><b>CTC</b></td>
                      <td><?php echo $ctc; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
  <?php endblock() ?>