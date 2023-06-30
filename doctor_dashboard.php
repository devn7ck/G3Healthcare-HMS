<?php
include_once('func1.php');
$con = mysqli_connect("localhost", "root", "", "hmsdb");
$doctor = $_SESSION['dname'];
if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set doctorStatus='0' where ID = '" . $_GET['ID'] . "'");
  if ($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
}

// if(isset($_GET['prescribe'])){

//   $pid = $_GET['pid'];
//   $ID = $_GET['ID'];
//   $appdate = $_GET['appdate'];
//   $apptime = $_GET['apptime'];
//   $disease = $_GET['disease'];
//   $allergy = $_GET['allergy'];
//   $prescription = $_GET['prescription'];
//   $query=mysqli_query($con,"insert into prestb(doctor,pid,ID,appdate,apptime,disease,allergy,prescription) values ('$doctor',$pid,$ID,'$appdate','$apptime','$disease','$allergy','$prescription');");
//   if($query)
//   {
//     echo "<script>alert('Prescribed successfully!');</script>";
//   }
//   else{
//     echo "<script>alert('Unable to process your request. Try again!');</script>";
//   }
// }
if (empty($_SESSION['dname'])) {
  // no login info has been submitted, redirect to login page
  header("Location:index.php");
}

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="stylesheets/doctor-panel.css">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
          </svg> G3 Healthcare </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
          <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
        </form>
      </div>
    </nav>
  </head>

  <body>
    <div class="container-fluid">
      <h3> Welcome &nbsp<?php echo $_SESSION['dname'] ?> </h3>
      
      <div class="row">
        <div class="col-md-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
            <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
            <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
          </div><br>
        </div>

        <div class="col-md-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">

              <div class="container-fluid container-fullw bg-white">
                <div class="row">

                  <div class="col-sm-4">
                    <div class="panel panel-white no-radius text-center">
                      <div class="panel-body">
                        <span class="fa-stack fa-2x"> 
                          <i class="fa fa-square fa-stack-2x text-primary"></i> 
                          <i class="fa fa-list fa-stack-1x fa-inverse"></i> 
                        </span>
                        <h4 class="StepTitle"> View Appointments</h4>
                        <script>
                          function clickDiv(id) {
                            document.querySelector(id).click();
                          }
                        </script>
                        <p class="links cl-effect-1">
                          <a href="#list-app" onclick="clickDiv('#list-app-list')">
                            Appointment List
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="panel panel-white no-radius text-center">
                      <div class="panel-body">
                        <span class="fa-stack fa-2x"> 
                          <i class="fa fa-square fa-stack-2x text-primary"></i> 
                          <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> 
                        </span>
                        <h4 class="StepTitle"> Prescriptions</h4>

                        <p class="links cl-effect-1">
                          <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                            Prescription List
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Prescribe</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "hmsdb");
                  global $con;
                  $dname = $_SESSION['dname'];
                  $query = "select pid,ID,fname,lname,gender,email,contact,appdate,apptime,userStatus,doctorStatus from appointmenttb where doctor='$dname';";
                  $result = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['pid']; ?></td>
                      <td><?php echo $row['ID']; ?></td>
                      <td><?php echo $row['fname']; ?></td>
                      <td><?php echo $row['lname']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['appdate']; ?></td>
                      <td><?php echo $row['apptime']; ?></td>
                      <td>
                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                          echo "Active";
                        }
                        if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                          echo "Cancelled by Patient";
                        }

                        if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                          echo "Cancelled by You";
                        }
                        ?>
                      </td>

                      <td>
                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        ?>
                          <a href="doctor_dashboard.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">
                            <button class="btn btn-danger">Cancel</button>
                          </a>
                        <?php
                        } else {
                          echo "Cancelled";
                        }
                        ?>

                      </td>

                      <td>

                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        ?>

                          <a href="prescribe.php?pid=<?php echo $row['pid'] ?>&ID=<?php echo $row['ID'] ?>&fname=<?php echo $row['fname'] ?>&lname=<?php echo $row['lname'] ?>&appdate=<?php echo $row['appdate'] ?>&apptime=<?php echo $row['apptime'] ?>" tooltip-placement="top" tooltip="Remove" title="prescribe">
                            <button class="btn btn-success">Prescibe</button>
                          </a>
                        <?php
                        } else {
                          echo "-";
                        }
                        ?>

                      </td>
                    </tr>

                    </a>
                  <?php } ?>
                </tbody>
              </table>
              <br>
            </div>

            <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "hmsdb");
                  global $con;

                  $query = "select pid,fname,lname,ID,appdate,apptime,disease,allergy,prescription from prestb where doctor='$doctor';";

                  $result = mysqli_query($con, $query);
                  if (!$result) {
                    echo mysqli_error($con);
                  }
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['pid']; ?></td>
                      <td><?php echo $row['fname']; ?></td>
                      <td><?php echo $row['lname']; ?></td>
                      <td><?php echo $row['ID']; ?></td>

                      <td><?php echo $row['appdate']; ?></td>
                      <td><?php echo $row['apptime']; ?></td>
                      <td><?php echo $row['disease']; ?></td>
                      <td><?php echo $row['allergy']; ?></td>
                      <td><?php echo $row['prescription']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

            <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "hmsdb");
                  global $con;

                  $query = "select * from appointmenttb;";
                  $result = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($result)) {

                    #$fname = $row['fname'];
                    #$lname = $row['lname'];
                    #$email = $row['email'];
                    #$contact = $row['contact'];
                  ?>
                    <tr>
                      <td><?php echo $row['fname']; ?></td>
                      <td><?php echo $row['lname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['doctor']; ?></td>
                      <td><?php echo $row['docFees']; ?></td>
                      <td><?php echo $row['appdate']; ?></td>
                      <td><?php echo $row['apptime']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <br>
            </div>

            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
              <form class="form-group" method="post" action="admin_dashboard.php">
                <div class="row">
                  <div class="col-md-4"><label>Doctor Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="doctor" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control" name="dpassword" required></div><br><br>
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div><br><br>
                  <div class="col-md-4"><label>Consultancy Fees:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="docFees" required></div><br><br>
                </div>
                <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
              </form>
            </div>
            <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  </body>
</html>