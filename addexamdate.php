<?php
include("db.php");
session_start();
if(isset($_SESSION['student']))
{
    echo "<script>window.location='student.php';</script>";  
}
if(isset($_SESSION['faculty']))
{
    echo "<script>window.location='facultyhomepage.php';</script>";  
}
if(!isset($_SESSION['admin']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_POST['Submit']))
{
  
	$sql = "INSERT INTO exam_date (stream,semester,edate) VALUES ('".$_POST['stream']."','".$_POST['semester']."','".$_POST['edate']."');";
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Exam Date added Successfull');</script>";
	} else {
    echo "<script>alert('Exam Date already exists');</script>";
		// echo "Error: " . $sql . "<br>" . $conn->error;
	}
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
    </head>
    <body  style="background-color: rgb(233, 229, 229);">
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
        <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
      </ul>
    </nav><!-- .navbar -->

  </div>
</header>

<br><br><br><br>
<div style="margin: 30px;">
  <div class="container" style="border: 1px solid;border-color: rgb(233, 229, 229); background-color: white;padding: 0;">
    <h1 style="text-align: center;  font-family: Roboto, sans-serif;color:rgb(255, 252, 252);background-color: rgb(101, 189, 227);">Add Exam Date</h1>
  <form style="margin:40px" method="post">
    <div class="form-group">
      <label>Stream</label>
      <select class="form-control" name="stream" required>
        <option value="">Select Stream</option>
        <?php
        $sql="select * from stream";
        $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['stream']; ?>"><?php echo $row['stream']; ?></option>
        <?php
        }}
        ?>
        </select>
    </div>
    <div class="form-group">
      <label>Semester</label>
      <select class="form-control" name="semester" required>
      <option value="">Select Semester</option>
      <option value="1">First</option>
      <option value="2">Second</option>
      <option value="3">Third</option>
      <option value="4">Fourth</option>
        </select>
    </div>
    <div class="form-group" >
      <label>Exam Date</label>
      <input type="date" name="edate" placeholder="Enter exam date" class="form-control" required>
    </div>
    <br>
  <button href="#" class="btn btn-success" name="Submit" style="margin-left:450px">Submit</button>
  <button type="reset" class="btn btn-danger" style="margin-left:2px">Reset</button>
  <a href="admindashboard.php" class="btn btn-primary" style="margin-left:2px">Back</a>
</form>
</div>
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