<!DOCTYPE html>
  <?php #include("func.php");?>
  <head>
    <title>Patient Details</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/appsearch.css"/>
  </head>
  <body>
    <?php
      include_once("newfunc.php");
      if(isset($_POST['app_search_submit']))
      {
        $contact=$_POST['app_contact'];
        $query = "select * from appointmenttb where contact= '$contact';";
        $result = mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        if($row['fname']=="" & $row['lname']=="" & $row['email']=="" & $row['contact']=="" & $row['doctor']=="" & $row['docFees']=="" & $row['appdate']=="" & $row['apptime']=="")
        {
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
              <th scope='col'>First Name</th>
              <th scope='col'>Last Name</th>
              <th scope='col'>Email</th>
              <th scope='col'>Contact</th>
              <th scope='col'>Doctor Name</th>
              <th scope='col'>Consultancy Fees</th>
              <th scope='col'>Appointment Date</th>
              <th scope='col'>Appointment Time</th>
              <th scope='col'>Appointment Status</th>
            </tr>
          </thead>
          <tbody>";
        
          
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $contact = $row['contact'];
                $doctor = $row['doctor'];
                $docFees= $row['docFees'];
                $appdate= $row['appdate'];
                $apptime = $row['apptime'];
                if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                          {
                            $appstatus = "Active";
                          }
                          if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                          {
                            $appstatus = "Cancelled by You";
                          }

                          if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                          {
                            $appstatus = "Cancelled by Doctor";
                          }
                echo "<tr>
                  <td>$fname</td>
                  <td>$lname</td>
                  <td>$email</td>
                  <td>$contact</td>
                  <td>$doctor</td>
                  <td>$docFees</td>
                  <td>$appdate</td>
                  <td>$apptime</td>
                  <td>$appstatus</td>
                </tr>";
          echo "</tbody></table><center><a href='admin_dashboard.php' class='btn btn-light'>Back to Dashboard</a></div></center></div></div></div>";
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