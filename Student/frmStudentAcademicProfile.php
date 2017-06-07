<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_SESSION['username'];
	$getStudentByID = mysqli_query($con, "SELECT * FROM tbl_jobseekeracademicdetails WHERE JobSeekerID='$id'");
	$row = mysqli_fetch_array($getStudentByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Academic Profile</title>
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
<form action="act_stud_academic_profile.php" method="post" name="UpdateProfile">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
<tr>
<td><label class="labels">Enrollment No.</label></td>
<td><?php echo $row['EnrollmentNo'];?></td>
</tr>
<tr>
<td><label class="labels">Highest Degree</label></td>
<td><select class="textfields" name="degree">      
<option <?php if($row["HighestDegree"] == "Bachelor of Engineering") echo "Selected='selected'"; ?>>Bachelor of Engineering</option>
      <option <?php if($row["HighestDegree"] == "Master of Engineering") echo "Selected='selected'"; ?>>Master of Engineering</option>
</select></td>
</tr>
<tr>
<td><label class="labels">Branch</label></td>
<td><select class="textfields" name="branch">      
<option <?php if($row["Branch"] == "Computer Engineering") echo "Selected='selected'"; ?>>Computer Engineering</option>
      <option <?php if($row["Branch"] == "Information Technology") echo "Selected='selected'"; ?>>Information Technology</option>
      <option <?php if($row["Branch"] == "Information Technology") echo "Selected='selected'"; ?>>Instrumentation Engineering</option>
      <option <?php if($row["Branch"] == "Electronics & Telecomm") echo "Selected='selected'"; ?>>Electronics & Telecomm</option>
      <option <?php if($row["Branch"] == "Mechanical Engineering") echo "Selected='selected'"; ?>>Mechanical Engineering</option>
</select></td>
</tr>
<tr>
<td><label class="labels">Passing Year</label></td>
<td><input name="year" type="text" class="textfields" value="<?php echo $row['PassingYear']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Percentage</label></td>
<td><input name="percentage1" type="text" class="textfields" value="<?php echo $row['Percentage']; ?>"></td></td>
</tr>
<tr>
<td><label class="labels">CGPA</label></td>
<td><input name="cgpa" type="text" class="textfields" value="<?php echo $row['CGPA']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Diploma/HSC Percentage</label></td>
<td><input name="percentage2" type="text" class="textfields" value="<?php echo $row['DiplomaHSCPercentage']; ?>"></td>
</tr>
<tr>
<td><label class="labels">SSC Percentage</label></td>
<td><input name="percentage3" type="text" class="textfields" value="<?php echo $row['SSCPercentage']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Area of Specialization</label></td>
<td><input name="specialization" type="text" class="textfields" value="<?php echo $row['AreaOfSpecialization']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Technical Experience</label></td>
<td><input name="experience" type="text" class="textfields" value="<?php echo $row['TechnicalExperience']; ?>"></td>
</tr>
<tr>
<td><label class="labels">Work Field</label></td>
<td><select class="textfields" name="workfield">
<option selected="selected"></option>         
<option <?php if($row["WorkField"] == "IT/Software") echo "Selected='selected'"; ?>>IT/Software</option>
      <option <?php if($row["WorkField"] == "Finance & Accounting") echo "Selected='selected'"; ?>>Finance & Accounting</option>
      <option <?php if($row["WorkField"] == "IT/Networking") echo "Selected='selected'"; ?>>IT/Networking</option>
      <option <?php if($row["WorkField"] == "Sales & Marketing") echo "Selected='selected'"; ?>>Sales & Marketing</option>
      <option <?php if($row["WorkField"] == "Administration") echo "Selected='selected'"; ?>>Administration</option>
      <option <?php if($row["WorkField"] == "Management") echo "Selected='selected'"; ?>>Management</option>
      <option <?php if($row["WorkField"] == "Communications") echo "Selected='selected'"; ?>>Communications</option>
      <option <?php if($row["WorkField"] == "Research & Development") echo "Selected='selected'"; ?>>Research & Development</option>
</select></td>
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