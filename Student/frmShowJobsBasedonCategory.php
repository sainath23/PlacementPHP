<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Search Job By Cetegory</title>
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
<form action="searched-jobs-by category.php" method="post" name="SearchJobByCat">
<table style="margin-left:auto; margin-right:auto">
<tr>
<td><h3>Search Job by Category</h3></td>
</tr>
<tr>
<td><select name="search" class="textfields">
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
  </select></td>
</tr>
<tr>
<td align="center"><input type="submit" class="btn" value="Search"></td>
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