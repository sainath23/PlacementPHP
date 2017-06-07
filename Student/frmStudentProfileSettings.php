<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$id = $_SESSION['username'];
	$getStudentByID = mysqli_query($con, "SELECT * FROM tbl_jobseekerregistration WHERE JobSeekerID='$id'");
	$row = mysqli_fetch_array($getStudentByID);
	
	mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Update Profile Settings</title>
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
<form action="act_stud_update_settings.php" method="post" name="UpdateProfile">
<input type="hidden" name="fid" value="<?php echo $id; ?>" />
<table cellspacing="2" cellpadding="5" style="border-collapse:collapse" align="center">
<tr>
<td><label class="labels">Username</label></td>
<td><?php echo $row['JobSeekerID']; ?></td>
</tr>
<tr>
<td><label class="labels">Old Password</label><font color="red">*</font></td>
<td><input name="oldpass" type="password" class="textfields" id="oldpass"></td>
</tr>
<tr>
<td><label class="labels">New Password</label><font color="red">*</font></td>
<td><input name="newpass" type="password" class="textfields" id="newpass"></td>
</tr>
<tr>
<td><label class="labels">Verify New Password</label><font color="red">*</font></td>
<td><input name="newpass1" type="password" class="textfields" id="newpass1"></td>
</tr>
<tr>
<td><label class="labels">Hint Question</label><font color="red">*</font></td>
<td><select class="textfields" name="hintquestion">
<option selected="selected">-- Select --</option>         
<option <?php if($row["HintQuestion"] == "What is your father's middle name?") echo "Selected='selected'"; ?>>What is your father's middle name?</option>
      <option <?php if($row["HintQuestion"] == "What is your pet name?") echo "Selected='selected'"; ?>>What is your pet name?</option>
</select></td>
</tr>
<tr>
<td><label class="labels">Answer</label><font color="red">*</font></td>
<td><input name="answer" type="text" class="textfields" value="<?php echo $row['Answer']; ?>" /></td>
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