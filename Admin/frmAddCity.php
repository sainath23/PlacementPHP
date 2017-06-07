<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add location</title>
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
<li><a href='admin_panel.php'>Home</a></li>
<li><a href='#'>Add</a>
	<ul>
		<!--<li><a href='frmAddCountry.php'>Country</a></li>
		<li><a href='frmAddState.php'>State</a></li>
		<li><a href='frmAddCity.php'>City</a></li>
		<li><a href='frmAddExperience.php'>Experience</a></li>
		<li><a href='frmAddFunctionalArea.php'>Functional Area</a></li>-->
		<li><a href='frmAddJobType.php'>Job Type</a></li>
		<li><a href='frmAddQualification.php'>Qualification</a></li>
		<li><a href='frmAddSkills.php'>Skills</a></li>
        <li><a href="frmAddWorkFields.php">Work Fields</a></li>
	</ul>
</li>
<li><a href='#'>Student Report</a>
	<ul>
	<li><a href='ViewReports/Jobseeker/frmViewRegisteredJobSeeker.php'>Registered Student</a></li>
	<li><a href='ViewReports/Jobseeker/frmJobSeekerResponseToRecruiter.php'>Applied Jobs</a></li>
	</ul>
</li>
<li><a href='#'>Recruiter Report</a>
	<ul>
	<li><a href='ViewReports/Recruiter/frmViewRegisteredRecruiter.php'>Registered Recruiter</a></li>
	<li><a href='ViewReports/Recruiter/frmRecruiterResponseToJobSeeker.php'>Offered Jobs</a></li>
	</ul>
</li>
<li><a href="../logout.php">Logout</a></li>
</ul>
</div>
<!--
<div class="page-name">Page name</div>-->
</div>
<div id="innersection">
<h2 style="text-align:center">Add Location</h2>
<form action="act_admin_add_city.php" method="post" name="AddLocation">
<table border="0" align="center">
  <tbody>
  <tr>
  <td><label for="selectState"><strong>State Name:</strong></label></td>
  <td><select name="selectState" id="selectState">
  <option id="0">Select</option>
  <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_state_master";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['StateId']; ?>"><?php echo $row['StateName']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?>
  </select></td>
  </tr>
    <tr>
      <td><label for="txtCityName"><strong>City Name:</strong></label></td>
      <td>
        <input type="text" name="txtCityName" id="txtCityName"></td>
    </tr>
    <tr>
      <td><label for="txtDescription"><strong>Description:</strong></label></td>
      <td>
        <textarea name="txtDescription" id="txtDescription"></textarea></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" id="submit" value="Add">
        <input type="reset" name="reset" id="reset" value="Reset"></td>    
      </tr>
    <tr>
      <td colspan="2"><input type="checkbox" name="checkbox" id="checkbox">
        <label for="checkbox">Location Info (Check the check option to view existed data.)</label></td>
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
      ?>
    </td>
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