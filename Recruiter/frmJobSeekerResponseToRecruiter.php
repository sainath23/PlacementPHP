<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter - Student Response to Recruiter</title>
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
      <td class="labels"><a href="frmJobSeekerAppliedJobDetail.php?ID=<?php echo $row['JobSeekerID']; ?>"><input type="button" class="btn1" value="Details"/></a></td>
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
			  echo "<span class='success'>Successfully offered Job!</span>";
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