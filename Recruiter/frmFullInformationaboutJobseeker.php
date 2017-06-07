<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_GET['ID'];
	$getStudentByID = mysqli_query($con, "SELECT * FROM tbl_jobseekeracademicdetails WHERE JobSeekerID='$id'");
	$row = mysqli_fetch_array($getStudentByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter - View Student Information</title>
<link rel="stylesheet" type="text/css" href="../_assets/css/style2.css" />
</head>

<body>
<div id="header"></div>
<div id="section">
<div id="statusbar">
<div class="welcome-text">Welcome <?php
	if(isset($_SESSION['username']))
	{
    echo "<span>" .$_SESSION['username']. "</span>";
	}
	else
	{
		echo "<span>Guest</span>";
	}
	?></div>
<div class="drop">
<ul class="drop_menu">
<li><a href='recruiter_panel.php'>Home</a></li>
<li><a href='frmRecruiterUpdateProfile.php'>Update Profile</a></li>
<li><a href='frmRecruiterProfileSettings.php'>A/c Settings</a></li>
<li><a href='frmAddJobs.php'>Add Job</a></li>
<li><a href='frmViewJobs.php'>View Jobs</a></li>
<li><a href='frmJobSeekerResponseToRecruiter.php'>Response</a></li>
<li><a href="../logout.php">Logout</a></li>
</ul>
</div>
<!--
<div class="page-name">Page name</div>-->
</div>
<div id="innersection">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table cellspacing="2" cellpadding="5" style="border-collapse:collapse; width:400px; margin-left:auto; margin-right:auto;">
<tr>
<td colspan="2"><h3 style="text-align:center">Academic Details</h3></td>
</tr>
<tr>
<td><label class="labels">Enrollment No.</label></td>
<td><?php echo $row['EnrollmentNo'];?></td>
</tr>
<tr>
<td><label class="labels">Highest Degree</label></td>
<td><?php echo $row['HighestDegree']; ?></td>
</tr>
<tr>
<td><label class="labels">Branch</label></td>
<td><?php echo $row['Branch']; ?></td>
</tr>
<tr>
<td><label class="labels">Passing Year</label></td>
<td><?php echo $row['PassingYear']; ?></td>
</tr>
<tr>
<td><label class="labels">Percentage</label></td>
<td><?php echo $row['Percentage']; ?>%</td>
</tr>
<tr>
<td><label class="labels">CGPA</label></td>
<td><?php echo $row['CGPA']; ?></td>
</tr>
<tr>
<td><label class="labels">Diploma/HSC Percentage</label></td>
<td><?php echo $row['DiplomaHSCPercentage']; ?>%</td>
</tr>
<tr>
<td><label class="labels">SSC Percentage</label></td>
<td><?php echo $row['SSCPercentage']; ?>%</td>
</tr>
<tr>
<td><label class="labels">Area of Specialization</label></td>
<td><?php echo $row['AreaOfSpecialization']; ?></td>
</tr>
<tr>
<td><label class="labels">Technical Experience</label></td>
<td><?php echo $row['TechnicalExperience']; ?> years</td>
</tr>
<tr>
<td><label class="labels">Work Field</label></td>
<td><?php echo $row['WorkField']; ?></td>
</tr>
</table><br />
<tr>
<td colspan="5"><h3 style="text-align:center">Applied Jobs</h3></td>
</tr>
<table style="margin-left:auto; margin-right:auto; font-size:14px; text-align:center;">
	<tr style="background-color:#ccc;">
      <td style="width:170px;"><strong>Student Name</strong></td>
      <td style="width:170px;"><strong>Recruiter Name</strong></td>
      <td style="width:170px;"><strong>Job Type</strong></td>
      <td style="width:170px;"><strong>Response Date</strong></td>
      <td style="width:170px;"><strong>Manage</strong></td>
    </tr>
    <?php
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
	
	$color1 = "#ebebeb";
	$color2 = "#ffffff";
	$rowCount = 0;
	$username = $_SESSION['username'];
	
	$RecruiterName = mysqli_query($con, "SELECT * FROM tbl_recruiterorganisationdetails WHERE username='$username'");
    $row = mysqli_fetch_assoc($RecruiterName);
	$orgname = $row['OrganizationName'];
	
	$sql = mysqli_query($con, "SELECT * FROM tbl_jobseekerresponsetorecruiter WHERE RecruiterName='$orgname' ORDER BY JobID ASC");
	while ($row = mysqli_fetch_array($sql))
	{
		$rowColor = ($rowCount % 2) ? $color1 : $color2;
	?>
    <tr style="background-color:<?php echo $rowColor ?>;">
      <td><?php echo $row['JobSeekerID']; ?></td>
      <td><?php echo $row['RecruiterName']; ?></td>
      <td><?php echo $row['JobID']; ?></td>
      <td><?php echo $row['DateOfResponse']; ?></td>
      <td class="labels"><a href="frmOfferJobl.php?ID=<?php echo $row['JobSeekerID']; ?>"><input type="button" class="btn1" value="Offer Job!"/></a></td>
    </tr>
	<?php
	$rowCount ++;
	}
	mysqli_close($con);
	 ?>
     <tr>
    <td colspan="5" style="text-align:center"><?php
          if(isset($_GET['msg']))
          {
              $message = $_GET['msg'];
			  if($message == 1)
			  echo "<span class='success'>Offered Job Successfully!</span>";
			  if($message == 2)
			  echo "<span class='failed'>Your entry has been deleted successfully!</span>";
			  if($message == 5)
			  echo "<span class='failed'>You are logged out successfully!</span>";
			  if($message == 6)
			  echo "<span class='failed'>Session timeout!</span>";
          }
      ?></td>
    </tr>
</table>
</div>
</div>

<div class="footer">
<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Login</a> | <a href="#">Procedure</a> | <a href="#">Why Recruit</a> | <a href="#">Statistics</a> | <a href="#">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>