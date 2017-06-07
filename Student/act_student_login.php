<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = mysqli_query($con, "SELECT JobSeekerID, password FROM tbl_jobseekerregistration WHERE JobSeekerID='$username' AND password='$password'");
	
	$row = mysqli_fetch_array($sql);
	
	if(mysqli_num_rows($sql) > 0)
	{
		$_SESSION['IsValid'] = true;
		$_SESSION['username'] = $row[JobSeekerID];
		$_SESSION['password'] = $row[password];
		header("Location: student_panel.php");
	}
	else
	{
		header("Location: ../student_login.php?msg=2");
	}
	mysqli_close($con);
?>