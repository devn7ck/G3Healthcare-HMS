<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['search_submit'])){
  $contact=$_POST['contact'];
  $docname = $_SESSION['dname'];
 $query="select * from appointmenttb where contact='$contact' and doctor='$docname';";
 $result=mysqli_query($con,$query);
 echo '<!DOCTYPE html>
<html lang="en">
  <head>G3 Healthcare | Search</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/search.css"/>
    </head>
  <body>
  <div class="container">
  <center><h3>Search Results</h3></center><br>
  <table class="table table-hover">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Appointment Date</th>
      <th>Appointment Time</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $appdate=$row['appdate'];
    $apptime=$row['apptime'];
    echo '<tr>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$email.'</td>
      <td>'.$contact.'</td>
      <td>'.$appdate.'</td>
      <td>'.$apptime.'</td>
    </tr>';
  }
echo '</tbody></table></div> 
<div><a href="doctor_dashboard.php" class="btn btn-light">Go Back</a></div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>';
}

if (empty($_SESSION)) {
  // no login info has been submitted, redirect to login page
  header("Location:index.php");
}

?>