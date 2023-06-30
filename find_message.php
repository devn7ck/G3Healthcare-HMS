<!DOCTYPE html>
<?php #include("func.php");?>
<html>
<head>
	<title>Messages</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesheets/appsearch.css"/>
</head>
<body>
  <?php
    include_once("newfunc.php");
    if(isset($_POST['mes_search_submit']))
    {
      $contact=$_POST['mes_contact'];
      $query = "select * from contact where contact= '$contact'";
      $result = mysqli_query($con,$query);
      $row=mysqli_fetch_array($result);
      if($row['name']=="" & $row['email']=="" & $row['contact']=="" & $row['message']==""){
        echo "<script> alert('No entries found! Please enter valid details'); 
              window.location.href = 'admin_dashboard.php#list-doc';</script>";
      } 
      else {
        echo "<div class='container-fluid'>
        <div class='card'>
        <div class='card-body'>
      <table class='table table-hover'>
        <thead>
          <tr>
            <th scope='col'>User Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Contact</th>
            <th scope='col'>Message</th>
          </tr>
        </thead>
        <tbody>";

          $name = $row['name'];
          $email = $row['email'];
          $contact = $row['contact'];
          $message = $row['message'];
          echo "<tr>
            <td>$name</td>
            <td>$email</td>
            <td>$contact</td>
            <td>$message</td>
          </tr>";
        
        echo "</tbody></table><center><a href='admin_dashboard.php' class='btn btn-light'>Back to your Dashboard</a></div></center></div></div></div>";
      }
    }

    if (empty($_SESSION)) {
      // no login info has been submitted, redirect to login page
      header("Location:index.php");
    }
  ?>

  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
</body>
</html>