<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = mysqli_query($con, "SELECT * FROM tbl_adminlogin WHERE Username='$username' AND Password='$password'");
	$row = mysqli_fetch_array($sql);
	
	if(mysqli_num_rows($sql) > 0)
	{
		$_SESSION['IsValid'] = true;
		$_SESSION['username'] = $row[username];
		$_SESSION['password'] = $row[password];
		header("Location: admin_panel.php");
	}
	else
	{
		header("Location: ../admin_login.php?msg=2");
	}
	mysqli_close($con);
?>