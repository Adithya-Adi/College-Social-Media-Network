<?php
include("db.php");
session_start();
if(isset($_SESSION['student']))
{
    echo "<script>window.location='student.php';</script>";  
}
if(!isset($_SESSION['faculty']))
{
    echo "<script>window.location='faculty_login.php';</script>";  
}
if(isset($_SESSION['admin']))
{
    echo "<script>window.location='admindashboard.php';</script>";  
}
if(isset($_POST['Submit']))
{
	if($_FILES['profile']['name']){
    $postimg = rand() . $_FILES['profile']['name'];
    move_uploaded_file($_FILES['profile']['tmp_name'],"assets/facultydp/" . $postimg);
    }
		$sqlupd ="UPDATE faculty SET name='".$_POST['name']."', email='".$_POST['email']."',phone='".$_POST['phone']."',department='".$_POST['department']."',profile='".$postimg."' WHERE email='" . $_SESSION['faculty'] . "'";
		$qsqlupd = mysqli_query($conn,$sqlupd);
    echo mysqli_error($conn);
    if(mysqli_affected_rows($conn) == 1)
    {
						$_COOKIE['faculty']=$_POST['email'];
			$_SESSION['faculty']=$_POST['email'];
        echo "<script>alert('Profile updated successfully...');</script>";
        echo "<script>window.location='facultyhomepage.php';</script>";
    }
}
if(isset($_POST['postbtn']))
{
	$post=$_POST['postmsg'];
	$date=date("Y/m/d");
	if($_FILES['postimg']['name']){
	$postimg = rand() . $_FILES['postimg']['name'];
  move_uploaded_file($_FILES['postimg']['tmp_name'],"assets/post/" . $postimg);
	}
	$sql="select * from faculty where email='".$_SESSION['faculty']."'";
	$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
		$sql = "INSERT INTO post (name,post_img,post_msg,date,role,id) VALUES ('".$row['name']."','".$postimg."','".$post."','".$date."','faculty',".$row['faculty_id'].");";
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('Posted Successfully');</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
}

