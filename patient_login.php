<?php
include_once("header.php");
?>
<!DOCTYPE html>

<head>
  <title>G3 Healthcare | Sign in</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="stylesheets/index1.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="index.php">
        <h4><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
          </svg>&nbsp G3 Healthcare</h4>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">
              <h6>HOME</h6>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="services.html">
              <h6>SERVICES</h6>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.html">
              <h6>CONTACT</h6>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div>
          <img src="images/superhero_emoticon.png" alt="">
        </div>
        <br/>
        <div>
          <h4> Lets diagnose your health, <br/>log in your personal info.</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <center>
              <i class="fa fa-hospital-o fa-3x" aria-hidden="true"></i>
              <br>
              <h3>Patient Login</h3><br>
              <form class="form-group" method="POST" action="func.php">
                <div class="row">
                  <div class="col-md-4">
                    <label>Email-ID: </label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" required />
                  </div><br><br>
                  <div class="col-md-4 psw">
                    <label>Password: </label>
                  </div>
                  <div class="col-md-8 psw">
                    <input type="password" class="form-control" name="password2" placeholder="Enter password" required />
                  </div><br><br><br>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <center>
                      <input type="submit" id="inputbtn" name="patsub" value="Login" class="btn btn-primary">
                    </center>
                  </div>
        
                </div>
              </form>
            </center>
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
</body>

</html>
