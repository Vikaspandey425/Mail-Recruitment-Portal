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
	<!--<link href="./assets/css/main.css" rel="stylesheet">
	<link href="./assets/css/style.css" rel="stylesheet">-->
	<link href="./assets/fonts/font.css" rel="stylesheet">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/jquery.min1.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('assets/images/xyz1.jpg'); background-size: cover;">
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
<h4> <a class="text-primary">Department : </a><?php
	include 'dep_name.php';
	$post=$_POST["depart"];
	echo $$post;
?>&nbsp &nbsp
<a class="text-primary">Post : </a><?php echo $_POST["post_type"]; ?></h4>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">User ID</th>
      <th scope="col">Email ID</th>
	  <th scope="col">Mobile</th>
	  <th scope="col">Remark</th>
	  <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
   
   <?php

$depart = $_POST["depart"];
$post_type = $_POST["post_type"];
//include funtion.php file
require('function.php');
$con = con();




// queries for schedule
$sql6000 = "SELECT s6.dow as dow, s6.vow as vow, s6.dop as dop, s6.vop as vop, s6.doi as doi, s6.voi as voi  
FROM schedule_6000 s6 WHERE s6.dept = '$depart';";

$sql7000 = "SELECT s6.dow as dow, s6.vow as vow, s6.dop as dop, s6.vop as vop, s6.doi as doi, s6.voi as voi  
FROM schedule_6000 s6 WHERE s6.dept = '$depart';";

$sql8000 = "SELECT s6.dow as dow, s6.vow as vow, s6.dop as dop, s6.vop as vop, s6.doi as doi, s6.voi as voi  
FROM schedule_6000 s6 WHERE s6.dept = '$depart';";


$SrNo = 679;
$Dated = date("Y/m/d");   //'February 01, 2018';
$name = 'Amit Mishra';
//$post_type = 'Assistant Professor [AGP `6000/- on contract]';
//$depart = 'Department of Electronics & Communication Engineering';
$dow = '17-04-2019';
$vow = 'Department of Electronics and Communication Engineering.';
$dop = '18-04-2019';
$vop = 'Department of Electronics & Communication Engineering';
$doi = '18-04-2019';
$voi = 'Executive Development Centre (EDC), MNNIT Allahabad';


if($post_type == '6000')
{
	$res2 = $con->query($sql6000);
	$row6000 = $res2->fetch_assoc();

	$dow = $row6000["dow"];
	$vow = $row6000["vow"];
	$dop = $row6000["dop"];
	$vop = $row6000["vop"];
	$doi = $row6000["doi"];
	$voi = $row6000["voi"];
}

else if($post_type == '7000')
{
	$res2 = $con->query($sql7000);
	$row7000 = $res2->fetch_assoc();

	$dop = $row7000["dop"];
	$vop = $row7000["vop"];
	$doi = $row7000["doi"];
	$voi = $row7000["voi"];
}
else
{
	$res2 = $con->query($sql8000);
	$row8000 = $res2->fetch_assoc();

	$dop = $row8000["dop"];
	$vop = $row8000["vop"];
	$doi = $row8000["doi"];
	$voi = $row8000["voi"];
}

	//headers for mail
	$subject = 'Selected for Interview';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: <recruitment@mnnit.ac.in>' . "\r\n";
    $headers .= 'Cc: noreply@mnnit.ac.in' . "\r\n";

    
    $msg = '

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>

<body>

<img src="/var/www/html/MMMUT_Recruitment_2018.jpg" alt="Madan Mohan Malaviya University of Technology, Gorakhpur" width="1260" height="200"/> <br> ';

$msg1 = '<strong>Subject</strong>  :  	 Written Test, Presentation and Interview for the post of <strong>' . $post_type . '</strong> in the <strong> ' . $depart . '</strong>. <br><br>

Sir / Madam, <br><br>
This is in reference to your application received in this office for the post of <strong> '. $post_type .' </strong> against <strong>Advertisement 04/2017, dated 21.09.2017</strong>.  You are requested to present yourself at the Institute for participation in the Selection Process as per the details given below:<br><br>

<table align="center" style="width:90%">
  
  <tr>
    <th>Selection Process</th>
    <th>Reporting Date and Time</th>
    <th>Reporting Venue</th>
  </tr>';


//Add one extra row for 6000, date and venue of Written test
if($post_type ==  '6000')
{ 
  $msg1 .= '
  <tr>
    <td>Written Test</td>
    <td>' . $dow . ' from 9.00 A.M. </td>
    <td> ' . $vow . '</td>
  </tr> ';
}