if(isset($_GET['editid']))
{
	$sqlupd ="UPDATE post SET post_like=post_like+1 where post_id=".$_GET['editid']."";
		$qsqlupd = mysqli_query($conn,$sqlupd);
    echo mysqli_error($conn);
    if(mysqli_affected_rows($conn) == 1)
    {
        // echo "<script>alert('Liked...');</script>";
        echo "<script>window.location='facultyhomepage.php';</script>";
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
	  
<style type="text/css">

	body{margin-top:20px;
		background:#eee;
	}
	
	.padding-10{
		padding:10px !important;    
	}
	
	
	/**    Page Profile
	 *************************************************** **/
	.profile-buttons {
		background-color:rgba(0,0,0,0.05);
		padding:15px;
	}
	.profile-buttons h2 {
		margin:0; padding:0;
		font-size:30px;
		line-height:30px;
	}
	.profile-btn-link {
		padding:4px 10px !important;
		margin:0 !important;
		color:#999;
	}
	.profile-activity {
		margin-top:17px;
	}
	.profile-activity h6 {
		margin-bottom:6px;
		padding-left:15px;
		font-weight:bold;
	}
	.profile-activity p {
		font-size:13px;
		padding-left:15px;
	}
	
	.page-profile h6 {
		color:#999;
		font-size: 1em;
		letter-spacing: normal;
		line-height: 18px;
		margin: 0 0 6px 0;
	}
	.page-profile div.tabs ul.nav-tabs li.active a,
	.page-profile .tab-content {
		background-color:#fff !important;
	}
	
	
	/** Comments
	 *************************************************** **/
	#comments {
		margin-top:60px;
	}
	#comments .comment {
		margin:40px 0;
	}
	#comments a.replyBtn {
		float:right;
		font-size:11px;
		text-transform:uppercase;
	}
	#comments span.user-avatar {
		background:#eee;
		width:64px; height:64px;
		float:left;
		margin-right:10px;
	}
	
	ul.comment {
		margin-bottom:30px;
	}
	li.comment {
		position:relative;
		margin-bottom:25px;
		font-size:13px;
	}
	li.comment p {
		margin:0; padding:0;
	}
	li.comment img.avatar {
		position:absolute;
		left:0; top:0;
		display:inline-block;
	}
	li.comment.comment-reply img.avatar {
		left:6px; top:6px;
	}
	li.comment .comment-body {
		position:relative;
		padding-left:60px;
	}
	li.comment.comment-reply {
		margin-left:60px;
		background-color:#fafafa;
		padding:6px;
		margin-bottom:6px;
	}
	li.comment a.comment-author {
		margin-bottom:6px;
		display:block;
	}
	li.comment a.comment-author span {
		font-size:15px;
	}

	time.datebox strong {
		padding: 2px 0;
		color: #fff;
		background-color:#1c2b36;
		display:block;
		text-align:center;
	}
	time.datebox span {
		font-size: 15px;
		color: #2f2f2f;
		display:block;
		text-align:center;
	}
	
	
	
	/**    17. Panel
	 *************************************************** **/
	/* pannel */
	.panel {
		position:relative;
	
		background:transparent;
	
		-webkit-border-radius: 0;
		   -moz-border-radius: 0;
				border-radius: 0;
	
		-webkit-box-shadow: none;
		   -moz-box-shadow: none;
				box-shadow: none;
	}
	.panel.fullscreen .accordion .panel-body,
	.panel.fullscreen .panel-group .panel-body {
		position:relative !important;
		top:auto !important;
		left:auto !important;
		right:auto !important;
		bottom:auto !important;
	}
		
	.panel.fullscreen .panel-footer {
		position:absolute;
		bottom:0;
		left:0;
		right:0;
	}
	
	
	.panel>.panel-heading {
		text-transform: uppercase;
	
		-webkit-border-radius: 0;
		   -moz-border-radius: 0;
				border-radius: 0;
	}
	.panel>.panel-heading small {
		text-transform:none;
	}
	.panel>.panel-heading strong {
		font-family:Arial,Helvetica,Sans-Serif;
	}
	.panel>.panel-heading .buttons {
		display:inline-block;
		margin-top:-3px;
		margin-right:-8px;
	}
	.panel-default>.panel-heading {
		padding: 15px 15px;
		background:#fff;
	}
	.panel-default>.panel-heading small {
		color:#9E9E9E;
		font-size:12px;
		font-weight:300;
	}
	.panel-clean {
		border: 1px solid #ddd;
		border-bottom: 3px solid #ddd;
	
		-webkit-border-radius: 0;
		   -moz-border-radius: 0;
				border-radius: 0;
	}
	.panel-clean>.panel-heading {
		padding: 11px 15px;
		background:#fff !important;
		color:#000;	
		border-bottom: #eee 1px solid;
	}
	.panel>.panel-heading .btn {
		margin-bottom: 0 !important;
	}
	
	.panel>.panel-heading .progress {
		background-color:#ddd;
	}
	
	.panel>.panel-heading .pagination {
		margin:-5px;
	}
	
	.panel-default {
		border:0;
	}
	
	.panel-light {
		border:rgba(0,0,0,0.1) 1px solid;
	}
	.panel-light>.panel-heading {
		padding: 11px 15px;
		background:transaprent;
		border-bottom:rgba(0,0,0,0.1) 1px solid;
	}
	
	.panel-heading a.opt>.fa {
		display: inline-block;
		font-size: 14px;
		font-style: normal;
		font-weight: normal;
		margin-right: 2px;
		padding: 5px;
		position: relative;
		text-align: right;
		top: -1px;
	}
	
	.panel-heading>label>.form-control {
		display:inline-block;
		margin-top:-8px;
		margin-right:0;
		height:30px;
		padding:0 15px;
	}
	.panel-heading ul.options>li>a {
		color:#999;
	}
	.panel-heading ul.options>li>a:hover {
		color:#333;
	}
	.panel-title a {
		text-decoration:none;
		display:block;
		color:#333;
	}
	
	.panel-body {
		background-color:#fff;
		padding: 15px;
	
		-webkit-border-radius: 0;
		   -moz-border-radius: 0;
				border-radius: 0;
	}
	.panel-body.panel-row {
		padding:8px;
	}
	
	.panel-footer {
		font-size:12px;
		border-top:rgba(0,0,0,0.02) 1px solid;
		background-color:rgba(0255,255,255,1);
	
		-webkit-border-radius: 0;
		   -moz-border-radius: 0;
				border-radius: 0;
	}
	
	
	
	/** Bullet List
	 *************************************************** **/
	ul.bullet-list li {
		position: relative;
		padding: 0 0 0 20px;
		margin: 0 0 10px;
	}
	ul.bullet-list li:before {
		border: 6px solid #cccccc;
		border-radius: 100px;
		content: '';
		display: inline-block;
		left: 0;
		margin: 0;
		position: absolute;
		top: 5px;
		z-index: 2;
	}
	ul.bullet-list li.red:before {
		border-color: #d64b4b;
	}
	ul.bullet-list li.green:before {
		border-color: #4dd79c;
	}
	ul.bullet-list li.blue:before {
		border-color: #0090d9;
	}
	ul.bullet-list li.orange:before {
		border-color: #E2A917;
	}
	ul.bullet-list li h3 {
		display: block;
		font-weight: 700;
		font-size: 14px;
		font-size: 1.4rem;
		line-height: 1.4;
		color: #171717;
		margin:0; padding:0;
	}
	
	
	/** Date Box
	 *************************************************** **/
	time.datebox {
		font-size: 14px;
		display: block;
		position: relative;
		width: 35px;
		border-color:#2E363F;
		background-color: #fff;
		margin: 3px auto;
		border:1px solid;
	}
	</style>
