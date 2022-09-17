<?php
include("db.php");
session_start();

if(!isset($_SESSION['admin']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
?>
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

#pricing .block-pricing {
  background: #fff;
  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 0 4px 0 rgba(0, 0, 0, 0.19);
  display: inline-block;
  position: relative;
  width: 100%;
  text-align: center;
}

@media (max-width: 991px) {
  #pricing .block-pricing {
    margin-bottom: 30px;
  }
}

#pricing .block-pricing .table {
  margin-bottom: 0;
  padding: 30px 15px;
  max-width: 100%;
  width: 100%;
}

#pricing .block-pricing .table h4 {
  padding-bottom: 30px;
}

#pricing .block-pricing h2 {
  margin-bottom: 30px;
}

#pricing .block-pricing ul {
  list-style: outside none none;
  margin: 10px auto;
  max-width: 240px;
  padding: 0;
}

#pricing .block-pricing ul li {
  border-bottom: 1px solid rgba(153, 153, 153, 0.3);
  padding: 12px 0;
  text-align: center;
}

#pricing .block-pricing ul li b {
  color: #3c4857;
}

#pricing .block-pricing .table .table_btn a {
  background: #71c55d;
  color: #fff;
  margin: 0;
  display: inline-block;
}

#pricing .block-pricing .table .table_btn a:hover {
  background: #55b03f;
}

#pricing .block-pricing .table .table_btn a .fa {
  font-size: 13px;
  margin-right: 5px;
}

      </style>
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
        <li><a class="nav-link active" href="admindashboard.php" style="text-decoration: none;">Home</a></li>
        <!-- <li><a class="nav-link" href="examdate.php" style="text-decoration: none;">Exam Date</a></li> -->
        <li class="dropdown"><a href="#" style="text-decoration: none;"><span>Accounts</span> 	<i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="addadmin.php" style="text-decoration: none;">Add Admin</a></li>
            <li><a href="add_faculty.php" style="text-decoration: none;">Add Faculty</a></li>
            <li><a href="add_student.php" style="text-decoration: none;">Add Student</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="adminnotification.php" style="text-decoration: none;">Notifications</a></li>
        <!--  -->
        <li class="dropdown"><a href="#" style="text-decoration: none;"><span>Account</span> 	<i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="updateadminprofile.php"  style="text-decoration: none;">Update Profile</a></li>
            <li><a href="changeadminpassword.php"  style="text-decoration: none;">Change Password</a></li>
            <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav><!-- .navbar -->

  </div>
</header>

<br><br><br><br>

<section id="pricing" class="padd-section text-center">

  <div class="container">
    <div class="row">

      <div class="col-md-6 col-lg-3">
        <div class="block-pricing">
          <div class="table">
            <h4>Admin Accounts</h4>
            <ul class="list-unstyled">
              <li><b>
                <?php 
                  $sql = "SELECT * FROM adminacc";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="addadmin.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="viewadmin.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-pricing">
          <div class="table">
            <h4>Faculty Accounts</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM faculty";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="add_faculty.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="view_faculty.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-pricing">
          <div class="table">
            <h4>Students Accounts</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM student";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="add_student.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="view_student.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-pricing">
          <div class="table">
            <h4>Departments</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM department";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="add_department.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="view_department.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Streams</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM stream";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="add_stream.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="view_stream.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Class Timetable</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM class_timetable";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn"> 
              <a href="addclasstimetable.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="classtimetable.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Exam Timetable</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM exam_timetable";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="addexamtimetable.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="examtimetable.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Exam Date</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM exam_date";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="addexamdate.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="viewexamdate.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Notes</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM notes";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="add_notes.php" class="btn"><i class="bi bi-plus-square"></i> ADD</a>
              <a href="viewnotes.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div> -->

      <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Notifications</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM notification";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="adminnotification.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
        <div class="block-pricing">
          <div class="table">
            <h4>Posts</h4>
            <ul class="list-unstyled">
              <li><b><?php 
                  $sql = "SELECT * FROM post";
                  $result = $conn->query($sql);
                  echo $result->num_rows;
                  ?></b> Records</li>
            </ul>
            <div class="table_btn">
              <a href="view_posts.php" class="btn" style="background-color: rgb(45, 186, 247);"><i class="bi bi-table"></i> View</a>
            </div>
          </div>
        </div>
      </div>
      </div></div></section>
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