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
    </head>
    <body style="background-color: rgb(233, 229, 229);">
<header id="header" class="header fixed-top d-flex align-items-center" style="padding:0px">
  <div class="container d-flex align-items-center justify-content-between">

    <div id="logo" style="padding:20px">
      <h1><a href="#"><span>Reach</span> Me</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" title="" /></a>-->
    </div>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link active" href="student.php" style="text-decoration: none;">Home</a></li>
        <li><a class="nav-link" href="examdate.php" style="text-decoration: none;">Exam Date</a></li>
        <li class="dropdown"><a href="#" style="text-decoration: none;"><span>Time table</span> 	<i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="examtimetable.php" style="text-decoration: none;">Exam timetable</a></li>
            <li><a href="classtimetable.php" style="text-decoration: none;">Class timetable</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="notification.php" style="text-decoration: none;">Notifications</a></li>
        <li><a class="nav-link" href="notes.php" style="text-decoration: none;">Notes</a></li>
        <li class="dropdown"><a href="#" style="text-decoration: none;"><span>Account</span> 	<i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="updateadminprofile.php"  style="text-decoration: none;">Update Profile</a></li>
            <li><a href="changepassword.php"  style="text-decoration: none;">Change Password</a></li>
            <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav><!-- .navbar -->

  </div>
</header>

<br><br><br><br>
<div style="margin: 30px;">
  <div class="container" style="border: 1px solid;border-color: rgb(233, 229, 229); background-color: white;padding: 0;">
    <h1 style="text-align: center;  font-family: Roboto, sans-serif;color:rgb(255, 252, 252);background-color: rgb(101, 189, 227);">Notes</h1>
  <form style="margin:40px">
<div class="form-group">
<label>Stream</label>
<select class="form-control">
<option value="">Select Stream</option>
<option>MCA</option>
<option>BE</option>
</select>
</div>
<div class="form-group">
  <label>Semester</label>
  <select class="form-control">
  <option value="">Select Semester</option>
  <option>First</option>
  <option>Second</option>
  </select>
  </div><br>
  <a href="viewnotes.php" class="btn btn-success" style="margin-left:450px">Submit</a>
  <a onclick="window.history.back()" class="btn btn-danger" style="margin-left:2px">Back</a>

</form>
</div>
</div>
<br><br>
<!--Footer-->
<div class="footer-basic">
  <footer>
      <p class="copyright" style="color: rgb(99, 98, 98);">adithyahebbar32@gmail.com</p>
     <p class="copyright" style="color: rgb(99, 98, 98);">Adithya © 2022</p>
  </footer>
</div>
</body>
</html>