<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_SESSION['username'];
	$getStudentByID = mysqli_query($con, "SELECT * FROM tbljobseekercontactdetails WHERE JobSeekerID='$id'");
	$row = mysqli_fetch_array($getStudentByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Update Profile</title>
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
<form action="act_stud_update_profile.php" method="post" name="UpdateProfile">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
<tr>
<td><label class="labels">First Name</label></td>
<td><input name="fname" type="text" class="textfields" id="fname" value="<?php echo $row['FirstName']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Last Name</label></td>
<td><input name="lname" type="text" class="textfields" id="lname" value="<?php echo $row['LastName']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Date of Birth</label></td>
<td><input name="dob" type="text" class="textfields" id="dob" value="<?php echo $row['DOB']; ?>"><br />
  <em>(format - 'yyyy-mm-dd')</em></td>
</tr>
<tr>
<td><label class="labels">Address</label></td>
<td><textarea name="address" rows="5" class="textarea" id="textarea"><?php echo $row['Address']; ?></textarea></td></td>
</tr>
<tr>
<td><label class="labels">City</label></td>
<td><input name="city" type="text" class="textfields" id="city" value="<?php echo $row['City']; ?>"></td>
</tr>
<tr>
<td><label class="labels">State</label></td>
<td><input name="state" type="text" class="textfields" id="state" value="<?php echo $row['State']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Pin Code</label></td>
<td><input name="pincode" type="text" class="textfields" id="pincode" value="<?php echo $row['PinCode']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Email ID</label></td>
<td><input name="emailid" type="text" class="textfields" id="emailid" value="<?php echo $row['EmailID']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Phone No.</label></td>
<td><input name="phone" type="text" class="textfields" id="phone" value="<?php echo $row['Phone1']; ?>"></td>
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