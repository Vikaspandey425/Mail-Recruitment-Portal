<!DOCTYPE html>
<html>

<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>
		Login/Signup
	</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<link href="./assets/fonts/font.css" rel="stylesheet">
	<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
</head>
<style>
.box
{
	position: absolute;
	top: 50%;
	left: 50%;
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
<html lang="en">
<?php
//mysql_connect('localhost', 'root', '') or die('Could not connect the database : Username or password incorrect');
//mysql_select_db('department') or die ('No database found');
//echo 'Database Connected successfully';

mysqli_connect("localhost" , "root","","department");
?>
<body style="background-image: url('assets/images/bhu.jpg'); background-size: cover;">
	<div class="container-fluid">
		<div class="row" style="background-color:Black; padding:10px">
			<div class="col-md-9"><h3 style="color:White; margin-top:10px">Welcome to MMMUT</h3></div>
			<div class="col-md-3">
				<div class="btn-group float-right" style="margin-top:10px; margin-left:60px">
					<a class="btn btn-info" href="index.php" role="button">Home</a>
				
				</div>
			</div>
		</div>
		<div class="box">
			<h2>Admin Login</h2>
			<form method="POST" action="admin_backend.php">
				<div class="form-group">
					<label style="color: white">User Name</label>
					<input type="text" class="form-control" name="user_id" required="">
				</div>
				<div class="form-group">
					<label style="color: white">Password</label>
					<input type="password" name="password" class="form-control" required="">
				</div>
				<div class="form-group" style="margin-top:35px">
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>