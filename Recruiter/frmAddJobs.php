<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_SESSION['username'];
	$getRecruiterByID = mysqli_query($con, "SELECT * FROM tbl_recruiteraccountdetails WHERE username='$id'");
	$row = mysqli_fetch_array($getRecruiterByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter Add Job</title>
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
</ul>
</div>
<!--
<div class="page-name">Page name</div>-->
</div>
<div id="innersection">
<form action="act_recruiter_add_job.php" method="post" name="AddJob">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table border="0" cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
  <tbody>
    <tr>
      <td><label class="labels">Job Name</label></td>
      <td><input type="text" class="textfields" name="jname"></td>
    </tr>
    <tr>
      <td><label class="labels">Job Category</label></td>
      <td><select class="textfields" name="jcat">
      <option id="0">-- Select --</option>
  <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_workfield";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['wid']; ?>"><?php echo $row['WorkField']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?>
  </select></select></td>
    </tr>
    <tr>
      <td><label class="labels">Required Skills</label></td>
      <td><input type="text" class="textfields" name="skills"></td>
    </tr>
    <tr>
      <td><label class="labels">Role</label></td>
      <td><select class="textfields" name="role">
      <option id="0">-- Select --</option>
      <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_jobtype_master";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['JobId']; ?>"><?php echo $row['JobType']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?></select></td>
    </tr>
    <tr>
      <td><label class="labels">Minimum Qualification</label></td>
      <td><select class="textfields" name="qualification">
      <option id="0">-- Select --</option>
      <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_qualification";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['QualificationId']; ?>"><?php echo $row['Qualification']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?></select></td>
    </tr>
    <tr>
      <td><label class="labels">Maximum Age</label></td>
      <td><input type="text" class="textfields" name="age"></td>
    </tr>
    <tr>
      <td><label class="labels">Expected Salary</label></td>
      <td><input type="text" class="textfields" name="salary"></td>
    </tr>
    <tr>
      <td><label class="labels">Job Location</label></td>
      <td><input type="text" class="textfields" name="location"></td>
    </tr>
    <tr>
      <td><label class="labels">Job Opening Date</label></td>
      <td><input type="text" class="textfields" name="opdate"><br>
        <em>(format: yyyy-mm-dd)</em></td>
    </tr>
    <tr>
      <td><label class="labels">Job Closing Date</label></td>
      <td><input type="text" class="textfields" name="cldate"><br>
        <em>(format: yyyy-mm-dd)</em></td>
    </tr>
    <tr>
      <td><label class="labels">Job Description</label></td>
      <td><textarea class="textarea" name="description"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" value="Submit" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" class="btn"></td>
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