<?php
session_start();

$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['docsub1'])){
	$dname=$_POST['username3'];
	$dpass=$_POST['password3'];
	$query="select * from doctb where username='$dname' and password='$dpass';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    
		  $_SESSION['dname']=$row['username'];
      
    }
		header("Location:doctor_dashboard.php");
	}
	else{
     header("Location:error2.php");
    //echo("<script>alert('Invalid Username or Password. Try Again!');
    //      window.location.href = 'index.php';</script>");
  }
}

/*

 if(isset($_POST['update_data'])){ 
   $result=mysqli_query($con,$query);
   if(mysqli_num_rows($result)==1)
   {
     $_SESSION['username']=$username;
     header("Location:patient_dashboard.php");
   }
   else{
    header("Location:error2.php");
   }
  }
*/
function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		# echo'<option value="" disabled selected>Select Doctor</option>';
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

/*
 if(isset($_POST['doc_sub'])) {
 	$name=$_POST['name'];
 	$query="insert into doctb(name)values('$name')";
 	$result=mysqli_query($con,$query);
 	if($result)
 		header("Location:adddoc.php");
  }
*/


function display_admin_panel(){
	echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/func.css">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
          </svg> G3 Healthcare</a>
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
          <input class="form-control mr-sm-2" type="text" placeholder="enter contact number" aria-label="Search" name="contact">
          <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
        </form>
      </div>
    </nav>
  </head>
  <body>
    <div class="jumbotron" id="ab1"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Appointment</a>
              <a class="list-group-item list-group-item-action" href="patientdetails.php" role="tab" aria-controls="home">Patient List</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Payment Status</a>
              <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Prescription</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors Section</a>
              <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Attendance</a>
            </div><br>
          </div>

  

          <div class="col-md-8">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <div class="container-fluid">
                  <div class="card">
                    <div class="card-body">
                      <center><h4>Create an appointment</h4></center><br>
                      <form class="form-group" method="post" action="appointment.php">
                        <div class="row">
                          <div class="col-md-4"><label>First Name:</label></div>
                          <div class="col-md-8"><input type="text" class="form-control" name="fname"></div><br><br>
                          <div class="col-md-4"><label>Last Name:</label></div>
                          <div class="col-md-8"><input type="text" class="form-control"  name="lname"></div><br><br>
                          <div class="col-md-4"><label>Email id:</label></div>
                          <div class="col-md-8"><input type="text"  class="form-control" name="email"></div><br><br>
                          <div class="col-md-4"><label>Contact Number:</label></div>
                          <div class="col-md-8"><input type="text" class="form-control"  name="contact"></div><br><br>
                          <div class="col-md-4"><label>Doctor:</label></div>
                          <div class="col-md-8">
                          <select name="doctor" class="form-control" >

                            <!-- <option value="" disabled selected>Select Doctor</option>
                            <option value="Dr. Punam Shaw">Dr. Punam Shaw</option>
                              <option value="Dr. Ashok Goyal">Dr. Ashok Goyal</option> -->
                              <?php 
                                display_docs();
                              ?>
                          </select>
                        </div><br><br>
                        <div class="col-md-4">
                          <label>Payment:</label>
                        </div>
                        <div class="col-md-8">
                          <select name="payment" class="form-control" >
                            <option value="" disabled selected>Select Payment Status</option>
                            <option value="Paid">Paid</option>
                            <option value="Pay later">Pay later</option>
                          </select>
                        </div>
                        <br><br><br>
                        <div class="col-md-4">
                          <input type="submit" name="entry_submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                        </div>
                        <div class="col-md-8"></div>                  
                      </div>
                    </form>
                  </div>
                </div>
              </div><br>
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
              <div class="card">
                <div class="card-body">
                  <form class="form-group" method="post" action="func.php">
                    <input type="text" name="contact" class="form-control" placeholder="enter contact"><br>
                    <select name="status" class="form-control">
                      <option value="" disabled selected>Select Payment Status to update</option>
                      <option value="paid">paid</option>
                      <option value="pay later">pay later</option>
                    </select><br><hr>
                    <input type="submit" value="update" name="update_data" class="btn btn-primary">
                  </form>
                </div>
              </div><br><br>
            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
              <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                <form class="form-group" method="post" action="func.php">
                  <label>Doctors name: </label>
                  <input type="text" name="name" placeholder="enter doctors name" class="form-control">
                  <br>
                  <input type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">
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
    <!--Sweet alert js-->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        swal({
      title: "Welcome!",
      text: "Have a nice day!",
      imageUrl: "images/sweet.jpg",
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: "Custom image",
      animation: false
      })
    </script> 
  </body>
</html>';
}