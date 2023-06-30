<html>
<head>
	<title>Welcome to G3 Healthcare</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/index0.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    
    <script>
        var check = function() {
          if (document.getElementById('password').value == document.getElementById('cpassword').value) {
            document.getElementById('message').style.color = '#5dd05d';
            document.getElementById('message').innerHTML = 'Matched';
          } else {
            document.getElementById('message').style.color = '#f55252';
            document.getElementById('message').innerHTML = 'Not Matching';
          }
        }

        function alphaOnly(event) {
          var key = event.keyCode;
          return ((key >= 65 && key <= 90) || key == 8 || key == 32);
        };

        function checkPass()
        {
            if (document.getElementById('password').value == document.getElementById('cpassword').value) {
                var pass1 = document.getElementById("password").value;

                for (var i = 0; i < pass1.length; i++) {
                    if (pass1[i] >= 'A' && pass1[i] <= 'Z') {
                        return true;
                    }
                }
                
                alert("Password must contain an uppercase character. Try again!");
                return false;
                
            } else {
                alert("Password does not match. Try again!");
                return false;
            }
            
        }

    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#">
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
                        <a class="nav-link js-scroll-trigger" href="index.php"><h6>HOME</h6></a>
                    </li>
            
                    <li class="nav-item" >
                        <a class="nav-link js-scroll-trigger" href="services.html"><h6>SERVICES</h6></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="contact.html"><h6>CONTACT</h6></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="images/superhero_emoticon.png" alt="emoticon"/>
                <br/>
                <h3>Hi there, welcome! Lets get started.</h3>
                
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Patient Registration</h3>
                        <form method="post" action="func2.php">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="First Name *" name="fname"  onkeydown="return alphaOnly(event);" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" name="email"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" id="password" name="password" minlength="8" onkeyup='check();' required/>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="Male" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="Female">
                                                <span>Female </span>
                                            </label>
                                        </div>
                                        <span>Already have an account?</span>
                                        <a href="patient_login.php">Login here</a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" name="lname" onkeydown="return alphaOnly(event);" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone *"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  id="cpassword" placeholder="Confirm Password *" name="cpassword" minlength="8" onkeyup='check();' required/><span id='message'></span>
                                        
                                        <span class="psw-info">Password must contain at least 8 characters and an uppercase letter. </span>
                                    </div>
                                    <input type="submit" class="btnRegister" name="patsub1" onclick="return checkPass();" value="Register"/>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Doctor Signin</h3>
                        <form method="post" action="func1.php">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="User Name *" name="username3" onkeydown="return alphaOnly(event);" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name="password3" required/>
                                    </div>
                                    <input type="submit" class="btnRegister" name="docsub1" value="Sign In"/>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Admin Entry</h3>
                        <form method="post" action="func3.php"> 
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="User Name *" name="username1" onkeydown="return alphaOnly(event);" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name="password2" onkeyup="return check();" required/>
                                    </div>
                                    <input type="submit" class="btnRegister" name="adsub" onclick="return checkCase();" value="Enter"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

    <!-- Latest compiled Javascript -->
    <!-- Popper.js -->
    <script src="node_modules/popper.js/dist/umd/popper.min.js" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQuery -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" 
    integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
