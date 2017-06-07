<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recruiter Registration</title>
<link rel="stylesheet" type="text/css" href="../_assets/css/style.css" />
</head>

<body>
<div id="header"></div>

<div class="menubar">
<ul>
  <li><a href="../index.php">Home</a></li>
  <li><a href="#">About Us</a></li>
  <li><a href="../login.php">Login</a></li>
  <li><a href="#">Procedure</a></li>
  <li><a href="#">Why Recruit</a></li>
  <li><a href="#">Statistics</a></li>
  <li><a href="#">Contact Us</a></li>
</ul>
</div>

<div style="width:970px;height:auto;float:left;background-color:#fff;margin-bottom:10px;">
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
	?></div></div>
<div id="innersection">
<form action="act_recruiter_registration.php" method="post" name="RecruiterRegistartion">
<table style="margin-left:auto; margin-right:auto; width:500px;">
  <tbody>
    <tr>
      <td colspan="2"><center><font color="blue"><strong>:: LOGIN INFORMATION ::</strong></font></center></td>
    </tr>
    <tr>
      <td>Username<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtuname" id="txtuname"></td>
    </tr>
    <tr>
      <td>Password<font color="#FF0000">*</font></td>
      <td>
        <input type="password" name="password1" id="password1"></td>
    </tr>
    
    <tr>
      <td>Verify Password<font color="#FF0000">*</font></td>
      <td>
        <input type="password" name="password2" id="password2"></td>
    </tr>
    <tr>
      <td>Hint Question<font color="#FF0000">*</font></td>
      <td>
        <select name="selquest" id="selquest">
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
        </select>
        </td>
    </tr>
    <tr>
      <td>Answer<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtans" id="txtans"></td>
    </tr>
    <tr>
      <td colspan="2"><center><font color="blue"><strong>:: ORGANIZATION DETAILS::</strong></font></center></td>
    </tr>
    <tr>
      <td>Organization Name<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="orgname"></td>
    </tr>
    <tr>
      <td>Business Sector<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="sector"></td>
    </tr>
    <tr>
      <td>Certificate 1<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="cert1"><br></td>
    </tr>
    <tr>
      <td>Certificate 2</td>
      <td>
        <input type="text" name="cert2"></td>
    </tr>
        <td>Certificate 3</td>
      <td>
      <input type="text" name="cert3">
        </td>
    </tr>
        <tr>
      <td>Website<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="website"></td>
    </tr>
        <tr>
      <td>Email 1<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="email1"></td>
    </tr>
        <tr>
      <td>Email 2</td>
      <td>
        <input type="text" name="email2"></td>
    </tr>
        <tr>
      <td>Address<font color="#FF0000">*</font></td>
      <td><textarea name="address" cols="20"></textarea></td>
    </tr>
    <tr>
      <td>Organization Environment<font color="#FF0000">*</font></td>
      <td><textarea name="environment" cols="20"></textarea></td>
    </tr>
    <tr>
      <td>Terms &amp; Conditions<font color="#FF0000">*</font></td>
      <td><textarea name="terms" cols="20"></textarea></td>
    </tr>
    <tr>
      <td>Other</td>
      <td><textarea name="other" cols="20"></textarea></td>
    </tr>
    <tr>
      <td>Size of Organization<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="size"></td>
    </tr>
        <tr>
      <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="submit" id="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" id="reset" value="Reset"></td>
    </tr>
  </tbody>
</table>
</form>
     
<table border="0" align="center">
<tr>
<td><?php
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
<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Login</a> | <a href="#">Procedure</a> | <a href="#">Why Recruit</a> | <a href="#">Statistics</a> | <a href="#">Contact Us</a><br />
Copyright ©2015 | All rights reserved. 
</div>
</body>
</html>