<?php 
  session_start();

  $con=mysqli_connect("localhost","root","","hmsdb");

  include_once('newfunc.php'); 

  if(isset($_POST['docsub']))
  {
    $doctor=$_POST['doctor'];
    $dpassword=$_POST['dpassword'];
    $demail=$_POST['demail'];
    $spec=$_POST['special'];
    $docFees=$_POST['docFees'];
    $query="insert into doctb(username,password,email,spec,docFees)values('$doctor','$dpassword','$demail','$spec','$docFees')";
    $result=mysqli_query($con,$query);
    if($result)
      {
        echo "<script>alert('Doctor added successfully!');</script>";
    }
  }

  if(isset($_POST['docsub1']))
  {
    $demail=$_POST['demail'];
    $query="delete from doctb where email='$demail';";
    $result=mysqli_query($con,$query);
    if($result)
      {
        echo "<script>alert('Doctor removed successfully!');</script>";
    }
    else{
      echo "<script>alert('Unable to delete!');</script>";
    }
  }

  if ($_SESSION['username']!='mrgyamfi') {
    // no login info has been submitted, redirect to login page
    header("Location:index.php");
  }

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard | Administrator</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="stylesheets/admin-panel.css">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">     
      <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
          </svg> G3 Healthcare </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <script >
        var check = function() 
        {
          if (document.getElementById('dpassword').value ==
            document.getElementById('cdpassword').value) {
            document.getElementById('message').style.color = '#5dd05d';
            document.getElementById('message').innerHTML = 'Matched';
          } else {
            document.getElementById('message').style.color = '#f55252';
            document.getElementById('message').innerHTML = 'Not Matching';
          }
        }

        function alphaOnly(event) 
        {
          var key = event.keyCode;
          return ((key >= 65 && key <= 90) || key == 8 || key == 32);
        };
      </script>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
      </div>

    </nav>

  </head>

  <body>
    <div class="container-fluid">
      <h3> WELCOME ADMIN </h3>
      <div class="row">
        <div class="col-md-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
            <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">Doctor List</a>
            <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Patient List</a>
            <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list"  role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
            <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list"  role="tab" data-toggle="list" aria-controls="home">Prescription List</a>
            <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
            <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-ddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Doctor</a>
            <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list"  role="tab" data-toggle="list" aria-controls="home">Queries</a>
          </div>
          <br>
        </div>

        <div class="col-md-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
              <div class="container-fluid container-fullw bg-white" >
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body">
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle" style="margin-top: 5%;">Doctor List</h4>
                          
                          <script>
                            function clickDiv(id) {
                              document.querySelector(id).click();
                            }
                          </script> 
                          
                          <p class="links cl-effect-1">
                            <a href="#list-doc" onclick="clickDiv('#list-doc-list')">
                              View Doctors
                            </a>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body" >
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>
                          <p class="cl-effect-1">
                            <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                              View Patients
                            </a>
                          </p>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body" >
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle">Appointment Details</h4>
                        
                          <p class="cl-effect-1">
                            <a href="#app-hist" onclick="clickDiv('#list-app-list')">
                              View Appointments
                            </a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body" >
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle">Prescription List</h4>
                          <p class="cl-effect-1">
                            <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                              View Prescriptions
                            </a>
                          </p>
                        </div>
                    </div>
                  </div>


                  <div class="col-sm-4">
                    <div class="panel panel-white no-radius text-center">
                      <div class="panel-body" >
                        <span class="fa-stack fa-2x"> 
                          <i class="fa fa-square fa-stack-2x text-primary"></i> 
                          <i class="fa fa-plus fa-stack-1x fa-inverse"></i> 
                        </span>
                        <h4 class="StepTitle" style="margin-top: 5%;">Manage Doctors</h4>
                      
                        <p class="cl-effect-1">
                          <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Doctors</a>
                          &nbsp|
                          <a href="#app-hist" onclick="clickDiv('#list-ddoc-list')">
                            Delete Doctors
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>             
              </div>
            </div>
            
            <div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">
                    
              <div class="col-md-8">
                <form class="form-group" action="doctor-search.php" method="post">
                  <div class="row">
                  <div class="col-md-10"><input type="text" name="doctor_contact" placeholder="Enter Email ID" class = "form-control"></div>
                  <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div></div>
                </form>
              </div>
              
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;
                    $query = "select * from doctb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $spec = $row['spec'];
                      $email = $row['email'];
                      $password = $row['password'];
                      $docFees = $row['docFees'];
                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$docFees</td>
                      </tr>";
                    }

                  ?>
                </tbody>
              </table>
              <br>
            </div>
    
            <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">
              <div class="col-md-8">
                <form class="form-group" action="patient-search.php" method="post">
                  <div class="row">
                  <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class = "form-control"></div>
                  <div class="col-md-2"><input type="submit" name="patient_search_submit" class="btn btn-primary" value="Search"></div></div>
                </form>
            </div>
              
            <table class="table table-hover">
              <thead>
                <tr>
                <th scope="col">Patient ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  $con=mysqli_connect("localhost","root","","hmsdb");
                  global $con;
                  $query = "select * from patreg";
                  $result = mysqli_query($con,$query);
                  while ($row = mysqli_fetch_array($result))
                  {
                    $pid = $row['pid'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $password = $row['password'];
                    
                    echo "<tr>
                      <td>$pid</td>
                      <td>$fname</td>
                      <td>$lname</td>
                      <td>$gender</td>
                      <td>$email</td>
                      <td>$contact</td>
                      <td>$password</td>
                    </tr>";
                  }
                ?>
              </tbody>
            </table>
            <br>
          </div>

          <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
            <div class="col-md-8">
              <div class="row">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Doctor</th>
                      <th scope="col">Patient ID</th>
                      <th scope="col">Appointment ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Appointment Time</th>
                      <th scope="col">Disease</th>
                      <th scope="col">Allergy</th>
                      <th scope="col">Prescription</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                      $con=mysqli_connect("localhost","root","","hmsdb");
                      global $con;
                      $query = "select * from prestb";
                      $result = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_array($result))
                      {
                        $doctor = $row['doctor'];
                        $pid = $row['pid'];
                        $ID = $row['ID'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $appdate = $row['appdate'];
                        $apptime = $row['apptime'];
                        $disease = $row['disease'];
                        $allergy = $row['allergy'];
                        $pres = $row['prescription'];

                        echo "<tr>
                          <td>$doctor</td>
                          <td>$pid</td>
                          <td>$ID</td>
                          <td>$fname</td>
                          <td>$lname</td>
                          <td>$appdate</td>
                          <td>$apptime</td>
                          <td>$disease</td>
                          <td>$allergy</td>
                          <td>$pres</td>
                        </tr>";
                      }

                    ?>
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">
            <div class="col-md-8">
              <form class="form-group" action="appsearch.php" method="post">
                <div class="row">
                <div class="col-md-10"><input type="text" name="app_contact" placeholder="Enter Contact" class = "form-control"></div>
                <div class="col-md-2"><input type="submit" name="app_search_submit" class="btn btn-primary" value="Search"></div></div>
              </form>
            </div>
            
            <table class="table table-hover">
              <thead>
                <tr>
                <th scope="col">Appointment ID</th>
                <th scope="col">Patient ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Consultancy Fees</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Appointment Status</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  $con=mysqli_connect("localhost","root","","hmsdb");
                  global $con;

                  $query = "select * from appointmenttb;";
                  $result = mysqli_query($con,$query);
                  while ($row = mysqli_fetch_array($result)){
                ?>

                <tr>
                  <td><?php echo $row['ID'];?></td>
                  <td><?php echo $row['pid'];?></td>
                  <td><?php echo $row['fname'];?></td>
                  <td><?php echo $row['lname'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                  <td><?php echo $row['doctor'];?></td>
                  <td><?php echo $row['docFees'];?></td>
                  <td><?php echo $row['appdate'];?></td>
                  <td><?php echo $row['apptime'];?></td>
                  <td>
                    <?php 
                      if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                      {
                        echo "Active";
                      }
                      if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                      {
                        echo "Cancelled by Patient";
                      }

                      if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                      {
                        echo "Cancelled by Doctor";
                      }
                    ?>
                  </td>

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
                  <div class="col-md-4">
                    <label>Doctor Name:</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required>
                  </div>
                  <br>
                  <br>
                  <div class="col-md-4"><label>Specialization:</label></div>
                  <div class="col-md-8">
                    <select name="special" class="form-control" id="special" required="required">
                      <option value="head" name="spec" disabled selected>Select Specialization</option>
                      <option value="General" name="spec">General</option>
                      <option value="Cardiologist" name="spec">Cardiologist</option>
                      <option value="Neurologist" name="spec">Neurologist</option>
                      <option value="Pediatrician" name="spec">Pediatrician</option>
                    </select>
                  </div>
                  <br>
                  <br>
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div>
                  <br>
                  <br>
                  <div class="col-md-4">
                    <label>Password:</label>
                  </div>
                  <div class="col-md-8">
                    <input type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  required>
                  </div>
                  <br>
                  <br>
                  <div class="col-md-4">
                    <label>Confirm Password:</label>
                  </div>
                  <div class="col-md-8" id='cpass'>
                    <input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp
                    <span id='message'></span> 
                  </div>
                  <br>
                  <br>
                  <div class="col-md-4">
                    <label>Consultancy Fees:</label>
                  </div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div>
                  <br>
                  <br>
                </div>
                
                <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
              </form>
            </div>

            <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-settings1-list">
              <form class="form-group" method="post" action="admin_dashboard.php">
                
                <div class="row">
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                </div>

                <input type="submit" name="docsub1" value="Delete Doctor" class="btn btn-primary" onclick="confirm('Are you sure you want to delete?')">
              </form>
            </div>

            <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

            <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">
              <div class="col-md-8">
                <form class="form-group" action="find_message.php" method="post">
                  <div class="row">
                  <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class = "form-control"></div>
                  <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div></div>
                </form>
              </div>
                  
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;

                    $query = "select * from contact;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result))
                    {
  
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                    <tr>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['contact'];?></td>
                      <td><?php echo $row['message'];?></td>
                    </tr>

                  <?php 

                    } 
                  ?>
                </tbody>
              </table>
              <br>
            </div>

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
