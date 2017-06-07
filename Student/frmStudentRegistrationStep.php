<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Student Registration</title>
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
<h2 align="center">Student Registration Form</h2>
<form action="act_stud_registration.php" method="post" name="StudReg">
<table id="regtable">
  <tbody>
    <tr>
      <td colspan="2"><h3 align="center"><font color="blue">:: LOGIN INFORMATION ::</font></h3></td>
      <td colspan="2"><h3 align="center"><font color="blue">:: EDUCATION INFORMATION ::</font></h3></td>
    </tr>
    <tr>
      <td>Username<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtuname" id="txtuname"></td>
  <td>Enrollment No<font color="#FF0000">*</font></td>
      <td><input type="text" name="enroll">
        </td>
    </tr>
    <tr>
      <td>Password<font color="#FF0000">*</font></td>
      <td>
        <input type="password" name="password1" id="password1"></td>
        <td>Highest Degree<font color="#FF0000">*</font></td>
      <td><select name="degree">
        <option id="0">-- Select --</option>
          <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_degree";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['did']; ?>"><?php echo $row['Degree']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?>
        </select>
        </td>
    </tr>
    
    <tr>
      <td>Verify Password<font color="#FF0000">*</font></td>
      <td>
        <input type="password" name="password2" id="password2"></td>
        <td>Branch<font color="#FF0000">*</font></td>
      <td><select name="branch">
        <option id="0">-- Select --</option>
          <?php
              $con = mysqli_connect("localhost", "root", "", "placement") 
              or die("Failed to connect MySQL: " . mysqli_error());

              $query = "SELECT * FROM tbl_branch";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              
              while ($row=mysqli_fetch_array($result)) 
              {
				  ?>
                  <option id="<?php echo $row['bid']; ?>"><?php echo $row['Branch']; ?></option>
                  <?php }
				  mysqli_close($con);
                  ?>
        </select>
        </td>
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
        <td>Passing Year<font color="#FF0000">*</font></td>
      <td><input type="text" name="year">
        </td>
        </td>
    </tr>
    <tr>
      <td>Answer<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtans" id="txtans"></td>
        <td>Percentage<font color="#FF0000">*</font></td>
      <td><input type="text" name="percentage1">
        </td>
    </tr>
    <tr>
      <td colspan="2"><h3 align="center"><font color="blue">:: PERSONAL INFORMATION ::</font></h3></td>
      <td>CGPA<font color="#FF0000">*</font></td>
      <td><input type="text" name="cgpa">
        </td>
    </tr>
    <tr>
      <td>First Name<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtfname" id="txtfname"></td>
        <td>Diploma/HSC Percentage<font color="#FF0000">*</font></td>
      <td><input type="text" name="percentage2">
        </td>
    </tr>
    <tr>
      <td>Last Name<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtlname" id="txtlname"></td>
        <td>SSC Percentage<font color="#FF0000">*</font></td>
        <td><input type="text" name="percentage3"></td>
    </tr>
    <tr>
      <td>Date of Birth<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtdob" id="txtdob"><br>
        <em>(format: yyyy-mm-dd)</em></td>
        <td colspan="2"><h3 align="center"><font color="blue">:: EXPERIENCE INFORMATION ::</font></h3></td>
      <td>
        </td>
    </tr>
    <tr>
      <td>Address<font color="#FF0000">*</font></td>
      <td>
        <textarea name="txtaddr" id="txtaddr" rows="3" cols="20"></textarea></td>
        <td>Area of Specialization</td>
      <td><input type="text" name="specialization">
        </td>
    </tr>
      <td>State<font color="#FF0000">*</font></td>
      <td>
      <input type="text" name="txtstate" id="txtstate">
        </td>
        <td>Technical Experience</td>
      <td><input type="text" name="experience"> <em>(Years)</em>
        </td>
    </tr>
        <tr>
      <td>City<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtcity" id="txtcity"></td>
        <td>Work Field</td>
        <td><select name="workfield">
        <option id="0">--Select--</option>
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
      <td>Postal Code<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtpost" id="txtpost"></td>
        <td></td>
        <td></td>
    </tr>
        <tr>
      <td>Email<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtemail" id="txtemail"></td>
        <td></td>
        <td></td>
    </tr>
        <tr>
      <td>Phone<font color="#FF0000">*</font></td>
      <td>
        <input type="text" name="txtphone" id="txtphone"></td>
        <td></td>
        <td></td>
    </tr>
        <tr>
      <td>&nbsp;</td>
        <td></td>
      <td><input type="submit" name="submit" id="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" id="reset" value="Reset"></td>
        <td></td>
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