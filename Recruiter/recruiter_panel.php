<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home - Recruiter</title>
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
<h2 style="text-align:center">Welcome to Recruiter Panel - <label style="color:#483D8B"><?php echo $_SESSION['username']; ?></label></h2>
<center>
<h3 style="color:#A52A2A">:: Quick Links ::</h3>
<h3><a href="frmAddJobs.php">1. Post a new job</a></h3>
<h3><a href="frmRecruiterProfileSettings.php">2. Update your account details</a></h3>
<h3><a href="frmRecruiterUpdateProfile.php">3. Update your company profile</a></h3>
<h3><a href="frmJobSeekerResponseToRecruiter.php">4. View all applied jobs by students</a></h3>
</center>
</div>
</div>

<div class="footer">
<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Login</a> | <a href="#">Procedure</a> | <a href="#">Why Recruit</a> | <a href="#">Statistics</a> | <a href="#">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>