$msg1 .= '

  <tr>
    <td>Presentation<br>
(only for Short-listed candidates on the basis of Written Test)</td>
    <td>' . $dop . ' from 2.00 P.M. onwards </td>
    <td>' . $vop . ' .</td>
  </tr>
  
  <tr>
    <td>Interview<br>
(only for Short-listed candidates on the basis of Written Test)</td>
    <td>' . $doi . ' from 9.00 A.M. onwards </td>
    <td>' . $voi . '.</td>
  </tr>
  
</table>

<br> <br>';

$msg2 = '<!--After table list start from 1 -->
<ol type="1">

<li>
  
    <ol type="i"> <li>
       <strong>Written Test</strong> shall be of 01 Hour (60 minutes) duration. The Written Test is only meant to shortlist candidates to be called for presentation & Interview. The performance of Written Test will not carry any weightage in Interview for final selection. Test will be an objective type test within GATE syllabus and will cover the broad curriculum being taught by the department. <br> 
    </li>
    
    <li>
       <strong>Presentation (only for Short-listed candidates on the basis of Written Test):</strong> Time allotted for presentation is maximum 10 minutes, to be followed by Q&A session, if required. For the presentation, you will be required to choose a topic from the Subject/ Specialization/ field of your interest. Also, the presentation should include (a) two slides regarding your academic and experience background,(b) one slide bringing out WHY your profile is suitable for the faculty position in MNNIT Allahabad. For detailed information about the Institute, you may visit our Institute website <a href="http://www.mnnit.ac.in">www.mnnit.ac.in</a>. Please bring a hard copy of your presentation for submission.<br>  
    </li>

    <li>
       <strong>Personal Interview (only for Short-listed candidates on the basis of Written Test & who appear for Presentation).</strong> <br> <br> 
    </li> </ol>

</li>

<!--List 2 -->
<li>
   You are required to bring the following documents in original along with one set of Photocopy of the same for verification/submission: <br> 

    <ol type="i"> <li>
       All certificates and mark-sheets in original commencing from High School/Higher Secondary. <br> 
    </li>
    
    <li>
       Documents in support/proof of experience and salary drawn. <br> 
    </li>

    <li>
       Valid Certificate of OBC [Non-Creamy layer]/SC/ST/PWD category [if applicable], as claimed by you, in the format applicable for employment in Central Government organisations (Refer advertisement). <strong><u>OBC certificate issued on or after 1st April, 2017 shall only be considered for reservation under OBC (Non-Creamy Layer) category.</u></strong> <br> 
    </li>

    <li>
       Reprint of your research publications, reports, projects, thesis supervision, patent etc., as mentioned by you in your application. <br> 
    </li>

    <li>
       If you are in service with any of the government organisations / autonomous bodies / corporations / statutory bodies etc., <strong>&ldquo; No-Objection Certificate [NOC]&rdquo;</strong> from your present employer [or copy of the forwarding letter in case your application is forwarded through proper channel] is required, failing which you will neither be allowed to appear in the interview nor be entitled for reimbursement of TA. <br>  <br> 
    </li> </ol>
</li>

<!--List 3 -->
<li>
   Please note that your candidature is purely provisional and is subject to verification and submission of essential documents. You are advised to bring all the original documents (Qualification certificates, minimum experience, category certificates/ other certificates and relevant documents etc.) pertaining to your claim as prescribed for the position announced in the advertisement and if you are found ineligible at any stage, your candidature will be cancelled at any stage of the recruitment process and no claim whatsoever, will be entertained. <br>  <br> 
</li>

<!--List 4 -->
<li>   
   Applicants must fully satisfy themselves about their eligibility as prescribed in the referred advertisement, before appearing in the WrittenTest/ Presentation & Interview. If an applicant is inadvertently allowed to appear in Written Test/ Presentation & Interview, who otherwise does not fulfil the minimum eligibility requirements, he/she cannot, at a later date, use that as a right to claim that he/she meets the eligibility requirements. The Institute reserves the right not to allow a candidate to appear in Written Test / Presentation & Interview, if it is found that: <br> 

    <ol type="i"> <li>
       Minimum eligibility requirements are not fulfilled. <br> 
    </li>

    <li>
       False documentation has been done. <br> 
    </li>

    <li>
       Any other similar valid reason. <br>  <br> 
    </li> </ol>

