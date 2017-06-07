<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student View All Jobs</title>
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
<li><a href='student_panel.php'>Home</a></li>
<li><a href='frmStudentUpdateProfile.php'>Update Profile</a></li>
<li><a href='frmStudentProfileSettings.php'>Profile Settings</a></li>
<li><a href='frmStudentAcademicProfile.php'>Academic Profile</a></li>
<li><a href='frmStudentSearchJob.php'>Search Job</a></li>
<li><a href="frmRecruiterResponseToJobSeeker.php">Response</a></li>
<li><a href="../logout.php">Logout</a></li>
</ul>
</div>
<!--
<div class="page-name">Page name</div>-->
</div>
<div id="innersection">
    <?php
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
	$search = trim($_POST['search']);
	$color1 = "#ebebeb";
	$color2 = "#ffffff";
	$rowCount = 0;
	$username = $_SESSION['username'];
	$sql = mysqli_query($con, "SELECT * FROM tbl_jobopeningdetail WHERE (JobCategory LIKE '%".$search."%')");
	$query = "SELECT * FROM tbl_recruiterorganisationdetails";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	if ($row = mysqli_fetch_array($sql))
	{
      echo '
	  <table style="margin-left:auto; margin-right:auto; font-size:15px; text-align:center;">
	  <tr style="background-color:#ccc;">
      <td style="width:125px;"><strong>Job Type</strong></td>
      <td style="width:125px;"><strong>Company Name</strong></td>
      <td style="width:125px;"><strong>Eligibility</strong></td>
      <td style="width:125px;"><strong>Job Location</strong></td>
      <td style="width:125px;"><strong>Opening Date</strong></td>
      <td style="width:125px;"><strong>Closing Date</strong></td>
      <td style="width:125px;"><strong>Manage</strong></td>
    </tr>';
    echo "<tr>
      <td>".$row['JobID']."</td>
      <td>"?><?php while($row1=mysqli_fetch_array($result)) 
              {
				  echo $row1['OrganizationName'];
			  }?><?php echo"</td>
      <td>".$row['MinimumQualification']."</td>
      <td>".$row['JobLocation']."</td>
	  <td>".$row['JobOpeningDate']."</td>
	  <td>".$row['JobClosingDate']."</td>
      <td class='labels'><a href='job-details.php?ID=".$row['Sno']."'>Details</a></td>
    </tr></table>";
	 }
	else
	{
		echo "<table width='100%' border='0' cellpadding='5' cellspacing='5'>
		<tr>
	  <td colspan='5'><span style='color:#696969; font-size:14px; font-style:italic;'>Searched Rsults</span></td></tr>
	  <tr>
		<tr>
		<td>
		<span style='color:#000;'>No results were found to match your search item - <b>".$search."</b></span><br /><br /></td></tr>
  </table>";
  }
	mysqli_close($con);
	 ?>
</div>
</div>

<div class="footer">
<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Login</a> | <a href="#">Procedure</a> | <a href="#">Why Recruit</a> | <a href="#">Statistics</a> | <a href="#">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>