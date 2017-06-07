<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin login</title>
<link rel="stylesheet" type="text/css" href="../../../_assets/css/style2.css" />
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
<li><a href='../../admin_panel.php'>Home</a></li>
<li><a href='#'>Add</a>
	<ul>
		<li><a href='../../frmAddCountry.php'>Country</a></li>
		<li><a href='../../frmAddState.php'>State</a></li>
		<li><a href='../../frmAddCity.php'>Location</a></li>
		<li><a href='../../frmAddExperience.php'>Experience</a></li>
		<li><a href='../../frmAddFunctionalArea.php'>Functional Area</a></li>
		<li><a href='../../frmAddJobType.php'>Job Type</a></li>
		<li><a href='../../frmAddQualification.php'>Qualification</a></li>
		<li><a href='../../frmAddSkills.php'>Skills</a></li>
	</ul>
</li>
<li><a href='#'>Student Report</a>
	<ul>
	<li><a href='../Jobseeker/frmViewRegisteredJobSeeker.php'>Registered Student</a></li>
	<li><a href='../Jobseeker/frmJobSeekerResponseToRecruiter.php'>Applied Jobs</a></li>
	</ul>
</li>
<li><a href='#'>Recruiter Report</a>
	<ul>
	<li><a href='frmViewRegisteredRecruiter.php'>Recruiter Jobseeker</a></li>
	<li><a href='frmRecruiterResponseToJobSeeker.php'>Offered Jobs</a></li>
	</ul>
</li>
<li><a href="../../../logout.php">Logout</a></li>
</ul>
</div>
<!--
<div class="page-name">Page name</div>-->
</div>
<div id="innersection">
<h3 align="center">All Registered Students</h3>
<table style="margin-left:auto; margin-right:auto; text-align:center">
	<tr style="background-color:#ccc; text-align:center;">
      <td style="width:170px;"><strong>Username</strong></td>
      <td style="width:170px;"><strong>Company Name</strong></td>
      <td style="width:170px;"><strong>Email ID</strong></td>
      <td style="width:170px;"><strong>Website</strong></td>
      <td style="width:170px;"><strong>Manage</strong></td>
    </tr>
    <?php
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
	
	$color1 = "#ebebeb";
	$color2 = "#ffffff";
	$rowCount = 0;
	$username = $_SESSION['username'];
	$sql = mysqli_query($con, "SELECT * FROM tbl_recruiterorganisationdetails ORDER BY username ASC");
	while ($row = mysqli_fetch_array($sql))
	{
		$rowColor = ($rowCount % 2) ? $color1 : $color2;
	?>
    <tr style="background-color:<?php echo $rowColor ?>;">
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['OrganizationName']; ?></td>
      <td><?php echo $row['EmailID1']; ?></td>
      <td><?php echo $row['Website']; ?></td>
      <td class="labels" style="text-align:center;"><a href="edit-recruiter.php?ID=<?php echo $row['username']; ?>">Edit</a> | <a href="delete-recruiter.php?ID=<?php echo $row['username']; ?>">Delete</a></td>
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
			  echo "<span class='success'>Your entry has been edited successfully!</span>";
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