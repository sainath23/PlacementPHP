<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
	$rid = $_GET['ID'];

    $sql = "DELETE FROM tbl_recruiterresponsetojobseeker WHERE rid='$rid'";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmRecruiterResponseToJobSeeker.php?msg=2");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>