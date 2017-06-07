<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_SESSION['username'];
	$getRecruiterByID = mysqli_query($con, "SELECT * FROM tbl_jobopeningdetail WHERE username='$id'");
	$row = mysqli_fetch_array($getRecruiterByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter edit jobs</title>
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
<form action="act_recruiter_edit_job.php" method="post" name="AddJob">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table border="0" cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
  <tbody>
    <tr>
      <td><label class="labels">Job Name</label></td>
      <td><?php echo $row['JobID'];?></td>
    </tr>
    <tr>
      <td><label class="labels">Job Category</label></td>
      <td><select class="textfields" name="jcat">
      <option <?php if($row["JobCategory"] == "IT/Software") echo "Selected='selected'"; ?>>IT/Software</option>
      <option <?php if($row["JobCategory"] == "Finance & Accounting") echo "Selected='selected'"; ?>>Finance & Accounting</option>
      <option <?php if($row["JobCategory"] == "IT/Networking") echo "Selected='selected'"; ?>>IT/Networking</option>
      <option <?php if($row["JobCategory"] == "Sales & Marketing") echo "Selected='selected'"; ?>>Sales & Marketing</option>
      <option <?php if($row["JobCategory"] == "Administration") echo "Selected='selected'"; ?>>Administration</option>
      <option <?php if($row["JobCategory"] == "Management") echo "Selected='selected'"; ?>>Management</option>
      <option <?php if($row["JobCategory"] == "Communications") echo "Selected='selected'"; ?>>Communications</option>
      <option <?php if($row["JobCategory"] == "Research & Development") echo "Selected='selected'"; ?>>Research & Development</option>
                  </select></td>
    </tr>
    <tr>
      <td><label class="labels">Required Skills</label></td>
      <td><input name="skills" type="text" class="textfields" value="<?php echo $row['SkillsRequired']; ?>"></td>
    </tr>
    <tr>
      <td><label class="labels">Role</label></td>
      <td><select class="textfields" name="role">
      <option <?php if($row["Role"] == "Programmer") echo "Selected='selected'"; ?>>Programmer</option>
      <option <?php if($row["Role"] == "Jr Manager") echo "Selected='selected'"; ?>>Jr Manager</option>
      <option <?php if($row["Role"] == "Jr Developer") echo "Selected='selected'"; ?>>Jr Developer</option>
      <option <?php if($row["Role"] == "Sales Executive") echo "Selected='selected'"; ?>>Sales Executive</option>
      <option <?php if($row["Role"] == "Testing") echo "Selected='selected'"; ?>>Testing</option>
      </select></td>
    </tr>
    <tr>
      <td><label class="labels">Minimum Qualification</label></td>
      <td><select class="textfields" name="qualification">   
		<option <?php if($row["MinimumQualification"] == "No live KT") echo "Selected='selected'"; ?>>No live KT</option>
      <option <?php if($row["MinimumQualification"] == "Upto 2 live KT") echo "Selected='selected'"; ?>>Upto 2 live KT</option>
      <option <?php if($row["MinimumQualification"] == "No live KT with min 7 CGPA") echo "Selected='selected'"; ?>>No live KT with min 7 CGPA</option>
</select></td>
    </tr>
    <tr>
      <td><label class="labels">Maximum Age</label></td>
      <td><input type="text" class="textfields" name="age" value="<?php echo $row['MaximumAge']; ?>"></td>
    </tr>
    <tr>
      <td><label class="labels">Expected Salary</label></td>
      <td><input type="text" class="textfields" name="salary" value="<?php echo $row['ExpectedSalary']; ?>"></td>
    </tr>
    <tr>
      <td><label class="labels">Job Location</label></td>
      <td><input type="text" class="textfields" name="location" value="<?php echo $row['JobLocation']; ?>"></td>
    </tr>
    <tr>
      <td><label class="labels">Job Opening Date</label></td>
      <td><input type="text" class="textfields" name="opdate" value="<?php echo $row['JobOpeningDate']; ?>"><br>
        <em>(format: yyyy-mm-dd)</em></td>
    </tr>
    <tr>
      <td><label class="labels">Job Closing Date</label></td>
      <td><input type="text" class="textfields" name="cldate" value="<?php echo $row['JobClosingDate']; ?>"><br>
        <em>(format: yyyy-mm-dd)</em></td>
    </tr>
    <tr>
      <td><label class="labels">Job Description</label></td>
      <td><textarea class="textarea" name="description"><?php echo $row['JobDescription']; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" value="Update" class="btn"></td>
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