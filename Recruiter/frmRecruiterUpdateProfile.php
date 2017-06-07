<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_SESSION['username'];
	$getStudentByID = mysqli_query($con, "SELECT * FROM tbl_recruiterorganisationdetails WHERE username='$id'");
	$row = mysqli_fetch_array($getStudentByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter update profile</title>
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
</div>
<div id="innersection">
<form action="act_recruiter_update_profile.php" method="post" name="UpdateProfile">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
<tr>
<td><label class="labels">Organization Name</label></td>
<td><?php echo $row['OrganizationName']; ?></td>
</tr>
<tr>
<td><label class="labels">Business Sector</label></td>
<td><input name="sector" type="text" class="textfields" value="<?php echo $row['BusinessSector']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Certificate 1</label></td>
<td><input name="cert1" type="text" class="textfields" value="<?php echo $row['Certificate1']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Certificate 2</label></td>
<td><input name="cert2" type="text" class="textfields" value="<?php echo $row['Certificate2']; ?>"></td></td>
</tr>
<tr>
<td><label class="labels">Certificate 3</label></td>
<td><input name="cert3" type="text" class="textfields" value="<?php echo $row['Certificate3']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Website</label></td>
<td><input name="website" type="text" class="textfields" value="<?php echo $row['Website']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Email 1</label></td>
<td><input name="email1" type="text" class="textfields" id="pincode" value="<?php echo $row['EmailID1']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Email 2</label></td>
<td><input name="email2" type="text" class="textfields" value="<?php echo $row['EmailID2']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Address</label></td>
<td><textarea name="address" class="textarea"><?php echo $row['Address']; ?></textarea></td>
</tr>
<tr>
<td><label class="labels">Organization Environment</label></td>
<td><textarea name="environment" class="textarea"><?php echo $row['OrganizationEnvironment']; ?></textarea></td>
</tr>
<tr>
<td><label class="labels">Terms &amp; Conditions</label></td>
<td><textarea name="terms" class="textarea"><?php echo $row['TermsAndCondition']; ?></textarea></td>
</tr>
<tr>
<td><label class="labels">Others</label></td>
<td><textarea name="others" class="textarea"><?php echo $row['Other']; ?></textarea></td>
</tr>
<tr>
<td><label class="labels">Size of Organization</label></td>
<td><input name="size" type="text" class="textfields" value="<?php echo $row['SizeOfOrganization']; ?>"></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="updateprofile" value="Update" class="btn" /></td>
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