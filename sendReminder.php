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
	<title>User Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: url('assets/images/xyz2.jpg'); background-size: cover;">

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	
	<div class="container-fluid">
		<div class="row" style="background-color:Black; padding:15px">
			<div class="col-md-10"><h3 style="color:White">Send Remainder</h3></div>
			<div class="col-md-2">
				<div class="btn-group float-right">
					<a class="btn btn-info" href="admin_panel.php" role="button">Back</a>
					<a class="btn btn-danger" href="logout.php" role="button">Logout</a>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:5%">
			<div class="col-md-1"></div>
			<div class="col-md table-responsive">
			<h4> <a class="text-danger">Department : </a>
<?php
	include 'dep_name.php';
	$post=$_POST["depart"];
	echo $$post;
?>&nbsp &nbsp
<a class="text-danger">Post : </a><?php echo $_POST["post_type"]; ?></h4>
				<table class="table table-hover table-bordered">
					<thead class='thead-dark'>
						<tr>
							<!--<th>Department</th>
							<th>Applied Post</th>-->
							<th>Name</th>
							<th>User ID</th>
							<th>Email ID</th>
							<th>Mobile No.</th>
							<th>Remarks</th>
							<th>Mail Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$depart = $_POST["depart"];
							$post_type = $_POST["post_type"];
							require('function.php');
							$con = con();
							$sql = "select d.dept as depart, u.post_applied as post, u.usr_id as id, l.email as mail, u.name as name, u.mobile as mobile, r.$depart as remark1 from department d NATURAL join user u NATURAL JOIN login l NATURAL JOIN remark r WHERE (r.$depart <> 'OK' and ((d.dept = '$depart' and u.post_applied = '$post_type') and u.usr_id not in (select smd.usr_id from sent_mail_details smd where smd.dept = '$depart' and smd.post_applied = '$post_type' and (smd.cl_sent_flag='1' or smd.rem_sent_flag='1') )));";
							$result = $con->query($sql);
							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$depart = $row["depart"];
									$post = $row["post"];
									$id = $row["id"];
									$name = $row["name"];
									$remark = $row["remark1"];
									echo '<tr>';
									//echo "<td>".$row["depart"]."</td>";
									//echo "<td>".$row["post"]."</td>";
									echo "<td>".$row["name"]."</td>";
									echo "<td>".$row["id"]."</td>";
									echo "<td>".$row["mail"]."</td>";
									echo "<td>".$row["mobile"]."</td>";
									echo "<td class='table-danger'>".$row["remark1"]."</td>";
									//sending email
									$msg = "Dear $name,\nPFB the status of your application for post $post to department $depart.\n\nStatus: $remark.\n\nThanks and regards,\nDean Academics\nMNNIT ALLAHABAD\n";
									$msg = wordwrap($msg,70);
									if(mail($row["mail"],"Reminder for Application",$msg) == true)
									{
										echo "<td class='table-success'>Sent</td>";
										//updating database
										$sql = "INSERT INTO sent_mail_details VALUES ('$id', '$depart', 0, 1, '$post');";
										$con->query($sql);
									}
									else echo "<td class='table-warning'>Unable to send</td>";
									echo "</tr>";
								}
							}
							else
							{
								echo "<tr><td class='text-center' colspan='8'><div class='alert alert-danger'>No data available</div></td></tr>";
							}
							mysqli_close($con);
						?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
