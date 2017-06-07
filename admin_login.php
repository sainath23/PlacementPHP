<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin login</title>
<link rel="stylesheet" type="text/css" href="_assets/css/style.css" />
</head>

<body>
<div id="header"></div>

<div class="menubar">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="about_us.php">About Us</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="procedure.php">Procedure</a></li>
  <li><a href="our_recruiters.php">Our Recruiters</a></li>
  <li><a href="stats.php">Statistics</a></li>
  <li><a href="contact_us.php">Contact Us</a></li>
</ul>
</div>

<div id="collegepic"></div>

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
</div>
<div id="innersection">
<h2 style="text-align:center">Admin login</h2>
<form name="loginform" method="post" action="Admin/act_admin_login.php">
<table id="innerTable">
<tr>
<td colspan="2"><h3 style="text-align:center">Admin Login</h3><hr noshade="noshade" color="navy" /></td>
</tr>
<tr>
<td><label>Username: </label></td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td><label>Password: </label></td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="login" value="Login" type="submit">
&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td>
</tr>
</table>
</form>
<br />
<table border="0" align="center">
<tr>
<td style="text-align:center"><?php
          if(isset($_GET['msg']))
          {
              $message = $_GET['msg'];
			  if($message == 1)
			  echo "<span class='success'>Your entry has been added successfully! Please login now.</span>";
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
</div>
</div>

<div class="footer">
<a href="index.php">Home</a> | <a href="about_us">About Us</a> | <a href="login.php">Login</a> | <a href="procedure.php">Procedure</a> | <a href="our_recruiters.php">Our Recruiters</a> | <a href="stats.php">Statistics</a> | <a href="contact_us.php">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>