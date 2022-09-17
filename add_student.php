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
  if($_POST['password']==$_POST['cpassword'])
  {
  if($_FILES['postimg']['name']){
    $postimg = rand() . $_FILES['postimg']['name'];
    move_uploaded_file($_FILES['postimg']['tmp_name'],"assets/studentdp/" . $postimg);
    }
	$sql = "INSERT INTO student (name, email,phone,stream,password,profile)
	VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['stream']."','".$_POST['password']."','".$postimg."');";
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Student added Successfull');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else
{
  echo "<script>alert('Password and Confirm Password Missmatch....');</script>";
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
    <h1 style="text-align: center;  font-family: Roboto, sans-serif;color:rgb(255, 252, 252);background-color: rgb(101, 189, 227);">Student</h1>
  <form style="margin:40px" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label>Profile</label>
      <input type="file" placeholder="Enter Username" name="postimg" class="form-control" required>
    </div>  
  <div class="form-group">
      <label>Username</label>
      <input type="text" placeholder="Enter Username" name="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" placeholder="Enter Email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Phone</label>
      <input type="number" placeholder="Enter Phone Number" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Stream</label>
      <select class="form-control" name="stream">
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
      <label>Password</label>
      <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" placeholder="Enter Confirm Password" name="cpassword" class="form-control" required>
    </div>
    <!-- <div class="form-group">
      <label>Status</label>
      <select class="form-control">
      <option value="">Select Status</option>
      <option>Active</option>
      <option>Inactive</option>
      </select>
      </div> -->
    <br>
  <button class="btn btn-success" name="Submit" style="margin-left:450px">Submit</button>
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