</li>    

<!--List 5 -->
<li>
   Those who appear for Interview will be reimbursed upto AC II return train fare, from the address mentioned in your application or the place of journey, whichever is less, to the Institute, on submission of tickets of both way journey. However, no DA or conveyance shall be paid. No fare will be paid to the candidates who appear for Written Test but do not qualify to appear in the Presentation & Interview. <br>  <br> 
</li>

<!--List 6 -->
<li>
   You have to make your own arrangement for stay. You may have to stay for an additional day, if required.  <br>  <br> 
</li>

<!--List 7 -->
<li>
   Any corrigendum/changes/updates shall be made available only on the Institute website: www.mnnit.ac.in. The candidates are advised to keep visiting the Institute’s website regularly for updates, if any. No individual communication will be done. <br>  <br> 
</li>

<!--List 8 -->
<li>
   The Institute reserves right to not to fill the vacancy/vacancies and no correspondence in this regard will be entertained. <br>  <br> 
</li>

<!--List 9 -->
<li>
   Canvassing in any from and/or bringing any influence, political, or otherwise, will be treated as a disqualification for the post applied for. <br>  <br> 
</li>

<!--List 10 -->
<li>
   No request for change in date/time of Written Test / Presentation & Interview will be entertained.  <br>  <br> 
</li>

</ol>

You are required to report atleast one hour before the time of Written Test / Presentation/ Interview. <br>  <br> 

Yours, <br> 

<strong>Sarvesh K. Tiwari</strong>
<br> <br>
</body>
</html>';



// Perform queries
$sql = "select d.dept as depart, u.post_applied as post, u.usr_id as id, l.email as mail, u.name as name, u.mobile as mobile, r.$depart 
as remark1 from department d NATURAL join user u NATURAL JOIN login l NATURAL JOIN remark r WHERE (r.$depart = 'OK' and 
((d.dept = '$depart' and u.post_applied = '$post_type') and u.usr_id not in (select smd.usr_id from sent_mail_details smd where 
smd.dept = '$depart' and smd.post_applied = '$post_type' and smd.cl_sent_flag = '1' )));";

$result = $con->query($sql);
$i=1;
if($result->num_rows > 0)
{
		while($row = $result->fetch_assoc())
		{
			//$depart = $row["depart"];
			//$post = $row["post"];
			$name = $row["name"];
			$id = $row["id"];
			$mobile = $row["mobile"];
			$mail = $row["mail"];
			$remark = $row["remark1"];
			if ($row["remark1"]!='OK')
			{
				echo "<tr class='bg-danger'>";
			}
			else echo "<tr class='bg-success'>";
			//echo "<td>".$row["depart"]."</td>";
			//echo "<td>".$row["post"]."</td>";
			echo "<td><b>".$i."</b></td>";
			echo "<td><b>".$row["name"]."</b></td>";
			echo "<td><b>".$row["id"]."</b></td>";
			echo "<td><b>".$row["mail"]."</b></td>";
			echo "<td><b>".$row["mobile"]."</b></td>";
			echo "<td><b>".$row["remark1"]."</b></td>";
//----------------------------------------//
//send mail	

$msg .= 'No. ' . $SrNo. ' /Recruitment Cell/2018 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dated: ' . $Dated . '<br> <br> <br>';  


$msg .= '
To, <br>
<strong>Dr. ' . $name . ' </strong> <br> <br>';

$msg .= $msg1 . $msg2;

    // use wordwrap() if lines are longer than 70 characters
    //$msg = wordwrap($msg,70);

    if(mail($mail, $subject, $msg, $headers) == true)
    {
	//echo "<br>Mail to " . $mail . " sent successfully!<br><br>";
	echo "<td class='bg-success'><b>Mail Sent</b></td>";
	$sql = "DELETE FROM sent_mail_details where usr_id = '$id' and dept = '$depart';";
	$con->query($sql);
	
	$sql = "INSERT INTO sent_mail_details VALUES ('$id', '$depart', 1, 1, '$post_type');";
	$con->query($sql);
    }
    else
    {
	  echo "<td class='bg-danger'><b>Unable to send.</b></td>";
	  //echo "<br>Mail to " . $mail . " could not sent!<br><br>";
    }
//-------------------------------------------//			
			
			echo "</tr>";
			$i++;
					


  }//while loop
  
}//if block
else {
    echo "0 results";
}

mysqli_close($con);

?>
  
  </tbody>
</table>
</body>
</html>
