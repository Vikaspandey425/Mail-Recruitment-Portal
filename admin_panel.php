<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		echo "<script>alert('Please Login First!!!');window.location='admin_login.php';</script>";
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico">
	<title>MMMUT RECRUITMENT PORTAL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<link href="css/mdb.min.css" rel="stylesheet">
	<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<link href="./assets/fonts/font.css" rel="stylesheet">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/jquery.min1.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
</head>
<style>
.box
{
	position: absolute;
	top: 45%;
	left: 52%;
	transform: translate(-50%, -50%);
	width: 400px;
	padding: 40px;
	background: rgba(0,0,0,.7);
	box-sizing: border-box;
	box-shadow: 0 15px 25px rgba(0,0,0,.5);
	border-radius: 10px;
}

.box h2
{
	margin: 0 0 30px;
	padding: 0;
	color: #fff;
	text-align: center;
}
</style>
<body style="background-image: url('assets/images/qwe.jpg'); background-size: cover;">
<div class="container-fluid">
		<div class="row" style="background-color:Black; padding:10px">
			<div class="col-md-9"><h3 style="color:White; margin-top:10px">ADMIN PANEL</h3></div>
			<div class="col-md-3">
				<div class="btn-group float-right" style="margin-top:10px; margin-left:60px">
					<a class="btn btn-danger" href="logout.php" role="button">Logout</a>
				</div>
			</div>
		</div>
        <div class="row box">
			<form action="" method="post" role="form">
				<div class="row">
					<div class="col-md-7"><h4 class="text-white">Department</h4></div>
					<div class="col-md-5">
						<select name="depart" class="form-control" required>
						<option value="" selected disabled hidden>Choose</option>
							<option value="dep1">Applied Mechanics</option>
							<option value="dep2">Biotechnology</option>
							<option value="dep3">Chemical Engineering</option>
							<option value="dep4">Chemistry</option>
							<option value="dep5">Civil Engineering</option>
							<option value="dep6">Computer Science & Engineering</option>
							<option value="dep7">Electrical Engineering</option>
							<option value="dep8">Electronics & Communication Engineering</option>
							<option value="dep9">Humanities & Social Sciences</option>
							<option value="dep10">Mathematics</option>
							<option value="dep11">Mechanical Engineering</option>
							<option value="dep12">Physics</option>
							<option value="dep13">School of Management Studies</option>
						</select>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-7"><h4 class="text-white">Post Type</h4></div>
					<div class="col-md-5">
						<select name="post_type" class="form-control" required>
						<option value="" selected disabled hidden>Choose</option>
							<option value="6000">Assistant Professor [AGP `6000/- on contract]</option>
							<option value="7000">Assistant Professor [AGP `7000/- on contract]</option>
							<option value="8000">Assistant Professor [AGP `8000/-]</option>
						</select>
					</div>
				</div><br><br>
				<div class="row">
					<div class="col">
						<input class="btn btn-primary btn-block" type="submit" value="All Candidates" formaction="retrieveDemo.php">
						<input class="btn btn-success btn-block" type="submit" value="Send Reminder(non-eligible)" formaction="sendReminder.php" onclick="return confirm('Are you sure you want to send reminder to all non eligible candidates?');">
						<input class="btn btn-info btn-block" type="submit" value="Send Call Letter(eligible)" formaction="test_mail.php" onclick="return confirm('Are you sure you want to send mail to all eligible candidates?');">
					</div>
				</div>
			</form>
        </div>
</div>

</body>
</html>