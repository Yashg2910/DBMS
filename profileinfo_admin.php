<?php include 'headeradmin.php' ?>
<?php startblock('body') ?>
<?php
$id=$_GET['eid'];
$sql = "SELECT E.e_fname, E.e_lname, E.username, E.dept_id, E.e_bdate, E.Doj, E.permanent_address, E.present_address,E.gender , E.blood_group, E.marital_status, E.mobile, E.designation, E.reporting_manager, E.location, E.account_number, E.ctc, E.email, D.dept_name          
FROM employee E, department D
WHERE E.dept_id = D.dept_id AND E.e_id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fname= $row["e_fname"];
        $lname= $row["e_lname"];
        $department= $row["dept_name"];
        $departmentid = $row["dept_id"];
        $username= $row["username"];
        $bdate= $row["e_bdate"];
        $bdate = date("d-m-Y", strtotime($bdate));
        $doj = $row["Doj"];
        $permanent_address= $row["permanent_address"];
        $present_address= $row["present_address"];
        $gender= $row["gender"];
        $blood_group= $row["blood_group"];
        $marital_status = $row["marital_status"];
        $mobile= $row["mobile"];
        $designation = $row["designation"];
        $reporting_manager= $row["reporting_manager"];
        $location= $row["location"];
        $account_number = $row["account_number"];
        $ctc= $row["ctc"];
        $email = $row["email"];
    }
} else {
    echo "0 results";
}
?>
<main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center orange-text"><?php echo $fname." ".$lname ?></h1>
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