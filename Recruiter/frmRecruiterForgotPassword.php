<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter forgot password</title>
<link rel="stylesheet" type="text/css" href="../_assets/css/style.css" />
</head>

<body>
<div id="header"></div>

<div class="menubar">
<ul>
  <li><a href="../index.php">Home</a></li>
  <li><a href="../about_us.php">About Us</a></li>
  <li><a href="../login.php">Login</a></li>
  <li><a href="../procedure.php">Procedure</a></li>
  <li><a href="../our_recruiters.php">Our Recruiters</a></li>
  <li><a href="../stats.php">Statistics</a></li>
  <li><a href="../contact_us.php">Contact Us</a></li>
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
<h2 style="text-align:center">Forgot Password - Recruiter</h2>
<form action="act_recruiter_forgot_password.php" method="post" name="StudentLogin">
<table id="innerTable">
<tr>
<td colspan="2"><h3 style="text-align:center">Forgot password</h3><hr noshade="noshade" color="navy" /></td>
</tr>
<tr>
<td><label>Username: </label></td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td><label>Hint Question: </label></td>
<td><select name="question">
  <option id="0">-- Select --</option>
  <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_hint_question";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['QuestionId']; ?>"><?php echo $row['Question']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?>
  </select></td>
</tr>
<tr>
<td><label>Answer: </label></td>
<td><input type="text" name="answer"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Submit">
&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td>
</tr>
</table>
</form>

<br>
<table border="0" align="center">
<tr>
<td style="text-align:center"><?php
          if(isset($_GET['msg']))
          {
              $message = $_GET['msg'];
			  if($message == 1)
			  echo "<span class='success'>Your entry has been added successfully! Please login now.</span>";
			  if($message == 2)
			  echo "<span class='failed'>Invalid Username or Question or Answer!</span>";
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
<a href="../index.php">Home</a> | <a href="../about_us">About Us</a> | <a href="../login.php">Login</a> | <a href="../procedure.php">Procedure</a> | <a href="../our_recruiters.php">Our Recruiters</a> | <a href="../stats.php">Statistics</a> | <a href="../contact_us.php">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>