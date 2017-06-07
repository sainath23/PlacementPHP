<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_GET['ID'];
	$getRecruiterByID = mysqli_query($con, "SELECT * FROM tbl_jobopeningdetail WHERE Sno='$id'");
	$row = mysqli_fetch_array($getRecruiterByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Job Details</title>
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
<form action="apply-job.php" method="post" name="ApplyJob">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<input type="hidden" name="uname" value="<?php echo $row['username']; ?>">
<table border="0" cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
  <tbody>
    <tr>
      <td><label class="labels">Job Name</label></td>
      <td><input type="text" class="textfields" name="jname" value="<?php echo $row['JobID']; ?>"></td>
    </tr>
    <tr>
      <td><label class="labels">Job Category</label></td>
      <td><input type="text" class="textfields" name="jcat" value="<?php echo $row['JobCategory']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Required Skills</label></td>
      <td><input name="skills" type="text" class="textfields" value="<?php echo $row['SkillsRequired']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Role</label></td>
      <td><input type="text" class="textfields" name="role" value="<?php echo $row['Role']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Minimum Qualification</label></td>
      <td><input type="text" class="textfields" name="qualification" value="<?php echo $row['MinimumQualification']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Maximum Age</label></td>
      <td><input type="text" class="textfields" name="age" value="<?php echo $row['MaximumAge']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Expected Salary</label></td>
      <td><input type="text" class="textfields" name="salary" value="<?php echo $row['ExpectedSalary']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Job Location</label></td>
      <td><input type="text" class="textfields" name="location" value="<?php echo $row['JobLocation']; ?>" disabled></td>
    </tr>
    <tr>
      <td><label class="labels">Job Opening Date</label></td>
      <td><input type="text" class="textfields" name="opdate" value="<?php echo $row['JobOpeningDate']; ?>" disabled><br>
        <em>(format: yyyy-mm-dd)</em></td>
    </tr>
    <tr>
      <td><label class="labels">Job Closing Date</label></td>
      <td><input type="text" class="textfields" name="cldate" value="<?php echo $row['JobClosingDate']; ?>" disabled><br>
        <em>(format: yyyy-mm-dd)</em></td>
    </tr>
    <tr>
      <td><label class="labels">Job Description</label></td>
      <td><textarea class="textarea" name="description" disabled><?php echo $row['JobDescription']; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" value="Apply" class="btn"></td>
    </tr>
    <tr>
    <td colspan="2" style="text-align:center"><?php
          if(isset($_GET['msg']))
          {
              $message = $_GET['msg'];
			  if($message == 1)
			  echo "<span class='success'>Successfully applied for Job!</span>";
			  if($message == 2)
			  echo "<span class='failed'>Invalid Username or Password!</span>";
			  if($message == 5)
			  echo "<span class='failed'>You are logged out successfully!</span>";
			  if($message == 6)
			  echo "<span class='failed'>Session timeout!</span>";
          }
      ?></td>
    </tr>
  </tbody>
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