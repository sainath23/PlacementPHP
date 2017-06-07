<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
	$Sno = $_GET['ID'];

    $sql = "DELETE FROM tbl_jobopeningdetail WHERE Sno='$Sno'";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmViewJobs.php?msg=2");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>