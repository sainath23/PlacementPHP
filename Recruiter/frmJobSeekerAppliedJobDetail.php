<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_GET['ID'];
	$getStudentByID = mysqli_query($con, "SELECT * FROM tbljobseekercontactdetails WHERE JobSeekerID='$id'");
	$row = mysqli_fetch_array($getStudentByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter - Applied Job Details</title>
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
<form action="act_stud_update_profile.php" method="post" name="UpdateProfile">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table cellspacing="2" cellpadding="5" style="border-collapse:collapse; width:400px; margin-left:auto; margin-right:auto">
<tr>
<td colspan="2" style="text-align:center"><h3>Student Details</h3></td>
</tr>
<tr>
<td><label class="labels">First Name</label></td>
<td><?php echo $row['FirstName']; ?></td>
</tr>
<tr>
<td><label class="labels">Last Name</label></td>
<td><?php echo $row['LastName']; ?></td>
</tr>
<tr>
<td><label class="labels">Date of Birth</label></td>
<td><?php echo $row['DOB']; ?></td>
</tr>
<tr>
<td><label class="labels">Address</label></td>
<td><?php echo $row['Address']; ?></td>
</tr>
<tr>
<td><label class="labels">City</label></td>
<td><?php echo $row['City']; ?></td>
</tr>
<tr>
<td><label class="labels">State</label></td>
<td><?php echo $row['State']; ?></td>
</tr>
<tr>
<td><label class="labels">Pin Code</label></td>
<td><?php echo $row['PinCode']; ?></td>
</tr>
<tr>
<td><label class="labels">Email ID</label></td>
<td><?php echo $row['EmailID']; ?></td>
</tr>
<tr>
<td><label class="labels">Phone No.</label></td>
<td><?php echo $row['Phone1']; ?></td>
</tr>
<tr>
<td colspan="2" align="center" class="labels"><a href="frmFullInformationaboutJobseeker.php?ID=<?php echo $row['JobSeekerID']; ?>"><input type="button" value="More Details" class="btn"></a></td>
</tr>
<tr>
    <td colspan="2" style="text-align:center"><?php
          if(isset($_GET['msg']))
          {
              $message = $_GET['msg'];
			  if($message == 1)
			  echo "<span class='success'>Your entry has been added successfully!</span>";
			  if($message == 2)
			  echo "<span class='failed'>Invalid Username or Password!</span>";
			  if($message == 5)
			  echo "<span class='failed'>You are logged out successfully!</span>";
			  if($message == 6)
			  echo "<span class='failed'>Session timeout!</span>";
          }
      ?></td>
    </tr>
</table>
</form>
</div>
</div>

<div class="footer">
<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Login</a> | <a href="#">Procedure</a> | <a href="#">Why Recruit</a> | <a href="#">Statistics</a> | <a href="#">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>