</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center" style="padding:0px">
        <div class="container d-flex align-items-center justify-content-between" >
    
          <div id="logo" style="margin-right:300px;">
            <h1><a href="#"><span>Reach</span> Me</a></h1>
          </div>
          <nav id="navbar" class="navbar">
            <ul style="margin-top: 20px;">
              <li><a class="nav-link active" href="facultyhomepage.php" style="text-decoration: none;">Home</a></li>
              <!-- <li><a class="nav-link" href="examdate.php" style="text-decoration: none;">Exam Date</a></li> -->
							<li class="dropdown"><a href="#" style="text-decoration: none;"><span>Time table</span> 	<i class="bi bi-chevron-down"></i></a>
								<ul>
									<li><a href="addexamtimetable.php" style="text-decoration: none;">Add Exam timetable</a></li>
									<li><a href="examtimetable.php" style="text-decoration: none;">View Exam timetable</a></li>
									<li><a href="addclasstimetable.php" style="text-decoration: none;">Add Class timetable</a></li>
									<li><a href="classtimetable.php" style="text-decoration: none;">View Class timetable</a></li>
								</ul>
							</li>
        			<li><a class="nav-link" href="sendnotification_faculty.php" style="text-decoration: none;">Send Notifications</a></li>
							
							<li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
            </ul>
          </nav><!-- .navbar -->
    
        </div>
      </header>
        <br><br><br><br>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="page-profile">
	<div class="row" style="background-color: rgb(233, 229, 229);">
	<?php
						$sqledit = "SELECT * FROM faculty WHERE email='" . $_SESSION['faculty'] . "'";
						$qsqledit = mysqli_query($conn,$sqledit);
						$rsedit = mysqli_fetch_array($qsqledit);
						?>
		<!-- COL 1 -->
		<div class="col-md-3" style="overflow:scroll; height:580px;">
			<section class="panel">
				<div class="panel-body noradius padding-10">
					<figure class="margin-bottom-10"><!-- image -->
						<img class="img-responsive" src="./assets/facultydp/<?php echo $rsedit['profile']?>" alt="">
					</figure><!-- /image -->

					<!-- progress bar -->
					
					<!-- updated -->
					<ul class="list-unstyled size-13" style="margin-left: 10px;">
						<li class="text-gray">
							<!-- <i class="fa fa-check"></i>  -->
							<h3 class="text-black">
							<?php echo $rsedit['name']; ?> 
								</h3></li>
						<li class="text-gray"> <?php echo $rsedit['department']; ?> </li>
						<li><?php echo $rsedit['phone']; ?> </li>
						<li><?php echo $_COOKIE['faculty']; ?> </li>
					</ul><!-- /updated -->
					<div style="background-color: rgb(101, 215, 247);">
					<hr class="half-margins" style="margin-bottom: 0px;">
					<h5 class="text-black" style="margin-left: 70px;">
						Update Profile
						</h5> 
					<hr class="half-margins" style="margin-top: 0px;">
				</div>
					<!-- About -->
					<!-- <h3 class="text-black">
						Melisa Doe 
						<small class="text-gray size-14"> / CEO</small>
					</h3> -->
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Profile:</label>
							<input type="file" class="form-control" name="profile" id="profileid">
						</div>
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" name="name" placeholder="Enter Username" id="username">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" class="form-control" name="email" placeholder="Enter Username" id="username">
						</div>
						<!-- <div class="form-group">
							<label>Address:</label>
							<textarea  class="form-control" placeholder="Enter Address"></textarea>
						</div> -->
						<div class="form-group">
							<label>Phone:</label>
							<input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number">
						</div>
						<div class="form-group">
						<label>Department</label>
						<select class="form-control" name="department">
        <option value="">Select Stream</option>
        <?php
        $sql="select * from department";
        $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
        <?php
        }}
        ?>
        </select>
					</div>
					<button class="btn btn-primary" name="Submit" style="margin-left: 80px;">Update</button>
					</form>
				
		
					<hr class="half-margins">
					<!-- Social -->
					
				</div>
			</section>
		</div><!-- /COL 1 -->

		<!-- COL 2 -->
		<div class="col-md-5" style="overflow:scroll; height:580px;">

			<div class="tabs white nomargin-top">

				<div class="tab-content">

					<!-- Overview -->
					<div id="overview" class="tab-pane active">
						<form class="well" action="" method="POST" enctype="multipart/form-data">
							<textarea rows="2" class="form-control" name="postmsg" placeholder="What's on your mind?"></textarea><br>
							<div class="margin-top-10">
								<img id="output" width="100px"><br><br>
								<a href="#" class="btn btn-link profile-btn-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Photo" onclick="document.getElementById('file').click();"><i class="fa fa-camera"></i></a>
								<input type="file" name="postimg" id="file" onchange="loadFile(event)" hidden>
								<button type="submit" name="postbtn" class="btn btn-sm btn-primary pull-right">Post</button>
							</div>
						</form>
					
						<hr class="invisible half-margins">
						<!-- COMMENT -->
						<?php
						$sql ="SELECT * FROM post  order by post_id desc";
						$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['role']=='faculty')
						{
							$sqledit="select * from faculty where faculty_id=".$row['id'].";";
						}
						else
						{
							$sqledit="select * from student where student_id=".$row['id'].";";
						}
						$qsqledit = mysqli_query($conn,$sqledit);
						$rsedit = mysqli_fetch_array($qsqledit);
						if($rsedit['profile']==="")
						{
							$img="default.jpg";
						}
						else
						{
							$img=$rsedit['profile'];
						}
						?>
						<ul class="comment list-unstyled padding-10">
							<li class="comment">
								<!-- avatar -->
								<?php
								if($row['role']=='faculty')
								{
								?>
								<img class="avatar" src="./assets/facultydp/<?php echo $img?>" width="50" height="50" alt="avatar">
								
								<?php
								}
								else {
								?>
								<img class="avatar" src="./assets/studentdp/<?php echo $img?>" width="50" height="50" alt="avatar">
								
								<?php
								}
								?>
								<!-- comment body -->
								<div class="comment-body"> 
									<a href="#" class="comment-author" style="text-decoration:none;">
										<small class="text-muted pull-right"> <?php echo $row['date']?> </small>
										<span><?php echo $row['name']?></span>
									</a>
									<p>
									<?php echo $row['post_msg']?> <br>
									<center><?php
									if($row['post_img'])
									{
									?>
									<img src="./assets/post/<?php echo $row['post_img']?>" width="250px" height="200px"></center>
										<?php
									}
									?>
								</p>
								</div><!-- /comment body -->

								<!-- options --><br>
								<ul class="list-inline size-11 margin-top-10">
									<!-- <li>
										<a href="#" class="text-info"><i class="fa fa-reply"></i> Reply</a>
									</li> -->
									<span class="text-success"><?php echo $row['post_like']?></span>
									<li>
										<a href="facultyhomepage.php?editid=<?php echo $row['post_id'];?>" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
									</li>
									<!-- <li>
										<a href="#" class="text-muted">Show All Comments (36)</a>
									</li> -->
									<li >
										<!-- <a href="#" class="text-danger">Edit </a> -->
									</li>
									<li>
										<!-- <a href="#" class="text-primary">Delete</a> -->
									</li>
								</ul>
							</li><!-- /options -->	
						</ul>
						<!-- /COMMENT -->
