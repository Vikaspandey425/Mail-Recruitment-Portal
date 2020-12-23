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
	<link href="./assets/css/adminpanel.css" rel="stylesheet">
	<link href="./assets/fonts/font.css" rel="stylesheet">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/jquery.min1.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('assets/images/plm.jpg'); background-size: cover;">
<div class="container-fluid">
<div class="row" style="background-color:Black; padding:10px">
			<div class="col-md-10"><h3 style="color:White">User Details</h3></div>
			<div class="col-md-2">
				<div class="btn-group float-right" style="margin-top:10px; margin-left:60px">
					<a class="btn btn-info" href="admin_panel.php" role="button">Back</a>
					<a class="btn btn-danger" href="logout.php" role="button">Logout</a>
				</div>
			</div>
		</div>

<br><br>



<h4> <a class="text-danger">Department : </a>
<?php
	include 'dep_name.php';
	$post=$_POST["depart"];
	echo $$post;
?>&nbsp &nbsp
<a class="text-danger">Post : </a><?php echo $_POST["post_type"]; ?></h4>
<!--<h5>Department : <?php echo $_POST["depart"]; ?>&nbsp;&nbsp;&nbsp;
Post:  <?php echo $_POST["post_type"]; ?></h5>-->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">User ID</th>
      <th scope="col">Email ID</th>
	  <th scope="col">Mobile</th>
	  <th scope="col">Remark</th>
    </tr>
  </thead>
  <tbody>

	<?php

							$depart = $_POST["depart"];
							$post_type = $_POST["post_type"];
							require('function.php');
							$con = con();
							$sql = "select d.dept as depart, u.post_applied as post, u.usr_id as id, l.email as mail, u.name as name, 
							l.phone as mobile, r.$depart as remark1 from department d NATURAL join user u NATURAL JOIN login l 
							NATURAL JOIN remark r WHERE d.dept = '$depart' and u.post_applied = '$post_type';";
							$result = $con->query($sql);
							$i=1;
							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									
									if ($row["remark1"]!='OK')
									{
										echo "<tr style='background-color:#fc6c6c;'>";
									}
									else echo "<tr style='background-color:#a5fc8f;'>";
									
									//echo "<td>".$row["depart"]."</td>";
									//echo "<td>".$row["post"]."</td>";
									echo "<td><b>".$i."</b></td>";
									echo "<td><b>".$row["name"]."</b></td>";
									echo "<td><b>".$row["id"]."</b></td>";
									echo "<td><b>".$row["mail"]."</b></td>";
									echo "<td><b>".$row["mobile"]."</b></td>";
									echo "<td><b>".$row["remark1"]."</b></td>";
									//echo "<td><a href=\"edit.php?id=$row['id']\">Edit</a></td><td><a href=\"delete.php?id=$row['id']\">Delete</a></td>";
									echo "</tr>";
									$i++;
								}
							}
							else
							{
								echo "<tr><td class='text-center' colspan='7'><div class='alert alert-danger'>No data available</div></td></tr>";
							}
							mysqli_close($con);
						?>
     	
  </tbody>
</table>
</body>
</html>
