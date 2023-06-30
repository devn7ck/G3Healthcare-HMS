<!DOCTYPE html>
<head>
  <title>Doctor Details</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesheets/appsearch.css" />
</head>
<body>
  <?php
    include_once("newfunc.php");
    if (isset($_POST['doctor_search_submit'])) {
      $contact = $_POST['doctor_contact'];
      $query = "select * from doctb where email='$contact'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      if ($row['username'] == "" & $row['password'] == "" & $row['email'] == "" & $row['docFees'] == "") {
        echo "<script> alert('No entries found!'); 
                window.location.href = 'admin_dashboard.php#list-doc';
              </script>";
      } 
      else {
        echo "<div class='container-fluid'>
                <div class ='card'>
                  <div class='card-body'>
                    <table class='table table-hover'>
                      <thead>
                        <tr>
                          <th scope='col'>Username</th>
                          <th scope='col'>Password</th>
                          <th scope='col'>Email</th>
                          <th scope='col'>Consultancy Fees</th>
                        </tr>
                      </thead>
                      <tbody>";

                        $username = $row['username'];
                        $password = $row['password'];
                        $email = $row['email'];
                        $docFees = $row['docFees'];

                        echo "<tr>
                                <td>$username</td>
                                <td>$password</td>
                                <td>$email</td>
                                <td>$docFees</td>
                              </tr>";
                        
                      echo "</tbody>
                    </table>
                    <center>
                    <a href='admin_dashboard.php' class='btn btn-light'>Back to dashboard</a>
                  </div>
                </center>
              </div>
            </div>
          </div>";
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