<hr>

<?php
}
}
?>
		<!-- COMMENT -->
		<!-- /COMMENT -->
					</div>

				</div>
			</div>

		</div><!-- /COL 2 -->

		<!-- COL 3 -->
		<div class="col-md-4" style="overflow:scroll; height:580px;right:0px">
			<!-- projects -->
		

				
			</section>
			<!-- /projects -->
<br>
			<!-- activity -->

			<section class="panel panel-default">
				<header class="panel-heading">
					<h2 class="panel-title elipsis">
						<i class="fa fa-rss"></i> Notifications
					</h2>
				</header>

				<div class="panel-body noradius padding-10">
					<!-- activity list -->
					<div class="row profile-activity">
						<!-- activity item -->
						<?php
						$sql="select * from notification";
						$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$date = date($row['date']);
							$day = date('d', strtotime($date));
							$month = date('M', strtotime($date));
						?>
						<div class="col-xs-2 col-sm-1">
							<time datetime="2014-06-29" class="datebox">
								<strong><?php echo $month;?></strong>
								<span><?php echo $day;	?></span>
							</time>
						</div>

						<div class="col-xs-1 col-sm-10">
							<h6><?php echo $row['name'];?></h6>
							<p>
							<?php echo $row['notification'];?>
							</p>
						</div>
						<!-- /activity item -->
						
						<div class="col-sm-12">
							<hr class="half-margins">
						</div>
						<?php
						}
					}
						?>
						<!-- /activity separator -->
							<!-- /activity item -->

						<!-- /activity separator -->
						
						<!-- paginatoin -->
						<!-- <div class="text-center">
							<ul class="pagination pagination-sm">
								<li class="disabled"><a href="#">Prev</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>													
						</div> -->
						<!-- /paginatoin -->
					</div>
					<!-- /activity list -->
				</div>
			</section>
			<!-- /activity -->
		</div><!-- /COL 3 -->
	</div>
</div>
</div>

<div class="footer-basic">
	<footer>
		<p class="copyright" style="color: rgb(99, 98, 98);">adithyahebbar32@gmail.com</p>
		<p class="copyright" style="color: rgb(99, 98, 98);">Adithya © 2022</p>
	</footer>
</div>



</body>

</html>
<!-- <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        };
</script> -->

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) 
    }
  };
</script>