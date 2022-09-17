<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reach Me</title>
      <link href="assets/img/s_icon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  
    <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
    
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    
      <!-- Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    height: 100vh;
    background-color: #9090fa
}

/* .container {
    margin: 50px auto
} */

.panel-heading {
    text-align: center;
    margin-bottom: 10px
}

#forgot {
    min-width: 100px;
    margin-left: auto;
    text-decoration: none
}

a:hover {
    text-decoration: none
}

.form-inline label {
    padding-left: 10px;
    margin: 0;
    cursor: pointer
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 15px
}

.panel {
    min-height: 380px;
    border-radius: 12px
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff
}

input[type='text'],
input[type='password'] {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none
}

img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative
}

a[target='_blank'] {
    position: relative;
    transition: all 0.1s ease-in-out
}

.bordert {
    border-top: 1px solid #aaa;
    position: relative
}

.bordert:after {
    content: "or connect with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px
}

@media(max-width: 360px) {
    #forgot {
        margin-left: 0;
        padding-top: 10px
    }

    body {
        height: 100%
    }

    .container {
        margin: 30px 0
    }

    .bordert:after {
        left: 25%
    }
}



      </style>
</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center" style="padding:0px">
        <div class="container d-flex align-items-center justify-content-between">
    
          <div id="logo" style="padding:20px">
            <h1><a href="#"><span>Reach</span> Me</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" title="" /></a>-->
          </div>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link" href="adminlogin.php">Admin</a></li>
              <li><a class="nav-link" href="index.php">Student</a></li>
              <li><a class="nav-link" href="faculty_login.php">Faculty</a></li>
              <li><a class="nav-link" href="about.php">About Us</a></li>
              <li><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
          </nav><!-- .navbar -->
    
        </div>
      </header>
      <div  id="login"></div>
      <br><br><br><br>  <br><br>
      <div class="container" style="margin-right: 500px;">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white" style="min-height:0;">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Forgot Password</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="admindashboard.php" method="POST">
                            <div class="form-group py-2">
                              <label class="text-muted">Email</label>
                                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" placeholder="Enter your Email" required> </div>
                            </div>
                            
                            <button class="btn btn-primary btn-block mt-3" style="display: block;
                            width: 100%;
                            border: none;
                            background-color: #04AA6D;
                            padding: 10px;
                            font-size: 16px;
                            cursor: pointer;
                            text-align: center;">Forgot Password?</button>
                        </form>
                    </div>
                   <br><br><br><br>
                </div>
            </div>
        </div>
        <br><br>
    </div>
   

<!--Footer-->
  <div class="footer-basic">
    <footer>
      <p class="copyright" style="color: rgb(99, 98, 98);">adithyahebbar32@gmail.com</p>
       <p class="copyright" style="color: rgb(99, 98, 98);">Adithya © 2022</p>
    </footer>
</div>
</body>
</html>